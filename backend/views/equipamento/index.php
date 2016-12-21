<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipamentos';
$this->params['breadcrumbs'][] = $this->title;

if( Yii::$app->user->identity->checarAcesso('professor') == 1){
  $action = "{view} {update} {delete} {create}";
}
else if ( Yii::$app->user->identity->checarAcesso('secretaria') == 1){
  $action = "{view} {create} {update}";
}


?>
<div class="equipamento-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Equipamento', ['create'], ['class' => 'btn btn-success']) ?>

    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idEquipamento',
            'NomeEquipamento',
            'Nserie',
            'NotaFiscal',
            'Localizacao',
            [   'label' => 'Status do Equipamento',
                'attribute' => 'StatusEquipamento',
                'filter'=>array ("Disponível" => "Disponível", "Em uso" => "Em uso", "Descartado" => "Descartado"),
                'value' => 'StatusEquipamento'
            ],
            // 'StatusEquipamento',
            // 'OrigemEquipamento',
            // 'ImagemEquipamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
