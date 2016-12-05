<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aluno */



$this->title = 'Registrar Trancamento - Aluno: '.$model->aluno->nome;
$this->params['breadcrumbs'][] = ['label' => 'Trancamento de Curso', 'url' => ['/trancamento']];
//$this->params['breadcrumbs'][] = ['label' => 'Número: '.Yii::$app->request->get('idEdital'), 
//    'url' => ['edital/view','id' => Yii::$app->request->get('idEdital') ]];
 //   $this->params['breadcrumbs'][] = ['label' => 'Candidatos com inscrição finalizada', 
 //   'url' => ['candidatos/index','id' => Yii::$app->request->get('idEdital') ]];
$this->params['breadcrumbs'][] = $this->title;
?>

<p> <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['aluno/view', 'id' => $model->idAluno], ['class' => 'btn btn-warning']) ?> </p>

<div class="aluno-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
