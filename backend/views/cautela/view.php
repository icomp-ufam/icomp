<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\backend\web\reportes;

/* @var $this yii\web\View */
/* @var $model app\models\Cautela */
/* <a href="web/reportes/produtos.php">Gerar Pdf</a> */

$this->title = $model->NomeResponsavel;
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-view">



    <p>
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar  ',
            ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Editar', ['update', 'id' => $model->idCautela], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->idCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja deletar esse item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('<span class="glyphicon glyphicon-print"></span>  Convite', ['convitepdf', 'idDefesa' => $model->idDefesa, 'aluno_id' => $model->aluno_id], ['class' => 'btn btn-success', 'target' => '_blank']);?>

<<<<<<< HEAD
=======
        <?= Html::a('Dar Baixa Cautela', ['baixa-cautela/create', 'id' => $model->idCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa nesta Cautela?',
                'method' => 'post',
                //$model->flagCautela = 1,
               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ], 
        ]) ?>
>>>>>>> 169d454f11048bd812fcddbcc4aff076c85af944
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
        ],
    ]) ?>

</div>
