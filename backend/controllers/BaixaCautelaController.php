<?php

namespace backend\controllers;

use Yii;
use app\models\BaixaCautela;
use backend\models\Cautela;
use app\models\BaixaCautelaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * BaixaCautelaController implements the CRUD actions for BaixaCautela model.
 */
class BaixaCautelaController extends Controller
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
     * Lists all BaixaCautela models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BaixaCautelaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BaixaCautela model.
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
     * Creates a new BaixaCautela model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        
        $cautela = Cautela::findOne($id);

        $model = new BaixaCautela();
        
        $model->idCautela = $id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cautela->StatusCautela = "Concluída";
            $cautela->save();

            return $this->redirect(['view', 'id' => $model->idBaixaCautela]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'item' => $cautela,
            ]);
        }
    }

    /**
     * Updates an existing BaixaCautela model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idBaixaCautela]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BaixaCautela model.
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
     * Finds the BaixaCautela model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BaixaCautela the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BaixaCautela::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
