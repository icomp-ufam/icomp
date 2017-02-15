<?php

namespace backend\controllers;

use Yii;
use app\models\CautelaAvulsa;
use app\models\CautelaAvulsaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CautelaAvulsaController implements the CRUD actions for CautelaAvulsa model.
 */
class CautelaAvulsaController extends Controller
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
     * Lists all CautelaAvulsa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CautelaAvulsaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CautelaAvulsa model.
     * @param integer $idCautelaAvulsa
     * @param integer $id
     * @return mixed
     */
    public function actionView($idCautelaAvulsa, $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCautelaAvulsa, $id),
        ]);
    }
    
    public function actionView2($id){
    	return $this->render('view', [
    			'model' => $this->findModel2($id),
    	]);
    }

    /**
     * Creates a new CautelaAvulsa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CautelaAvulsa();

        if($model->StatusCautelaAvulsa == "Em aberto"){
            $StatusCautelaAvulsa = 1;
        }
        else if($model->StatusCautelaAvulsa = "Concluída"){
            $StatusCautelaAvulsa = 2;
        }
        else if ($model->StatusCautelaAvulsa = "Em atraso"){
            $StatusCautelaAvulsa = 3;
        }

        //if ($model->load(Yii::$app->request->post()) && $model->save()) 
            
            if ($model->load(Yii::$app->request->post())) {
            	$model->id = Yii::$app->user->id;
            	$arq = UploadedFile::getInstance($model, 'ImagemCautela');
            	if($arq!==null){
            		$arquivo = $model->idCautelaAvulsa.'-'.$arq->baseName;
            		$arquivo = 'repositorio/cautelasavulsas/'.$arquivo.'.'.$arq->extension;
            		$model ->ImagemCautela = $arquivo;
            		$arq->saveAs($arquivo);
            	}
            	//$model->url = 'repositorio/'.$arquivo.'.'.$model->ImagemEquipamento->extension;
            
            
            	if (!$model->save()) {
            		print_r($model->getErrors());
            		echo Yii::$app->user->id;
            		return;
            	}
            	
            	return $this->redirect(['view', 'idCautelaAvulsa' => $model->idCautelaAvulsa, 'id' => $model->id]);
            
            
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CautelaAvulsa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCautelaAvulsa
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($idCautelaAvulsa, $id)
    {
        $model = $this->findModel($idCautelaAvulsa, $id);
		$arquivoAntigo = $model->ImagemCautela;
        if ($model->load(Yii::$app->request->post())) {
        		$model->id = Yii::$app->user->id;
            	$arq = UploadedFile::getInstance($model, 'ImagemCautela');
            	if($arq!==null){
            		$arquivo = $model->idCautelaAvulsa.'-'.$arq->baseName;
            		$arquivo = 'repositorio/cautelasavulsas/'.$arquivo.'.'.$arq->extension;
            		$model ->ImagemCautela = $arquivo;
            		$arq->saveAs($arquivo);
            	}else{
            		$model->ImagemCautela = $arquivoAntigo;
            	}
            	//$model->url = 'repositorio/'.$arquivo.'.'.$model->ImagemEquipamento->extension;
            
            
            	if (!$model->save()) {
            		print_r($model->getErrors());
            		return;
            	}

            	return $this->redirect(['view', 'idCautelaAvulsa' => $model->idCautelaAvulsa, 'id' => $model->id]);
            
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CautelaAvulsa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCautelaAvulsa
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($idCautelaAvulsa, $id)
    {
        $this->findModel($idCautelaAvulsa, $id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CautelaAvulsa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCautelaAvulsa
     * @param integer $id
     * @return CautelaAvulsa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCautelaAvulsa, $id)
    {
        if (($model = CautelaAvulsa::findOne(['idCautelaAvulsa' => $idCautelaAvulsa, 'id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModel2($id){
    	return CautelaAvulsa::findOne($id);
    }
}
