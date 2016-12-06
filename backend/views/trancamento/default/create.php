<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trancamento */

$this->title = 'Create Trancamento';
$this->params['breadcrumbs'][] = ['label' => 'Trancamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trancamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
