<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cautela */

$this->title = 'Update Cautela: ' . $model->NomeResponsavel;
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NomeResponsavel, 'url' => ['view', 'id' => $model->NomeResponsavel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cautela-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
