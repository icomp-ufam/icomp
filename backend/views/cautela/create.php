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

$this->title = 'Gerar Cautela';
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-create">

    

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
