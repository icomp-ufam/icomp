<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descarte-equipamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NomeResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelefoneResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ObservacoesDescarte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Descartar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
