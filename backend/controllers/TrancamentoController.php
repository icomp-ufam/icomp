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
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idAluno)
    {
        $model = new Trancamento();
        
        $model->idAluno = $idAluno;
        $model->dataSolicitacao = date("Y-m-d");
        
        if ($model->load(Yii::$app->request->post())) {
            
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $model->documento0 = UploadedFile::getInstance($model, 'documento');
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = 'uploads/trancamento-'.Yii::$app->security->generateRandomString().'.'.$model->documento0->extension;
            
            $model->documento = $path;
            if($model->save()){
                $model->documento0->saveAs($path);
                $this->mensagens('success', 'Sucesso', 'Registro realizado com sucesso.');
                return $this->redirect(['aluno/view', 'id'=>$model->idAluno]);
            }
        }
        return $this->render('create', [
            'model'=>$model,
        ]);
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionEncerrar($id) {
        $model = $this->findModel($id);

        $model->dataInicio = $model->dataInicio;
        $model->dataTermino = date("Y-m-d");
        $model->status = 0;

        if ($model->save()) {
            $this->mensagens('success', 'Sucesso', 'Trancamento encerrado com sucesso.');
        }
        else {
             $this->mensagens('error', 'Erro', 'Falha ao encerrar trancamento');
        }

        return $this->redirect(['index']);
    }

    public function actionAtivar($id) {
        $model = $this->findModel($id);

        $model->dataInicio = $model->dataInicio;
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

    /**
     * Deletes an existing Trancamento model.
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