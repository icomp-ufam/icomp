<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Cautela;
/* @var $this yii\web\View */
/* @var $model backend\models\Cautela */

$this->title = $model->NomeResponsavel;
$this->params['breadcrumbs'][] = ['label' => 'Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cautela-view">



     <p>
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['cautela/index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idCautela], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->idCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>


       <?= Html::a('<span class="glyphicon glyphicon-file"></span> Gerar Pdf', ['cautela/produtos', 'id' => $model->idCautela], [
                            'target' => '_blank', 'class' => 'btn btn-info']) ?>

		<?php if($model->StatusCautela !== Cautela::getStatusConcluida()){ ?>
        <?php echo Html::a('Dar Baixa Cautela', ['baixa-cautela/create', 'id' => $model->idCautela], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa nesta Cautela?',
                'method' => 'post',
                //$model->flagCautela = 1,
               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ],
        ]); }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCautela',
            'NomeResponsavel',
            'OrigemCautela',
            'DataDevolucao',
            'Email:email',
            //'ValidadeCautela',
            'TelefoneResponsavel',
            'StatusCautela',
            [
            	'attribute'=>'NomeEquipamento',
            ],
        	'idEquipamento',
            [
            	'attribute'=>'idProjeto',
            	'value'=>$model->cautelatemprojeto->nomeprojeto,
            ],
        	[
	        	'attribute' => 'ImagemCautela',
	        	//'value' => "<a href=localhost/novoppgi/backend/web/".$model->edital."' target = '_blank'> Baixar </a>",
	        	'format'=>['image', ['width'=>100, 'height'=>100]],
	        	//'value' => "<a href='".$model->ImagemCautela."' target = '_blank'> Foto  </a>"
        		'visible'=>((trim($model->ImagemCautela)!='')?true:false)
        	],
        ],
    ]) ?>

</div>
