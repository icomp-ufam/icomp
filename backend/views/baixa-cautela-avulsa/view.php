<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautelaAvulsa */

$this->title = "Responsável: ".$model->baixatemcautela->NomeResponsavel; 
$this->params['breadcrumbs'][] = ['label' => 'Baixa Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] =  $model->idBaixaCautelaAvulsa;
?>
<div class="baixa-cautela-avulsa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['cautela-avulsa/index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idBaixaCautelaAvulsa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover', ['delete', 'id' => $model->idBaixaCautelaAvulsa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idBaixaCautelaAvulsa',
            'idCautelaAvulsa',
            'Recebedor',
            'DataDevolucao',
            'Equipamento',
            'ObservacaoBaixaCautela',
        ],
    ]) ?>

</div>
