<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PortariaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portaria-index">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="fa fa-plus"></span> Nova Portaria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'responsavel',
            //'descricao:ntext',
            [
                'attribute' => 'data0',
                'value' => function($model) {
                    return date('d/m/Y', strtotime($model->data));
                }
            ],
            
            //'documento:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template'=> '{download} {view} {delete}',
             'buttons'=>
                [
                  'download' => function ($url, $model) { 
                    return Html::a('<span class="glyphicon glyphicon-download"></span>', $model->documento, [
                            'target' => '_blank',
                            'title' => Yii::t('yii', 'Download do Documento'),
                            'data-pjax'=> "0"
                        ]);
                  },
                ] 
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
