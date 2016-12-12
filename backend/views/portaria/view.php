<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Portaria */

$this->title = 'Visualizar Portaria - '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Portarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portaria-view">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <p> 
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['index'], ['class' => 'btn btn-warning']) ?>
        <!--p><?php Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></p-->
        <?= Html::a('<span class="fa fa-trash-o"></span> Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja excluir esta portaria?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'responsavel',
            'descricao:ntext',
            //'data',
            [
            'attribute' => 'data',
            'value' => date('d/m/Y', strtotime($model->data))
            ],
            //'documento:ntext',
            [
            'attribute' => 'documento',
            'format' => 'html',
            'value' => '<span class="fa fa-file-pdf-o"></span>   '.
                        Html::a(
                                 explode('uploads/portaria/', $model->documento)[1],
                                 $model->documento,
                                [
                                    'target' => '_blank',
                                    'title' => Yii::t('yii', 'Download do Documento'),
                                    'data-pjax'=> "0",
                                ]
                        )
            ], 
        ],
    ]) ?>

</div>
