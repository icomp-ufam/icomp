<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CautelaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cautelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Gerar Cautela', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCautela',
            'NomeResponsavel',
            'OrigemCautela',
            'DataDevolucao',
            //'Email:email',
            // 'ValidadeCautela',
            // 'TelefoneResponsavel',
            // 'ImagemCautela',
            // 'Equipamento',
            [   'label' => 'Status da Cautela',
                'attribute' => 'StatusCautela',
                'filter'=>array ("Em aberto" => "Em aberto", "Concluída" => "Concluída", "Em atraso" => "Em atraso"),
                'value' => 'StatusCautela'


            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
