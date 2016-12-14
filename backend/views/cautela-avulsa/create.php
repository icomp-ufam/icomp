<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */

$this->title = 'Gerar Cautela Avulsa';
$this->params['breadcrumbs'][] = ['label' => 'Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-avulsa-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
