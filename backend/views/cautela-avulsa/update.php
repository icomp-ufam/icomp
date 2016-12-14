<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */

$this->title = 'Atualizar Dados: ' . $model->NomeResponsavel;
$this->params['breadcrumbs'][] = ['label' => 'Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NomeResponsavel, 'url' => ['view', 'NomeResponsavel' => $model->NomeResponsavel, 'id' => $model->NomeResponsavel]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="cautela-avulsa-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
