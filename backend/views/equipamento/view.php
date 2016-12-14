<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */

$this->title = $model->idEquipamento;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idEquipamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idEquipamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja deletar este item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Descartar Equipamento', ['descarte-equipamento/create', 'id' => $model->idEquipamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa neste Equipamento?',
                'method' => 'post',
               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ], 
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEquipamento',
            'NomeEquipamento',
            'Nserie',
            'NotaFiscal',
            'Localizacao',
            'StatusEquipamento',
            'OrigemEquipamento',
            'ImagemEquipamento',
        ],
    ]) ?>

</div>
