<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\mPDF;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CautelaAvulsaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cautelas Avulsas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-avulsa-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Gerar Cautela Avulsa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idCautelaAvulsa',
            'id',
            'NomeResponsavel',
            'Email:email',
            'ValidadeCautela',
            'TelefoneResponsavel',
            // 'ObservacoesDescarte',
            //'ImagemCautela',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
