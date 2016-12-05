<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trancamento */

$this->title = 'Update Trancamento: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trancamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$model->dataInicio0 = date('d/m/Y', strtotime($model->dataInicio));
$model->prevTermino0 = date('d/m/Y', strtotime($model->prevTermino));

?>
<div class="trancamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateForm', [
        'model' => $model,
    ]) ?>

</div>
