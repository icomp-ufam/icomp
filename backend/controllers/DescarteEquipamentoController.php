<?php

namespace backend\controllers;

//Teste

use Yii;
use app\models\DescarteEquipamento;
use backend\models\Equipamento;
use app\models\DescarteEquipamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DescarteEquipamentoController implements the CRUD actions for DescarteEquipamento model.
 */
class DescarteEquipamentoController extends Controller
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
     * Lists all DescarteEquipamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DescarteEquipamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DescarteEquipamento model.
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
     * Creates a new DescarteEquipamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$equipamento = Equipamento::findOne($id);

        $model = new DescarteEquipamento();
        //$model->idEquipamento = $id;
        $equipamento = new Equipamento();
        
        if(isset(Yii::$app->request->get()['idEquipamento'])){
        	$model->idEquipamento = Yii::$app->request->get()['idEquipamento'];
        }

		$equipamento = Equipamento::findOne($model->idEquipamento);
		if($equipamento->StatusEquipamento === Equipamento::getStatusDisponivel()){
	        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	            $equipamento->StatusEquipamento = Equipamento::getStatusDescartado();
	            $equipamento->save();
	            return $this->redirect(['view', 'id' => $model->idDescarte]);
	        } else {
	            return $this->render('create', [
	                'model' => $model,
	            	'item'=>$equipamento,
	            ]);
	        }
		}else{
			$this->mensagens('warning', "Equipamento continua $equipamento->StatusEquipamento", "Para descartar o equipamento ele precisa estar Disponível.");
			
			return $this->redirect(['equipamento/view', 'id'=>$model->idEquipamento]);
		}
    }

    /**
     * Updates an existing DescarteEquipamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDescarte]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DescarteEquipamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionRevert($idEquipamento)
    {
    	$equipamento = Equipamento::findOne($idEquipamento);
    	
    	//Em caso de inconsistência durante migrações do banco, melhor avisar o administrador..
    	if($equipamento->equipamentoTemDescarte === false){
    		$this->mensagens('warning', "Descarte Não Existe", "Contate o administrador.");
    		return $this->redirect(['equipamento/view', 'id'=>$idEquipamento]);
    	}
    	
    	//Deletar o descarte e marca o equipamento como Disponível
    	if($this->findModel( $equipamento->equipamentoTemDescarte->idDescarte)->delete() !== false){
    		$equipamento->StatusEquipamento = Equipamento::getStatusDisponivel();
    		$equipamento->save();
    		
    		$this->mensagens('success', "Revertido", "O equipamento já está disponível.");
    	}
    
    	return $this->redirect(['equipamento/view', 'id'=>$idEquipamento]);
    }

    /**
     * Finds the DescarteEquipamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DescarteEquipamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DescarteEquipamento::findOne($id)) !== null) {
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
