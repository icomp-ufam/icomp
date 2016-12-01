<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdCautela') ?>

    <?= $form->field($model, 'NomeResponsavel') ?>

    <?= $form->field($model, 'OrigemCautela') ?>

    <?= $form->field($model, 'DataDevolucao') ?>

    <?= $form->field($model, 'ImagemCautela') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'ValidadeCautela') ?>

    <?php // echo $form->field($model, 'TelefoneResponsavel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
