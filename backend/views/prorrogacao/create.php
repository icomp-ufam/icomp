<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prorrogacao */

$this->title = 'Registrar Prorrogacao - Aluno: '.$model->aluno->nome;
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Prorrogações', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prorrogacao-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
