<?php
use \yii\widgets\LinkPager;
$this->title = 'Alunos com prazo vencido';
$this->params['breadcrumbs'][] = $this->title;
?>

<ul>
<?php foreach($aluno as $aluno):?>
	<li>
		<?=$aluno['nome']." ".$aluno['dias']." ".$aluno['curso']?>
	</li>
<?php endforeach?>
</ul>

