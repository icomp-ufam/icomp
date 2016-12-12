<?php

namespace backend\controllers;

use Yii;
use app\models\Aproveitamento;
use app\models\AproveitamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Aluno;
use app\models\Disciplina;
use yii\base\Exception;

/**
 * AproveitamentoController implements the CRUD actions for Aproveitamento model.
 */
class AproveitamentoController extends Controller
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
        						return Yii::$app->user->identity->checarAcesso('secretaria');
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
     * Lists all Aproveitamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AproveitamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		print_r(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexbyaluno($idAluno)
    {
    	$searchModel = new AproveitamentoSearch();
    	$searchModel->idAluno = $idAluno;
    	$queryParams = Yii::$app->request->queryParams;
    	$queryParams['AproveitamentoSearch']['idAluno'] = $idAluno;
    	$dataProvider = $searchModel->search($queryParams);
    	
    	return $this->render('index', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'idAluno'=>$idAluno,
    	]);
    }
    /**
     * Displays a single Aproveitamento model.
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
     * Creates a new Aproveitamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aproveitamento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreatebyaluno($idAluno){
    	
    	$model = new Aproveitamento();
    	
    	$aproveitamento = new Aproveitamento();
    	
    	if ($aproveitamento->load(Yii::$app->request->post()) ) {
    		
    		$dados = Yii::$app->request->post();
    		
    		if(Aproveitamento::findOne(['codDisciplinaOrigemFK'=>$aproveitamento->codDisciplinaOrigemFK,
    									'codDisciplinaDestinoFK'=>$aproveitamento->codDisciplinaDestinoFK,
    									'idAluno'=>$aproveitamento->idAluno]) !== Null)
    		{
    			$this->mensagens('warning', 'Aproveitamento Já Existente.', 'Este aluno já possui este aproveitamento.');
    			$model->idAluno = $idAluno;
    			return $this->render('create', [
    					'model' => $model,
    					'fromAluno'=>true,
    			]);
    		}
    		
    		//Verifica Existencia da Disciplina Origem
    		if(Disciplina::findOne($aproveitamento->codDisciplinaOrigemFK)===Null){
    			$mDisciplina = new Disciplina();
    			$mDisciplina->codDisciplina = $aproveitamento->codDisciplinaOrigemFK;
    			$mDisciplina->cargaHoraria = $dados["disciplinaOrigemCargaHoraria"];
    			$mDisciplina->creditos = $dados["disciplinaOrigemCreditos"];
    			$mDisciplina->nome = $dados["disciplinaOrigemNome"];
    			
    			if(!$mDisciplina->save()){
    				throw new NotFoundHttpException("Erro ao cadastrar disciplina $mDisciplina->codDisciplina : $mDisciplina->nome.");
    			}
    		}
    		
    		//Verifica Existencia da Disciplina Destino
    		if(Disciplina::findOne($aproveitamento->codDisciplinaDestinoFK)===Null){
    			$mDisciplina = new Disciplina();
    			$mDisciplina->codDisciplina = $aproveitamento->codDisciplinaDestinoFK;
    			$mDisciplina->cargaHoraria = $dados["disciplinaDestinoCargaHoraria"];
    			$mDisciplina->creditos = $dados["disciplinaDestinoCreditos"];
    			$mDisciplina->nome = $dados["disciplinaDestinoNome"];
    			 
    			if(!$mDisciplina->save()){
    				throw new NotFoundHttpException("Erro ao cadastrar disciplina $mDisciplina->codDisciplina : $mDisciplina->nome.");
    			}
    		}
    		
    		if($aproveitamento->save()){
    			return $this->redirect(['view', 'id' => $model->id]);
    		} else {
	            return $this->render('create', [
	                'model' => $model,
	            ]);
        	}    		
    		
    	}else    	
	    	if(Aluno::findOne($idAluno) !== Null){
	    		$model->idAluno = $idAluno;
	    		return $this->render('create', [
	    				'model' => $model,
	    				'fromAluno'=>true,
	    		]);
	    	}else{
	    		throw new NotFoundHttpException('Aluno não existente.');
	    	}
    	
    
    }

    /**
     * Updates an existing Aproveitamento model.
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

    /**
     * Deletes an existing Aproveitamento model.
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
     * Finds the Aproveitamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aproveitamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aproveitamento::findOne($id)) !== null) {
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
