<?php

namespace backend\controllers;

use Yii;
use app\models\Equipamento;
use app\models\EquipamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * EquipamentoController implements the CRUD actions for Equipamento model.
 */
class EquipamentoController extends Controller
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
     * Lists all Equipamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquipamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipamento model.
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
     * Creates a new Equipamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equipamento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // Create Upload
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'equipamento';
                $model->ImagemEquipamento = $imagepath .rand(10,100).$model->file->name;
            }

            if ($model->save()) {

                if($model->file){
                    $model->file->saveAs($model->ImagemEquipamento);
                    //return $this->redirect(['view', 'id' => $model->idEquipamento]);
                }

                return $this->redirect(['view', 'id' => $model->idEquipamento]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Equipamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'equipamento';
                
                $model->ImagemEquipamento= $imagepath .rand(10,100).$model->file->name;
            }

            if ($model->save()) {
                if($model->file){
                    $model->file->saveAs($model->ImagemEquipamento);
                    return $this->redirect(['view', 'id' => $model->idEquipamento]);
                }
            }
            //return $this->redirect(['view', 'id' => $model->idEquipamento]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeletefoto($id){

        $ImagemEquipamento= Pasien::find()->where(['id' => $id])->one()->ImagemEquipamento;
        if($ImagemEquipamento) {
            if (!unlink($ImagemEquipamento)) {
                return false;
            }
        }

        $pasien = Pasien::findOne($id);
        $pasien->ImagemEquipamento = NULL;
        $pasien->update();

        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Deletes an existing Equipamento model.
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
     * Finds the Equipamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipamento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'ImagemEquipamento');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }



}
