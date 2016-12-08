<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

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
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
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
        ],
    ]) ?>

</div>
