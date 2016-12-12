<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\bckend\View */
/* @var $searchModel backend\models\AproveitamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aproveitamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aproveitamento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    	<?php 
    	if(isset($idAluno))
        	echo Html::a('Novo Aproveitamento', ['createbyaluno','idAluno'=>$idAluno], ['class' => 'btn btn-success']);
        else
        	echo Html::a('Novo Aproveitamento', ['create'], ['class' => 'btn btn-success']);
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codDisciplinaOrigemFK',
            'codDisciplinaDestinoFK',
            'nota',
            'frequencia',
            'situacao',
            // 'idAluno',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
