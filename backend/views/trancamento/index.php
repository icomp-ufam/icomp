<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrancamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trancamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trancamento-index">

    <h1><?php /*Html::encode($this->title) */?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  //Html::a('Create Trancamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'idAluno',
            [
                'attribute' => 'idAluno',
                'value' => 'aluno.nome'
            ],
            'dataSolicitacao',
            'dataAprovOrientador',
            'dataInicio',
            'prevTermino',
            'dataTermino',
            'justificativa',
            // 'documento:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
