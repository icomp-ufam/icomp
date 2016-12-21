<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Portaria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portaria-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
    <div class="row">
    <?= $form->field($model, 'id', ['options' => ['class' => 'col-md-3']])->textInput() ?>
    </div>

    <div class="row">
    <?= $form->field($model, 'responsavel', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    </div>
-->
    <div class="row">
    <?= $form->field($model, 'descricao', ['options' => ['class' => 'col-md-8']])->textarea(['rows' => 10]) ?>
    </div>

    <div class="row">
            <?= $form->field($model, 'data0', ['options' => ['class' => 'col-md-3']])->widget(DatePicker::classname(), [
                'language' => Yii::$app->language,
                'options' => ['placeholder' => 'Selecione uma data',],
                'pluginOptions' => [
                    'format' => 'dd/mm/yyyy',
                    'todayHighlight' => true
                ]
            ])
            ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
