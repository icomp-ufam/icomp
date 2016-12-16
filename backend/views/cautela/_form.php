<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cautela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NomeResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrigemCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataDevolucao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ValidadeCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelefoneResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImagemCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Equipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StatusCautela')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
