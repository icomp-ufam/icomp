<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Disciplina;
use yii\jui\AutoComplete;
use yii\helpers\Url;
use yii\web\JsExpression;
/* @var $this yii\backend\View */
/* @var $model backend\models\Aproveitamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aproveitamento-form">
	

    <?php $form = ActiveForm::begin(); ?>
	<div class="panel panel-default" style="width:50%">
	<div class="panel-heading">
                <h3 class="panel-title"><b>Disciplina Origem:</b></h3>
            </div>
	  <div class="panel-body">
		<div class="row">
		    <?php // $form->field($model, 'codDisciplinaOrigemFK')->textInput(['maxlength' => true]) ?>
		    <?=     
		    $form->field($model, 'codDisciplinaOrigemFK')->widget(AutoComplete::classname(), [
		    				'clientOptions' => [
		    						'source' => URL::to(['disciplina/autocompletedisciplina']),
		    						'minLength'=>3,
		    						'select' => new JsExpression("function( event, ui ) {
								        //console.log(ui);
								        $('[name=disciplinaOrigemNome]').val(ui.item.nome);
								        $('[name=disciplinaOrigemCreditos]').val(ui.item.creditos);
		    							$('[name=disciplinaOrigemCargaHoraria]').val(ui.item.cargaHoraria);
								      }")
		    				],
		    				'options'=>[
		    						'maxLength'=>10,
		    						'style'=>['display'=>'block',
		    								  'width'=>'100px',
								    ],
		    				]
		    		])->label("<font color='#FF0000'>*</font> <b>Cód. Disciplina Origem:</b>"); ?>
	</div>
	<div class="row">
	<span><font color='#FF0000'>*</font> <b>Nome Disciplina:</b></span><br/>
	<?php	echo Html::textInput("disciplinaOrigemNome","",['maxlength'=>100, 'style'=>['width'=>'250px']]); ?>
	</div>
	<div class="row">
	<span><font color='#FF0000'>*</font> <b>Créditos:</b></span><br/>
	<?php	echo Html::textInput("disciplinaOrigemCreditos","",['style'=>['width'=>'50px']]); ?>
	</div>
	<div class="row">
	<span><font color='#FF0000'>*</font> <b>Carga Horária (H):</b></span><br/>
	<?php	echo Html::textInput("disciplinaOrigemCargaHoraria","",['style'=>['width'=>'50px']]); ?>
	</div>
   </div>
  </div>
  <div class="panel panel-default" style="width:50%">
	<div class="panel-heading">
                <h3 class="panel-title"><b>Disciplina Destino:</b></h3>
            </div>
	  <div class="panel-body">
	<div class="row">
    <?php //$form->field($model, 'codDisciplinaDestinoFK')->textInput(['maxlength' => true]) ?>
	<?=     
    $form->field($model, 'codDisciplinaDestinoFK')->widget(AutoComplete::classname(), [
    				'clientOptions' => [
    						'source' => URL::to(['disciplina/autocompletedisciplina']),
    						'minLength'=>3,
    						'select' => new JsExpression("function( event, ui ) {
								        //console.log(ui);
								        $('[name=disciplinaDestinoNome]').val(ui.item.nome);
								        $('[name=disciplinaDestinoCreditos]').val(ui.item.creditos);
		    							$('[name=disciplinaDestinoCargaHoraria]').val(ui.item.cargaHoraria);
								      }")
    				],
    				'options'=>[
    						'maxLength'=>10,
    						'style'=>['display'=>'block',
		    								  'width'=>'100px',
								    ],
    				]
    		])->label("<font color='#FF0000'>*</font> <b>Cód. Disciplina Destino:</b>"); ?>
	</div>
	<div class="row">
	<span><font color='#FF0000'>*</font> <b>Nome Disciplina:</b></span><br/>
	<?php	echo Html::textInput("disciplinaDestinoNome","",['maxlength'=>100, 'style'=>['width'=>'250px']]); ?>
	</div>
	<div class="row">
	<span><font color='#FF0000'>*</font> <b>Créditos:</b></span><br/>
	<?php	echo Html::textInput("disciplinaDestinoCreditos","",['style'=>['width'=>'50px']]); ?>
	</div>
	<div class="row">
	<span><font color='#FF0000'>*</font> <b>Carga Horária (H):</b></span><br/>
	<?php	echo Html::textInput("disciplinaDestinoCargaHoraria","",['style'=>['width'=>'50px']]); ?>
	</div>
	</div>
	</div>
	<div class="panel panel-default" style="width:50%">
		<div class="panel-heading">
                <h3 class="panel-title"><b>Dados:</b></h3>
            </div>
	  <div class="panel-body">
	<div class="row">
    <?= $form->field($model, 'nota')->textInput(['style'=>['width'=>'100px']])->label("<font color='#FF0000'>*</font> <b>Nota:</b>"); ?>
	</div>
	<div class="row">
    <?= $form->field($model, 'frequencia')->textInput(['style'=>['width'=>'100px']])->label("<font color='#FF0000'>*</font> <b>Frequência (%)</b>"); ?>
	</div>
	<div class="row">
    <?= $form->field($model, 'situacao')->textInput(['maxlength' => true, 'style'=>['width'=>'100px']])->label("<font color='#FF0000'>*</font> <b>Situação:</b>"); ?>
	</div>
	<div class="row">
    <?= $form->field($model, 'idAluno')->hiddenInput(['value'=>$model->idAluno])->label(false) ?>
	</div>
  </div>
  </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
