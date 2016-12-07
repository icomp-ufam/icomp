<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NomeEquipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nserie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NotaFiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Localizacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StatusEquipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrigemEquipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImagemEquipamento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
