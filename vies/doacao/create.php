<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doador */

$this->title = 'Create Doador';
$this->params['breadcrumbs'][] = ['label' => 'Doadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
