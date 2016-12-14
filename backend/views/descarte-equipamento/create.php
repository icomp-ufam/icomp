<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamento */

$this->title = 'Descartar Equipamento';
$this->params['breadcrumbs'][] = ['label' => 'Descarte Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descarte-equipamento-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
