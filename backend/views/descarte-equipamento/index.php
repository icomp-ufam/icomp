<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescarteEquipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Descarte Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descarte-equipamento-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Descartar Equipamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEquipamento',
            'idDescarte',
            'NomeResponsavel',
            'email:email',
            'TelefoneResponsavel',
            // 'ObservacoesDescarte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
