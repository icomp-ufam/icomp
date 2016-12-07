<?php
namespace backend\controllers;

use Yii;
use app\models\Aluno;
use yii\filters\AccessControl;
use app\models\Trancamento;
use app\models\TrancamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;
use yii\helpers\Html;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'ativar', 'encerrar', 'pdf'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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

    /*
     * Envio de mensagens para views
     * Tipo: success, danger, warning, error
     */
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
            $this->mensagens('warning', 'Limite de trancamentos atingido', 'Atenção! O Aluno atingiu o limite máximo de trancamentos disponíveis');
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
            
            $pre_path = 'uploads/trancamento/';
            $filename = 'trancamento-'.Yii::$app->security->generateRandomString().'.pdf';

            $path = $pre_path.$filename;
            
            $model->documento = $path;

            if($model->save()){

                if (!is_dir($pre_path)) {
                    mkdir($pre_path);
                }

                $this->generatePdf($path, 'It Works!');
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

    private function generatePdf($filename, $content) {
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_FILE,
            'filename' => $filename,
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
}