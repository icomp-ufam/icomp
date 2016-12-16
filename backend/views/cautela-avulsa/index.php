<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CautelaAvulsaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cautela Avulsas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-avulsa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cautela Avulsa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCautelaAvulsa',
            'id',
            'NomeResponsavel',
            'Email:email',
            'ValidadeCautela',
            // 'TelefoneResponsavel',
            // 'ObservacoesDescarte',
            // 'ImagemCautela',
            // 'StatusCautelaAvulsa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
