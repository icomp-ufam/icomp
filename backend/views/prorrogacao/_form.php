<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prorrogacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prorrogacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'idAluno')->textInput() ?>

    <?= $form->field($model, 'dataSolicitacao')->textInput() ?>

    <?= $form->field($model, 'qtdDias')->textInput() ?>

    <?= $form->field($model, 'justificativa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'previa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
