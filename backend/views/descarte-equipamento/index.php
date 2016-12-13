<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescarteEquipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Descarte de Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descarte-equipamento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Descartar Equipamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDescarte',
            'NomeResponsavel',
            'Email:email',
            'TelefoneResponsavel',
            'ObservacoesDescarte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
