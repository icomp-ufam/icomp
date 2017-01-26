<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;
use \kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-avulsa-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="panel panel-default" style="width:80%">
	
	<div class="panel-heading">
    	<h3 class="panel-title"><b>Dados Respons&aacute;vel:</b></h3>
    </div>
	<div class="panel-body">    
    <?php //= $form->field($model, 'id')->textInput() ?>
	
	<div class="row">
    <?= $form->field($model, 'NomeResponsavel',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
    <?= $form->field($model, 'Email',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true]) ?>
	
	</div>
	<div class="row">
    <?= $form->field($model, 'TelefoneResponsavel',['options'=>['class'=>'col-md-3']])->textInput() ?>
	</div>
	</div>
	
	<div class="panel-heading">
    	<h3 class="panel-title"><b>Dados Cautela:</b></h3>
    </div>
	<div class="panel-body">
	<div class="row">
	<?= $form->field($model, 'ValidadeCautela',['options'=>['class'=>'col-md-2']])->widget(DatePicker::classname(), [
			    //'language' => 'pt-BR',
			    'dateFormat' => 'dd-MM-yyyy',
	]) ?>
	
	</div>
	<div class="row">
	<?= $form->field($model, 'StatusCautelaAvulsa',['options'=>['class'=>'col-md-2']])->dropDownList(['Em aberto' => 'Em aberto','Concluída'=> 'Concluída','Em atraso'=>'Em atraso']) ?>
	</div>
	<div class="row">
    <?= $form->field($model, 'ObservacoesDescarte',['options'=>['class'=>'col-md-5']])->textarea(['maxlength' => true]) ?>    
	</div>
	<div class="row">    
    <?= $form->field($model, 'ImagemCautela',['options'=>['class'=>'col-md-3']])->fileInput(['maxlength' => true]) ?>
	</div>
	</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
