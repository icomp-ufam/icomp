<?php

namespace backend\controllers;

use Yii;
use app\models\BaixaCautelaAvulsa;
use app\models\CautelaAvulsa;
use app\models\BaixaCautelaAvulsaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BaixaCautelaAvulsaController implements the CRUD actions for BaixaCautelaAvulsa model.
 */
class BaixaCautelaAvulsaController extends Controller
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

    /**
     * Lists all BaixaCautelaAvulsa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BaixaCautelaAvulsaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BaixaCautelaAvulsa model.
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
     * Creates a new BaixaCautelaAvulsa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $cautelaAvulsa = CautelaAvulsa::findOne($id);
        
        $model = new BaixaCautelaAvulsa();

        $model->idCautelaAvulsa = $id;
        
        if ($model->load(Yii::$app->request->post())){
        	try{
        	 if($model->save()){
	            $cautelaAvulsa->StatusCautelaAvulsa = CautelaAvulsa::getStatusConcluida();
	            $cautelaAvulsa->save();
	            return $this->redirect(['view', 'id' => $model->idBaixaCautelaAvulsa]);
        	 }
        	}catch (yii\db\Exception $Erro){
        		//Esperado ser violação de chave unique (idCautelaAvulsa)
        		$this->mensagens('warning', 'Cautela Inativa', 'Já foi dado baixa para esta cautela anteriormente.');
        		return $this->redirect(['cautela-avulsa/view2', 'id' => $id]);        		
        	}        		
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BaixaCautelaAvulsa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	print_r($model->DataDevolucao);
            return $this->redirect(['view', 'id' => $model->idBaixaCautelaAvulsa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BaixaCautelaAvulsa model.
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
     * Finds the BaixaCautelaAvulsa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BaixaCautelaAvulsa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BaixaCautelaAvulsa::findOne($id)) !== null) {
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
}
