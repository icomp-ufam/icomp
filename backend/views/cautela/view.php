<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cautela */

$this->title = $model->idCautela;
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idCautela], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
<<<<<<< HEAD

        <?= Html::a('<span class="glyphicon glyphicon-print"></span>  Convite', ['convitepdf', 'idDefesa' => $model->idDefesa, 'aluno_id' => $model->aluno_id], ['class' => 'btn btn-success', 'target' => '_blank']);?>
=======
>>>>>>> origin/master

        <?= Html::a('Dar Baixa Cautela', ['baixa-cautela/create', 'id' => $model->idCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa nesta Cautela?',
                'method' => 'post',
                //$model->flagCautela = 1,
               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ], 
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCautela',
            'NomeResponsavel',
            'OrigemCautela',
            'DataDevolucao',
            'Email:email',
            'ValidadeCautela',
            'TelefoneResponsavel',
            'ImagemCautela',
            'Equipamento',
            'StatusCautela',
        ],
    ]) ?>

</div>
