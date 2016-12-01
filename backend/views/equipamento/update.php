<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */

$this->title = 'Update Equipamento: ' . $model->IdEquipamento;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEquipamento, 'url' => ['view', 'id' => $model->IdEquipamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
