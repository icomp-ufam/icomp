<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;
use \kartik\widgets\FileInput;
use yii\widgets\MaskedInput;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
$this->registerJs("
			$('#cautelaavulsa-validadecautela').on('change', function (e){
				var agora = new Date();
				var datas = this.value.split('-');
				var devol = new Date(datas[2], datas[1]-1, datas[0], agora.getHours(), agora.getMinutes(), agora.getSeconds(),agora.getMilliseconds());

				if(devol.getTime()>=agora.getTime()){
					//Status Cautela: Em Aberto
					$('#cautelaavulsa-statuscautelaavulsa').val('Em aberto');
				}else
				if(devol.getTime()<agora.getTime()){
					//Status Cautela: Em Atraso
					$('#cautelaavulsa-statuscautelaavulsa').val('Em atraso');
				}
			});		
			",
		    View::POS_READY,
		    'status-automatico-handler'
		);
?>

<div class="cautela-avulsa-form">

	<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['cautela-avulsa/index'], ['class' => 'btn btn-warning']) ?>

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
    <?= $form->field($model, 'TelefoneResponsavel',['options'=>['class'=>'col-md-3']])->widget(MaskedInput::className(),[
    'name' => 'phone',
    'mask' => '(99)-99999-9999',
]); ?>
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
	<?= $form->field($model, 'NomeEquipamento',	['options'=>['class'=>'col-md-3']])->textInput(['maxlength'=>true]) ?>
	</div>
	<div class="row">
	<?= $form->field($model, 'origem',				['options'=>['class'=>'col-md-3']])->textInput(['maxlength'=>true]) ?>
	
	<?= $form->field($model, 'StatusCautelaAvulsa', ['options'=>['class'=>'col-md-2']])->textInput(['readOnly']) ?>
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
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
