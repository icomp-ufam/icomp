<?php

namespace backend\controllers;

use Yii;
use app\models\Cautela;
use app\models\CautelaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;



/**
 * CautelaController implements the CRUD actions for Cautela model.
 */
class CautelaController extends Controller
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
     * Lists all Cautela models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CautelaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /*public function gerarPdf($model, $filename){
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
          //'cssInline' => '.kv-heading-1{font-size:18px}',
           // set mPDF properties on the fly
          'options' => ['title' => filename],
           // call mPDF methods on the fly
          'methods' => [
              'SetHeader'=>['Krajee Report Header'],
              'SetFooter'=>[],
          ]
      ]);

      return pdf->render();
    }*/

    /**
     * Displays a single Cautela model.
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
     * Creates a new Cautela model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cautela();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          $model ->ImagemCautela = UploadedFile::getInstance($model, 'ImagemCautela');
          $arquivo = $model -> idCautela.'-'.$model->NomeResponsavel;
          $model->ImagemCautela->saveAs('repositorio/'.$arquivo.'.'.$model->ImagemCautela->extension);
          //<?= Html::img>
          //$model->url = 'repositorio/'.$arquivo.'.'.$model->ImagemEquipamento->extension;
          $model->save();

            return $this->redirect(['view', 'id' => $model->idCautela]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cautela model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCautela]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cautela model.
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
     * Finds the Cautela model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cautela the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cautela::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
