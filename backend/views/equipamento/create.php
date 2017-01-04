<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Equipamento */

$this->title = 'Cadastrar Equipamento';
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipamento-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
