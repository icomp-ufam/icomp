<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipamento-form">

	

    <?php $form = ActiveForm::begin(); ?>
    
	<div class="panel panel-default" style="width:80%">
	<div class="panel-heading">
    	<h3 class="panel-title"><b>Dados Equipamento:</b></h3>
    </div>
	<div class="panel-body">    
	<div class="row">
    <?= $form->field($model, 'NomeEquipamento', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
    <?= $form->field($model, 'Nserie', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NotaFiscal', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    </div>
	<div class="row">
    <?= $form->field($model, 'Localizacao', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>    
	
    <?= $form->field($model, 'OrigemEquipamento', ['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
	<?= $form->field($model, 'StatusEquipamento', ['options' => ['class' => 'col-md-3']])->dropDownList(['Disponível' => 'Disponível','Em uso'=> 'Em uso','Descartado'=>'Descartado']) ?>
	
    <?= $form->field($model, 'ImagemEquipamento', ['options' => ['class' => 'col-md-3']])->fileInput() ?>
    </div>
	</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
