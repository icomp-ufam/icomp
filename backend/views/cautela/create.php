<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cautela */

if ($model->StatusCautela == 1){
	$titulo = "Em aberto";
}
else if ($model->StatusCautela == 2){
	$titulo = "Concluída";
}
else if ($model->StatusCautela == 3){
	$titulo = "Em atraso";
}

$this->title = 'Create Cautela';
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
