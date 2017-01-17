<?php

namespace backend\controllers;

use Yii;
use app\models\Disciplina;
use app\models\DisciplinaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DisciplinaController implements the CRUD actions for Disciplina model.
 */
class DisciplinaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
        		'class' => \yii\filters\AccessControl::className(),
        		'rules' => [
        			[
        				'allow' => true,
        				'roles' => ['@'],
        				'matchCallback' => function ($rule, $action) {
        					return Yii::$app->user->identity->checarAcesso('secretaria') || Yii::$app->user->identity->checarAcesso('administrador');
        				}
        			],
        		],
        	],            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Disciplina models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DisciplinaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Disciplina model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Disciplina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Disciplina();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codDisciplina]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Disciplina model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codDisciplina]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Disciplina model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Disciplina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Disciplina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Disciplina::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAutocompletedisciplina($term){
    	$listaDisc = Disciplina::find()->where(["like","codDisciplina",strtoupper($term)])->all();
    	
    	$codigos = [];
    	
    	foreach ($listaDisc as $disc)
    	{	
    		$codigos[] = ['label'=>$disc['codDisciplina'],'value'=>$disc['codDisciplina'],'nome'=>$disc['nome'],
    					  'creditos'=>$disc['creditos'], 'cargaHoraria'=>$disc['cargaHoraria'], 'nomeCurso'=>$disc['nomeCurso'], 'instituicao'=>$disc['instituicao'], 'preRequisito'=>$disc['preRequisito'],'obrigatoria'=>$disc['obrigatoria'] 
    		]; //build an array
    	}
    	
    	echo json_encode($codigos);
    }
}
