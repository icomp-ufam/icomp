<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prorrogacao */

$this->title = 'Create Prorrogacao';
$this->params['breadcrumbs'][] = ['label' => 'Prorrogacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prorrogacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
