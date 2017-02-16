<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\MaskedInput;
use app\models\CautelaAvulsa;
/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */

$this->title = $model->NomeResponsavel;
$this->params['breadcrumbs'][] = ['label' => 'Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->title = "Responsável: ".$this->title;
?>
<div class="cautela-avulsa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['cautela-avulsa/index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Atualizar', ['update', 'idCautelaAvulsa' => $model->idCautelaAvulsa, 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
        <?php
        	if($model->StatusCautelaAvulsa !== CautelaAvulsa::getStatusConcluida()){
        	echo  Html::a('Dar Baixa Cautela', ['baixa-cautela-avulsa/create', 'id' => $model->idCautelaAvulsa], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa nesta Cautela?',
                'method' => 'post',
                //$flagCautelaAvulsa = 1,

                //return ('BaixaCautelaController', [ 'flag' => $flagCautelaAvulsa]),

               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ],
        ]); }?>        
        <?= Html::a('Remover', ['delete', 'idCautelaAvulsa' => $model->idCautelaAvulsa, 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja apagar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCautelaAvulsa',
            [
            	'attribute'=>'id',
            	'value'=>(($model->cautelaAvulsaTemUsuario != null)? $model->cautelaAvulsaTemUsuario->nome : "Usuário Não Encontrado"),
            ],
            'NomeResponsavel',
            'Email:email',
            'ValidadeCautela',
            [
            	'attribute'=>'TelefoneResponsavel',
            	'format'=>'text',
            	'value' =>$model->telefoneFormatado,
            ],
            'ObservacoesDescarte',
        	[
        	'attribute' => 'ImagemCautela',
        		//'value' => "<a href=localhost/novoppgi/backend/web/".$model->edital."' target = '_blank'> Baixar </a>",
    	    	'format'=>['image', ['width'=>100, 'height'=>100]],
	        	//'value' => "<a href='".$model->ImagemCautela."' target = '_blank'> Foto  </a>"
        		'visible'=>((trim($model->ImagemCautela)!='')?true:false)
        	],
            'StatusCautelaAvulsa',
        ],
    ]) ?>

</div>
