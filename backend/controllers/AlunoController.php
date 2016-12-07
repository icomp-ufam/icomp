<?php

namespace backend\controllers;

use Yii;
use app\models\Aluno;
use app\models\Trancamento;
use yii\filters\AccessControl;
use common\models\User;
use common\models\LinhaPesquisa;
use app\models\AlunoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\IntegrityException;
use yii\base\Exception;
use yii\db\Query;
/**
 * AlunoController implements the CRUD actions for Aluno model.
 */
class AlunoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'exame', 'create', 'view_orientado', 'update', 'delete', 'trancamento', 'prorrogacao', 'prazo_vencido'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['orientandos', 'view_orientado', 'relatorio'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->checarAcesso('professor');
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'deletesecretaria' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Aluno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Aluno models (for stop out).
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @return mixed
     */
    public function actionTrancamento()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('trancamento', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Aluno models.
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @return mixed
     */
    public function actionProrrogacao()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('prorrogacao', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Aluno models of a Professor.
     * @return mixed
     */
    public function actionOrientandos()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->searchOrientandos(Yii::$app->request->queryParams);

        return $this->render('orientandos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aluno model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);

        $linhaPesquisa = new LinhaPesquisa();
        $linhaPesquisa = $linhaPesquisa->getLinhaPesquisaNome($model->area);
        
        if ($linhaPesquisa != null){
            $model->area = $linhaPesquisa->nome;
        }

        $orientador = User::findOne($model->orientador);
        if ($orientador != null)
            $model->orientador= $orientador->nome;

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionExame($id){
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('createExame', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate()
    {
        $model = new Aluno();

        if ($model->load(Yii::$app->request->post())) {

            $model_usuario = User::findOne(['username' => $model->cpf]);

            if($model_usuario == null){
                $model_usuario = new User();
                $model_usuario->nome = $model->nome;
                $model_usuario->username = $model->cpf;
                $model_usuario->password = $model->senha;
                $model_usuario->email = $model->email;
                $model_usuario->administrador =  0;
                $model_usuario->coordenador =  0;
                $model_usuario->secretaria =  0;
                $model_usuario->professor = 0;
                $model_usuario->aluno = 1;
                $model_usuario->auth_key = Yii::$app->security->generateRandomString();
            }else{
                $model_usuario->aluno = 1;
                $model_usuario->status = 10;
            }

            try{
                if($model_usuario->save()){
                    $model->idUser = $model_usuario->id;
                    if($model->save()){
                        $this->mensagens('success', 'Aluno Adicionado', 'O aluno \''.$model->nome.'\' foi adicionado com sucesso.');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else{
                        $this->mensagens('danger', 'Aluno não Adicionado', 'Ocorreu um erro ao adicionar o aluno. Verifique os campos e tente novamente.');
                    }
                }else{
                    $this->mensagens('danger', 'Usuário não Adicionado', 'Ocorreu um erro ao adicionar aluno aos usuários. Verifique os campos e tente novamente.');
                }
            }catch(IntegrityException $e){
                $this->mensagens('danger', 'Usuário não Adicionado', 'Ocorreu um erro ao adicionar aluno aos usuários. Verifique os campos e tente novamente.');
            }
        }
            
        $linhasPesquisas = ArrayHelper::map(LinhaPesquisa::find()->orderBy('nome')->all(), 'id', 'nome');
        $orientadores = ArrayHelper::map(User::find()->where(['professor' => '1'])->orderBy('nome')->all(), 'id', 'nome');
        
        return $this->render('create', [
            'model' => $model,
            'linhasPesquisas' => $linhasPesquisas,
            'orientadores' => $orientadores, 
        ]);
    }


    public function actionView_orientado($id)
    {
         $model = $this->findModel($id);

        //obtendo o nome linha de pesquisa através do id da linha de pesquisa
        $linhaPesquisa = new LinhaPesquisa();
        $linhaPesquisa = $linhaPesquisa->getLinhaPesquisaNome($model->area);
        
        if ($linhaPesquisa != null){
            $model->area = $linhaPesquisa->nome;
        }
        
        $orientador = User::findOne($model->orientador);
        if ($orientador != null)
            $model->orientador= $orientador->nome;
        
        return $this->render('view_orientado', [
            'model' =>  $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->dataingresso) $model->dataingresso = date('d-m-Y', strtotime($model->dataingresso));
		if($model->datanascimento) $model->datanascimento = date('d-m-Y', strtotime($model->datanascimento));
        if($model->dataExameProf) $model->dataExameProf =  date('d-m-Y', strtotime($model->dataExameProf));
		if($model->dataimplementacaobolsa) $model->dataimplementacaobolsa =  date('d-m-Y', strtotime($model->dataimplementacaobolsa));
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $linhasPesquisas = ArrayHelper::map(LinhaPesquisa::find()->orderBy('nome')->all(), 'id', 'nome');
            $orientadores = ArrayHelper::map(User::find()->where(['professor' => '1'])->orderBy('nome')->all(), 'id', 'nome');

            return $this->render('update', [
                'model' => $model,
                'linhasPesquisas' => $linhasPesquisas,
                'orientadores' => $orientadores, 
            ]);
        }
    }

    /**
     * Deletes an existing Aluno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Aluno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aluno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aluno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



            /* Envio de mensagens para views
       Tipo: success, danger, warning*/
    protected function mensagens($tipo, $titulo, $mensagem){
        Yii::$app->session->setFlash($tipo, [
            'type' => $tipo,
            'icon' => 'home',
            'duration' => 5000,
            'message' => $mensagem,
            'title' => $titulo,
            'positonY' => 'top',
            'positonX' => 'center',
            'showProgressbar' => true,
        ]);
    }
	
	public function actionRelatorio($status)
    {
        		
		$id = Yii::$app->user->identity->id;
		$orientador = User::findOne($id);
		$curso = array(1 => "Mestrado", 2 => "Doutorado");
		$mes = array("01" => "Janeiro", "02" => "Fevereiro", "03" => "Março", "04" => "Abril", "05" => "Maio", "06" => "Junho", "07" => "Julho", "08" => "Agosto", "09" => "Setembro", "10" => "Outubro", "11" => "Novembro", "12" => "Dezembro");
		
		if($status == 0){
			$orientandos = Aluno::find()->select("*")->where("orientador = $id AND status = $status")->orderBy("dataingresso")->all();
			$texto = "Previsão de conclusão";
			$texto2 = "orienta ";
		}
		else{
			$orientandos = Aluno::find()->select("*")->where("orientador = $id AND status = $status")->orderBy("anoconclusao")->all();
			$texto = "Data de conclusão";
			$texto2 = "orientou ";
		}
        
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('uploads/Orientandos.docx');
        $templateProcessor->setValue('orientador', $orientador->nome);
		$templateProcessor->setValue('texto', $texto);
		$templateProcessor->setValue('texto2', $texto2);
        $templateProcessor->setValue('dia', date("d"));
        $templateProcessor->setValue('mes', $mes[date("m")]);
		$templateProcessor->setValue('ano', date("Y"));
		
        
        $tamanho = count($orientandos);
        $templateProcessor->cloneRow('aluno', $tamanho);
        for ($i = 0; $i < $tamanho; $i++) {
            $templateProcessor->setValue('aluno#' . ($i + 1), $orientandos[$i]->nome);
			$templateProcessor->setValue('curso#' . ($i + 1), $curso[$orientandos[$i]->curso]);
			$templateProcessor->setValue('inicio#' . ($i + 1), date("d/m/Y", strtotime($orientandos[$i]->dataingresso)));
			$templateProcessor->setValue('termino#' . ($i + 1), date("d/m/Y", strtotime($orientandos[$i]->anoconclusao)));
        }

        header('Content-Disposition: attachment; filename="Orientandos.docx"');
        $templateProcessor->saveAs('php://output');
		
    }

    public function actionPrazo_vencido(){
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("select a.nome, (DATEDIFF(CURDATE(),a.dataingresso)+DATEDIFF(t.dataTermino,t.dataInicio)+DATEDIFF(CURDATE(),p.dataInicio)) as dias,a.curso from j17_aluno as a join j17_prorrogacoes as p on p.idAluno=a.id join j17_trancamentos as t on t.idAluno=a.id where a.curso%2!=0 and (select (DATEDIFF(CURDATE(),a.dataingresso)+DATEDIFF(t.dataTermino,t.dataInicio)+DATEDIFF(CURDATE(),p.dataInicio)) as dias from j17_aluno as a join j17_prorrogacoes as p on p.idAluno=a.id join j17_trancamentos as t on t.idAluno=a.id) >= 730 or a.curso%2=0 and (select (DATEDIFF(CURDATE(),a.dataingresso)+DATEDIFF(t.dataTermino,t.dataInicio)+DATEDIFF(CURDATE(),p.dataInicio)) as dias from j17_aluno as a join j17_prorrogacoes as p on p.idAluno=a.id join j17_trancamentos as t on t.idAluno=a.id) >= 1460;");
        $aluno= $sql->queryAll();
        
        return $this->render('prazoVencido', ['aluno'=>$aluno]); 
    }

}
