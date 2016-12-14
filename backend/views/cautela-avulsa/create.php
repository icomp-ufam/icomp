<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */

$this->title = 'Gerar Cautela Avulsa';
$this->params['breadcrumbs'][] = ['label' => 'Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-avulsa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
