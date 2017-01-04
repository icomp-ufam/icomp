<?php



use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Equipamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NomeEquipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nserie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NotaFiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Localizacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StatusEquipamento')->dropDownList(['Disponível' => 'Disponível','Em uso'=> 'Em uso','Descartado'=>'Descartado']) ?>

    <?= $form->field($model, 'idProjeto')->dropDownList([ArrayHelper::map(backend\models\ContProjProjetos::find()->all(),'id','nomeprojeto')]) ?>

    <?= $form->field($model, 'OrigemEquipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImagemEquipamento')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
