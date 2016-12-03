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
                'value' => function($model) {
                    return $model->aluno->nome;
                }
            ],
            [
                'attribute' => 'orientador',
                'value' => function($model) {
                    return $model->aluno->orientador;
                }
            ],
            [
                'attribute' => 'dataSolicitacao',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->dataSolicitacao));
                },
                //'headerOptions' => ['style' => 'width:15 %'],
            ],
            [
                'attribute' => 'dataInicio',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->dataInicio));
                }
            ],
            [
                'attribute' => 'qtdDias',
                'value' => function($model) {
                    return $model->qtdDias . ' dias';
                },
            ],
            [
                'attribute' => 'dataTermino',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->dataTermino));
                },
            ],
            //'justificativa',
            // 'documento:ntext',
            [
                'attribute' => 'status',
                'filter'=>array (0 => 'Terminado', 1 => 'Trancado'),
                'value' => function($model) {
                    if ($model->status == 0) return 'Terminado';
                    return 'Trancado';
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
              'template'=>'{view} {update} {delete} {ativar}',
                'buttons'=>
                [
                  'ativar' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['ativar'], [
                            'data' => [
                                'confirm' => 'Ativar Trancamento',
                                'method' => 'post',
                            ],
                            'title' => Yii::t('yii', 'Ativar Trancamento'),
                    ]);   
                  }
                ]                            
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
