<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doador */
//$model = new app\models\Doador();

$this->title = 'Criar Doador';
$this->params['breadcrumbs'][] = ['label' => 'Doadores'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
