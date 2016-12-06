<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrancamentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trancamento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idAluno') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'dataSolicitacao') ?>

    <?= $form->field($model, 'dataInicio') ?>

    <?php // echo $form->field($model, 'prevTermino') ?>

    <?php // echo $form->field($model, 'dataTermino') ?>

    <?php // echo $form->field($model, 'justificativa') ?>

    <?php // echo $form->field($model, 'documento') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
