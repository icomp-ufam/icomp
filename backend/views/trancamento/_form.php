<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Trancamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trancamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idAluno')->textInput() ?>

    <?= $form->field($model, 'dataSolicitacao')->textInput() ?>

    <?= $form->field($model, 'dataAprovOrientador')->textInput() ?>

    <?= $form->field($model, 'dataInicio')->textInput() ?>

    <?= $form->field($model, 'prevTermino')->textInput() ?>

    <?= $form->field($model, 'dataTermino')->textInput() ?>

    <?= $form->field($model, 'justificativa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
