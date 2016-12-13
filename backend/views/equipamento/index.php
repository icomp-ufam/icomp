<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipamentos';
$this->params['breadcrumbs'][] = $this->title;


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
            
            [   'label' => 'Status do Equipamento',
                'attribute' => 'StatusEquipamento',
                'filter'=>array ("S1" => "Disponível", "S2" => "Em uso", "D" => "Descartado"),
                'value' => 'StatusEquipamento'
            ],
            // 'StatusEquipamento',
            // 'OrigemEquipamento',
            // 'ImagemEquipamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
