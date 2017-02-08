<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\DatePicker;
use \yii\helpers\ArrayHelper;
use yii\web\View;
use backend\models\Cautela;

/* @var $this yii\web\View */
/* @var $model backend\models\Cautela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-form">

<?php
$this->registerJs(
		    "
			$('#cautela-idequipamento').val($('#cautela-equipamento').val());
			
			$('#cautela-equipamento').on('change', function (e) {
				var optionSelected = $('option:selected', this);
				var valueSelected = this.value;
				$('#cautela-idequipamento').val(valueSelected);
			});	
			",
		    View::POS_READY,
		    'garante-idequipamento-handler'
		);
?>
    <?php $form = ActiveForm::begin(); ?>
    
	<div class="panel panel-default" style="width:80%">
	
	<div class="panel-heading">
    	<h3 class="panel-title"><b>Dados Respons&aacute;vel:</b></h3>
    </div>
	<div class="panel-body">    
	<div class="row">
    <?= $form->field($model, 'NomeResponsavel', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
    <?= $form->field($model, 'TelefoneResponsavel', ['options' => ['class' => 'col-md-3']])->widget(MaskedInput::className(), [
                            'mask' => '(99) 99999-9999'])->label("<b>Telefone:</b>") ?>
    
    <?= $form->field($model, 'Email',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="panel-heading">
    	<h3 class="panel-title"><b>Dados Equipamento:</b></h3>
    </div>
    <div class="panel-body"> 
    <div class="row">
    <?= $form->field($model, 'Equipamento', ['options' => ['class' => 'col-md-3']])->dropDownList(ArrayHelper::map(backend\models\Equipamento::getEquipamentosDisponiveisAll(),'idEquipamento','NomeEquipamento')) ?>
    </div>
    <div class="row">
    <?= $form->field($model, 'OrigemCautela', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>    
    <?= $form->field($model, 'idProjeto', ['options' => ['class' => 'col-md-3']])->dropDownList(ArrayHelper::map(backend\models\ContProjProjetos::find()->all(),'id','nomeprojeto')) ?>
	</div>
   </div>
     <div class="panel-heading">
    	<h3 class="panel-title"><b>Dados Cautela:</b></h3>
    </div>
    <div class="panel-body">
	<div class="row">
    <?= $form->field($model, 'StatusCautela', ['options' => ['class' => 'col-md-3']])->dropDownList([Cautela::getStatusAberto() => Cautela::getStatusAberto(),Cautela::getStatusConcluida()=> Cautela::getStatusConcluida(),Cautela::getStatusAtraso()=>Cautela::getStatusAtraso()]) ?>
   	</div>
	


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

	<div class="row">    
    <?= $form->field($model, 'ImagemCautela',['options'=>['class'=>'col-md-3']])->fileInput(['maxlength' => true]) ?>
	</div>
	</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>
    
	<?= $form->field($model, 'idEquipamento')->hiddenInput(['value'=>$model->Equipamento])->label(false) ?>
    <?php ActiveForm::end(); ?>

</div>
