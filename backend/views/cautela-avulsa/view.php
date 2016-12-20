<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */

$this->title = $model->idCautelaAvulsa;
$this->params['breadcrumbs'][] = ['label' => 'Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-avulsa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCautelaAvulsa' => $model->idCautelaAvulsa, 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCautelaAvulsa' => $model->idCautelaAvulsa, 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja apagar este item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Dar Baixa Cautela', ['baixa-cautela-avulsa/create', 'id' => $model->idCautelaAvulsa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa nesta Cautela?',
                'method' => 'post',
                //$flagCautelaAvulsa = 1,
                
                //return ('BaixaCautelaController', [ 'flag' => $flagCautelaAvulsa]),
                
               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCautelaAvulsa',
            'id',
            'NomeResponsavel',
            'Email:email',
            'ValidadeCautela',
            'TelefoneResponsavel',
            'ObservacoesDescarte',
            'ImagemCautela',
            'StatusCautelaAvulsa',
        ],
    ]) ?>

</div>
