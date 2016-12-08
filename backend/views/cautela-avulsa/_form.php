<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-avulsa-form">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar  ', ['index'], ['class' => 'btn btn-warning']) ?> 
    <br><br>

    <div class="panel panel-default">
        <div class="panel-heading">
                        <h3 class="panel-title"><b>Dados da Cautela Avulsa</b></h3>
                    </div>
        <div class="panel-body">

            <?= $form->field($model, 'id')->label("<font color='#FF0000'>*</font> <b>ID Do Resposável:</b>") ?>
            <?= $form->field($model, 'NomeResponsavel')->label("<font color='#FF0000'>*</font> <b>Nome Do Resposável:</b>") ?>

            <?= $form->field($model, 'Email')->label("<font color='#FF0000'>*</font> <b>Email:</b>") ?>

            <?= $form->field($model, 'TelefoneResponsavel')->label("<font color='#FF0000'>*</font> <b>Telefone do Responsável:</b>") ?>

            <?= $form->field($model, 'ValidadeCautela')->label("<b>Validade da Cautela:</b>") ?>

            <?= $form->field($model, 'ObservacoesDescarte')->label("<font color='#FF0000'>*</font> <b>Observações de Descarte:</b>") ?>

            <?= $form->field($model, 'ImagemCautela')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Gerar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar',['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>