<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aluno */

$this->title = 'Registrar Trancamento - Aluno: '.$model->aluno->nome;
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Trancamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<p> <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['/trancamento/index', 'id' => $model->idAluno], ['class' => 'btn btn-warning']) ?> </p>

<div class="aluno-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
