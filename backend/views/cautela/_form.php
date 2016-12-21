<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\mpdf\Pdf;


/* @var $this yii\web\View */
/* @var $model app\models\Cautela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NomeResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrigemCautela')->textInput(['maxlength' => true]) ?>

    <div class="row">
                <?= $form->field($model, 'DataDevolucao', ['options' => ['class' => 'col-md-4']])->widget(DatePicker::classname(), [
                    'language' => 'pt-BR',
                    'options' => ['placeholder' => 'Selecione a Data de Devolução ...',],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ])->label("<font color='#FF0000'>*</font> <b>Data de Devolução:</b>")
                ?>
    </div>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>


    <div class="row">
                <?= $form->field($model, 'ValidadeCautela', ['options' => ['class' => 'col-md-4']])->widget(DatePicker::classname(), [
                    'language' => 'pt-BR',
                    'options' => ['placeholder' => 'Selecione a Validade ...',],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ])->label("<font color='#FF0000'>*</font> <b>Data da Validade:</b>")
                ?>
    </div>

    <?= $form->field($model, 'TelefoneResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImagemCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Equipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StatusCautela')->dropDownList(['Em aberto' => 'Em aberto','Concluída'=> 'Concluída','Em atraso'=>'Em atraso']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
