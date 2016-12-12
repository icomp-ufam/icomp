<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Portaria */

$this->title = 'Nova Portaria';
$this->params['breadcrumbs'][] = ['label' => 'Portarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portaria-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
