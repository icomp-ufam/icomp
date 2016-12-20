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
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> Gerar Pdf', ['backend/web/reportes/produtos.php', 'id' => $model->idCautela], ['class' => 'btn btn-success']) ?>

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
