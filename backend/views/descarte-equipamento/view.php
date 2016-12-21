<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//teste

/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamento */

$this->title = $model->idDescarte;
$this->params['breadcrumbs'][] = ['label' => 'Descarte Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descarte-equipamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idDescarte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idDescarte], [
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
            'idDescarte',
            'NomeResponsavel',
            'Email:email',
            'TelefoneResponsavel',
            'ObservacoesDescarte',
        ],
    ]) ?>

</div>
