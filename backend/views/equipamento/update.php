<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */

$this->title = 'Atualizar Dados: ' . $model->NomeEquipamento;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NomeEquipamento, 'url' => ['view', 'nome' => $model->NomeEquipamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipamento-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
