<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descarte-equipamento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idEquipamento') ?>

    <?= $form->field($model, 'idDescarte') ?>

    <?= $form->field($model, 'NomeResponsavel') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'TelefoneResponsavel') ?>

    <?php // echo $form->field($model, 'ObservacoesDescarte') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
