<?php
namespace backend\controllers;
use Yii;
use app\models\Aluno;
use app\models\Trancamento;
use app\models\TrancamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * TrancamentoController implements the CRUD actions for Trancamento model.
 */
class TrancamentoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'ativar' => ['POST'],
                    'encerrar' => ['POST'],
                ],
            ],
        ];
    }

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
    
    /**
     * Lists all Trancamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrancamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Trancamento model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Trancamento model.
     * If creation is successful, the browser will be redirected to the 'view' page for model 'Aluno'.
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @param integer $idAluno The student ID
     * 
     * @return mixed
     */
    public function actionCreate($idAluno)
    {
        if (!$this->canDoOneStopOut($idAluno)) {
            $this->mensagens('error', 'Limite de trancamentos atingido', 'Não é possível criar um trancamento. O Aluno atingiu o limite de trancamentos');
            return $this->redirect(['aluno/view', 'id'=>$idAluno]);
        }


        $model = new Trancamento();

        $model->scenario = 'create';
        
        $model->idAluno = $idAluno;
        $model->dataSolicitacao = date("Y-m-d");
        $model->dataSolicitacao0 = date('d/m/Y', strtotime($model->dataSolicitacao));
        $model->tipo=0; //Defines 'type' as 'Trancamento'
        $model->status=1; //Defines status as active
        
        if ($model->load(Yii::$app->request->post())) {

            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->dataSolicitacao = explode("/", $model->dataSolicitacao0);
            if (sizeof($model->dataSolicitacao) == 3) {
                $model->dataSolicitacao = $model->dataSolicitacao[2]."-".$model->dataSolicitacao[1]."-".$model->dataSolicitacao[0];
            }
            else $model->dataSolicitacao = '';


            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->dataInicio = explode("/", $model->dataInicio0);
            if (sizeof($model->dataInicio) == 3) {
                $model->dataInicio = $model->dataInicio[2]."-".$model->dataInicio[1]."-".$model->dataInicio[0];
            }
            else $model->dataInicio = '';

            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->prevTermino = explode("/", $model->prevTermino0);
            if (sizeof($model->prevTermino) == 3) {
                $model->prevTermino = $model->prevTermino[2]."-".$model->prevTermino[1]."-".$model->prevTermino[0];
            }
            else $model->prevTermino = '';
            
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $model->documento0 = UploadedFile::getInstance($model, 'documento');
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            
            $pre_path = 'uploads/trancamento/';
            $filename = 'trancamento-'.Yii::$app->security->generateRandomString().'.'.$model->documento0->extension;

            $path = $pre_path.$filename;
            
            $model->documento = $path;

            if($model->save()){

                if (!is_dir($pre_path)) {
                    mkdir($pre_path);
                }

                $model->documento0->saveAs($path);
                $this->mensagens('success', 'Sucesso', 'Trancamento criado com sucesso.');
                return $this->redirect(['trancamento/view', 'id'=>$model->id]);
            }
            else {
                $this->mensagens('error', 'Erro', 'Houve uma falha ao criar o trancamento.');
            }
        }
        return $this->render('create', [
            'model'=>$model,
        ]);
    }

    /**
     * Checks if student can still perform a stop out
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @return boolean 'true' if student can still perform a stop out, 'false' if not
     */

    private function canDoOneStopOut($idAluno) {
        return true; //Not implemented Yet
    }


    /**
     * Updates an existing Trancamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->dataSolicitacao0 = date('d/m/Y', strtotime($model->dataSolicitacao));
        $model->dataInicio0 = date('d/m/Y', strtotime($model->dataInicio));
        $model->prevTermino0 = date('d/m/Y', strtotime($model->prevTermino));

        if ($model->load(Yii::$app->request->post())) {
            
            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->dataSolicitacao = explode("/", $model->dataSolicitacao0);
            if (sizeof($model->dataSolicitacao) == 3) {
                $model->dataSolicitacao = $model->dataSolicitacao[2]."-".$model->dataSolicitacao[1]."-".$model->dataSolicitacao[0];
            }
            else $model->dataSolicitacao = '';


            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->dataInicio = explode("/", $model->dataInicio0);
            if (sizeof($model->dataInicio) == 3) {
                $model->dataInicio = $model->dataInicio[2]."-".$model->dataInicio[1]."-".$model->dataInicio[0];
            }
            else $model->dataInicio = '';

            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->prevTermino = explode("/", $model->prevTermino0);
            if (sizeof($model->prevTermino) == 3) {
                $model->prevTermino = $model->prevTermino[2]."-".$model->prevTermino[1]."-".$model->prevTermino[0];
            }
            else $model->prevTermino = '';


            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
                'model' => $model,
        ]);
    }

    public function actionAtivar($id) {
        $model = $this->findModel($id);

        $model->dataTermino = null;
        $model->status = 1;

        if ($model->save()) {
            $this->mensagens('success', 'Sucesso', 'Trancamento ativado com sucesso.');
        }
        else {
             $this->mensagens('error', 'Erro', 'Falha ao ativar trancamento');
        }

        return $this->redirect(['index']);
    }

    public function actionEncerrar($id) {
        $model = $this->findModel($id);

        $model->dataTermino = date("Y-m-d");
        $model->status = 0;

        if ($model->save()) {
            $this->mensagens('success', 'Sucesso', 'Trancamento encerrado com sucesso.');
        }
        else {
             $this->mensagens('error', 'Erro', 'Falha ao encerrar trancamento.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Trancamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $documento = $model->documento;

        if ($model->delete()) {
            //Delete the document related to the stop out
            //getcwd() is used to get the current working directory (cwd)
            unlink(getcwd().'/'.$documento);
            $this->mensagens('success', 'Sucesso', 'Trancamento deletado com sucesso.');
        }
        else {
            $this->mensagens('error', 'Erro', 'Falha ao deletar trancamento.');
        }
        return $this->redirect(['index']);
    }
    /**
     * Finds the Trancamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trancamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trancamento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}