<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//teste

/* @var $this yii\web\View */
/* @var $model app\models\DescarteEquipamento */

$this->title = $model->descarteTemEquipamento->NomeEquipamento; //$model->idDescarte;
$this->params['breadcrumbs'][] = ['label' => 'Descarte Equipamentos', 'url' => ['equipamento/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descarte-equipamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['equipamento/index'], ['class' => 'btn btn-warning']) ?>
        <?php // echo Html::a('Update', ['update', 'id' => $model->idDescarte], ['class' => 'btn btn-primary']) ?>
        <?php /*echo Html::a('Delete', ['delete', 'id' => $model->idDescarte], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idDescarte',
            'NomeResponsavel',
            'Email:email',
            [
            	'attribute'=>'TelefoneResponsavel',
            	'format'=>'text',
            	'value' =>$model->telefoneFormatado,
            ],
            'ObservacoesDescarte',
        ],
    ]) ?>

</div>
