<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cautela */

$this->title = 'Update Cautela: ' . $model->IdCautela;
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdCautela, 'url' => ['view', 'id' => $model->IdCautela]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cautela-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
