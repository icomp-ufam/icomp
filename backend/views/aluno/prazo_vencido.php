<?php
use app\models\LinhaPesquisa;
use xj\bootbox\BootboxAsset;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'Alunos com prazo vencido';
$this->params['breadcrumbs'][] = $this->title;
BootboxAsset::register($this);
BootboxAsset::registerWithOverride($this);
/*
<ul>
<?php foreach ($aluno as $aluno): ?>
    <?= DetailView::widget([
	'model' => $aluno,
	'attributes' => [
	'matricula',
	'nome',
	],
	])?>

	<?= GridView::widget([
    'dataProvider' => $aluno,
    'columns' => [
        'matricula',
        'nome',
    ],
]) ?>
<?php endforeach; ?>
</ul>
*/
use app\models\Aluno;

use yii\data\SqlDataProvider;

$count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM j17_aluno')->queryScalar();

$provider = new SqlDataProvider([
    'sql' => 'SELECT * FROM j17_aluno',
    'params' => [':matricula' => 1],
    'totalCount' => $count,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'attributes' => [
            'matricula',
            'nome',
            'dataingresso',
        ],
    ],
]);

// returns an array of data rows
$models = $provider->getModels();

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'matricula',
        'nome',
        [   'label' => 'Curso',
            'attribute' => 'curso',
            'filter'=>array (1 => "Mestrado",2 => "Doutorado"),
            'value' => function ($model) {
                return $model->curso == 1 ? 'Mestrado' : 'Doutorado';
            },
        ],
        [   'label' => 'Status',
            'attribute' => 'status',
            'filter'=>array (0 => "Corrente",1 => "Egresso",2 => "Desistente",3 => "Desligado",4 => "Jubilado",5 => "Matrícula Trancada"),
            'value' => function ($model) {
                $statusAluno = array (0 => "Corrente",1 => "Egresso",2 => "Desistente",3 => "Desligado",4 => "Jubilado",5 => "Matrícula Trancada");
                return $statusAluno[$model->status];
            },
        ],
        [   'label' => 'Ingresso',
            'attribute' => 'dataingresso',
            'value' => function ($model) {
                return date("m-Y", strtotime($model->dataingresso));
                },
        ],
        [
            'label' => 'Dias Atrasado',
            'attribute' => 'diasParaFormar',
            'value' => 'diasParaFormar'
        ],
        'nomeOrientador',
        [   'label' => 'Linha Pesquisa',
            'attribute' => 'siglaLinhaPesquisa',
            'filter' => Html::activeDropDownList($searchModel, 'siglaLinhaPesquisa', \yii\helpers\ArrayHelper::map(LinhaPesquisa::find()->asArray()->all(), 'id', 'sigla'),[  'class'=>'form-control','prompt' => 'Selecione a Linha']),
            'contentOptions' => function ($model){
              return ['style' => 'background-color: '.$model->linhaPesquisa->cor];
            },
            'format' => 'html',
            'value' => function ($model){
              return "<span class='fa ". $model->linhaPesquisa->icone ." fa-lg'/> ". $model->siglaLinhaPesquisa;
            }
        ],
        /*
        ['class' => 'yii\grid\ActionColumn',
          'template'=>'{view} {delete} {update}',
            'buttons'=>[
              'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                        'data' => [
                            'confirm' => 'Remover o Aluno \''.$model->nome.'\'?',
                            'method' => 'post',
                        ],
                        'title' => Yii::t('yii', 'Remover Aluno'),
                ]);   
              }
          ]                            
        ],
        */
    ],
]); ?>
