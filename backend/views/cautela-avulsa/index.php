<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CautelaAvulsaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cautelas Avulsas';
$this->params['breadcrumbs'][] = $this->title;

if( Yii::$app->user->identity->checarAcesso('professor') == 1){
  $action = "{view} {update} {delete} {create}";
}
else if ( Yii::$app->user->identity->checarAcesso('secretaria') == 1){
  $action = "{view}";
}

?>
<div class="cautela-avulsa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Gerar Cautela Avulsa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCautelaAvulsa',
            //'id',
            'NomeResponsavel',
            'Email:email',
            'ValidadeCautela',
            // 'TelefoneResponsavel',
            // 'ObservacoesDescarte',
            // 'ImagemCautela',
            [   'label' => 'Status da Cautela',
                'attribute' => 'StatusCautelaAvulsa',
                'filter'=>array ("Em aberto" => "Em aberto", "Concluída" => "Concluída", "Em atraso" => "Em atraso"),
                'value' => 'StatusCautelaAvulsa'


            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
