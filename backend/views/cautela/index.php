<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CautelaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciar Cautelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <p>
        <?= Html::a('Gerar Cautela', ['create'], ['class' => 'btn btn-success']) ?>

        <?=Html::beginForm(['controller/produtos'],'post');?>
        <?=Html::dropDownList('action','',[''=>'Marque uma opção: ','c'=>'Confirmado','nc'=>'Não Confirmado'],['class'=>'dropdown',])?>
        <?=Html::submitButton('Gerar PDF', ['class' => 'btn btn-info',]);?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            //'idCautela',
            'NomeResponsavel',
            'OrigemCautela',
            'DataDevolucao',
            // 'Email:email',
            'ValidadeCautela',
            // 'TelefoneResponsavel',
            // 'ImagemCautela',
            'Equipamento',
            // 'StatusCautela',
            [   'label' => 'Status da Cautela',
                'attribute' => 'StatusCautela',
                'filter'=>array ("Em aberto" => "Em aberto", "Concluída" => "Concluída", "Em atraso" => "Em atraso"),
                'value' => 'StatusCautela'


            ],
            // 'idEquipamento',
            'idProjeto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
