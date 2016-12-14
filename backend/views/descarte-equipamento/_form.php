<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descarte-equipamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEquipamento')->textInput() ?>

    <?= $form->field($model, 'NomeResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelefoneResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ObservacoesDescarte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
