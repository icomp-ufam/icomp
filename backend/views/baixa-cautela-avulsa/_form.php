<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautelaAvulsa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baixa-cautela-avulsa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCautelaAvulsa')->textInput() ?>

    <?= $form->field($model, 'Recebedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataDevolucao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Equipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ObservacaoBaixaCautela')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
