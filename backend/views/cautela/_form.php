<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\DatePicker;
use \yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Cautela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-form">

cautela-idequipamento
<?php
$this->registerJs(
		    "	
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

    <div class="row">
    <?= $form->field($model, 'TelefoneResponsavel', ['options' => ['class' => 'col-md-3']])->widget(MaskedInput::className(), [
                            'mask' => '(99) 99999-9999'])->label("<b>Telefone:</b>") ?>
    </div>

   

   <?= $form->field($model, 'Equipamento')->dropDownList([ArrayHelper::map(backend\models\Equipamento::find()->all(),'idEquipamento','NomeEquipamento')]) ?>

	<?= $form->field($model, 'idEquipamento')->hiddenInput(['value'=>$model->Equipamento])->label(false) ?>

    <?= $form->field($model, 'StatusCautela')->dropDownList(['Em aberto' => 'Em aberto','Concluída'=> 'Concluída','Em atraso'=>'Em atraso']) ?>

    

    <?= $form->field($model, 'idProjeto')->dropDownList([ArrayHelper::map(backend\models\ContProjProjetos::find()->all(),'id','nomeprojeto')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
