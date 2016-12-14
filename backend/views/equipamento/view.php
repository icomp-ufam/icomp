<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */

$this->title = $model->NomeEquipamento;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipamento-view">

    

    <p>
      <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar  ',
        ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Editar', ['update', 'id' => $model->idEquipamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->idEquipamento], [
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
