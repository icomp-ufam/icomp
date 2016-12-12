<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codDisciplina')->textInput(['maxlength' => true, 'style'=>['width'=>'250px']]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'style'=>['width'=>'250px']]) ?>
<div style="display:inline">
    <?= $form->field($model, 'creditos')->textInput(['style'=>['width'=>'50px', 'display'=>'inline','margin-left'=>'32px']]) ?>

    <?= $form->field($model, 'cargaHoraria')->textInput(['style'=>['width'=>'50px','display'=>'inline']]) ?>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
