<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamento */

$this->title = 'Descartar Equipamento';
$this->params['breadcrumbs'][] = ['label' => 'Descartar Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descarte-equipamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
