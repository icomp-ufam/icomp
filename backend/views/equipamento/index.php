<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipamento-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Equipamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            //'idEquipamento',
            'NomeEquipamento',
            'Nserie',
            'NotaFiscal',
            'Localizacao',
            'StatusEquipamento',
            // 'OrigemEquipamento',
            // 'ImagemEquipamento',
             'idProjeto',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {delete} {update}',
            	'buttons'=>[
            			'delete' => function ($url, $model) {
            			return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->idEquipamento], [
            					'data' => [
            							'confirm' => 'Remover o equipamento \''.$model->idEquipamento.'\'?',
            							'method' => 'post',
            					],
            					'title' => Yii::t('yii', 'Remover equipamento'),
            			]);
            			},
            			'view' => function ($url, $model){
            			return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->idEquipamento], [
            					'title' => Yii::t('yii', 'Visualizar equipamento'),
            			]);
            			},
            			'update' => function ($url, $model){
            			return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->idEquipamento], [
            					'title' => Yii::t('yii', 'Editar equipamento'),
            			]);
            			},
            	]
            ],
        ],
    ]); ?>
</div>
