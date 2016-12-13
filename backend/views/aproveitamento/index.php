<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Aproveitamento;
/* @var $this yii\bckend\View */
/* @var $searchModel backend\models\AproveitamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if(isset($idAluno))
	$this->title = 'Aproveitamentos de Disciplina de: '.$searchModel->idAlunoFK0->nome;
else
	$this->title = 'Aproveitamentos de Disciplina';
$this->params['breadcrumbs'][] = 'Aproveitamentos';
?>
<div class="aproveitamento-index">

    <!-- <h1><?php //echo Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    	<?php 
    	if(isset($idAluno)){
    		echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['aluno/view','id'=>$idAluno], ['class' => 'btn btn-warning']);
    		echo '&nbsp';
        	echo Html::a('Novo Aproveitamento', ['createbyaluno','idAluno'=>$idAluno], ['class' => 'btn btn-success']);
        	
        	
    	}else
        	echo Html::a('Novo Aproveitamento', ['create'], ['class' => 'btn btn-success']);
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codDisciplinaOrigemFK',
            'codDisciplinaDestinoFK',
            'nota',
            'frequencia',
            'situacao',
            // 'idAluno',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {delete} {update}',
            	'buttons'=>[
            			'delete' => function ($url, $model) {
            			return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['deletebyaluno', 'id' => $model->id, 'idAluno' => $model->idAluno], [
            					'data' => [
            							'confirm' => 'Remover o aproveitamento \''.$model->id.'\'?',
            							'method' => 'post',
            					],
            					'title' => Yii::t('yii', 'Remover Aproveitamento'),
            			]);
            			},
            			'view' => function ($url, $model){
            			return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id, 'idAluno' => $model->idAluno], [
            					'title' => Yii::t('yii', 'Visualizar Aproveitamento'),
            			]);
            			},
            			'update' => function ($url, $model){
            			return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['updatebyaluno', 'id' => $model->id, 'idAluno' => $model->idAluno], [
            					'title' => Yii::t('yii', 'Editar Aproveitamento'),
            			]);
            			},
            	]
    		],
        ],
    ]); ?>
</div>
