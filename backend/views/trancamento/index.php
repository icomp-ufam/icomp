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
                'attribute' => 'matricula',
                'value' => function($model) {
                    return $model->aluno->matricula;
                }
            ],
            [
                'attribute' => 'idAluno',
                'value' => function($model) {
                    return $model->aluno->nome;
                }
            ],
            [
                'attribute' => 'orientador',
                'value' => function($model) {
                    return $model->orientador0->nome;
                }
            ],
            /*
            [
                'attribute' => 'dataSolicitacao',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->dataSolicitacao));
                },
                //'headerOptions' => ['style' => 'width:15%'],
            ],
            */
            [
                'attribute' => 'dataInicio0',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->dataInicio));
                }
            ],
            /*
            [
                'attribute' => 'prevTermino',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->prevTermino));
                },
            ],
            */
            /*
            [
                'attribute' => 'dataTermino',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->dataTermino));
                },
            ],
            */
            //'justificativa',
            // 'documento:ntext',
            [
                'attribute' => 'status',
                'filter'=>array (1 => 'Ativo', 0 => 'Encerrado'),
                'contentOptions' => function ($model){
                    return [
                            'style' => 'background-color: '.($model->status == 0 ? '#cc3300' : '#ccff66')
                           ];
                },
                'format' => 'html',
                'value' => function($model) {
                    if ($model->status == 0) return '<span class="glyphicon glyphicon-remove"></span> Encerrado';
                    return '<span class="glyphicon glyphicon-ok"></span> Ativo';
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
              'template'=> '{view} {update} {delete} {ativar} {encerrar}',
                'buttons'=>
                [
                  'ativar' => function ($url, $model) { 
                              if ($model->status == 1) return false; //Disables button if status is active
                              return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['ativar', 'id' => $model->id], [
                                        'data' => [
                                            'confirm' => 'Ativar o trancamento? Essa ação apagará a data de encerramento atual!',
                                            'method' => 'post',
                                        ],
                                        'title' => Yii::t('yii', 'Ativar Trancamento'),
                    ]);   
                  },
                  'encerrar' => function ($url, $model) { 
                              if ($model->status == 0) return false; //Disables button if status is closed
                              return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['encerrar', 'id' => $model->id], [
                                        'data' => [
                                            'confirm' => 'Encerrar o trancamento?',
                                            'method' => 'post',
                                        ],
                                        'title' => Yii::t('yii', 'Encerrar Trancamento'),
                    ]);   
                  }
                ]                            
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
