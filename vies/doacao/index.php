<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Doador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'email:email',
            'cpf',
            'telefone',
            //'data_nascimento',
            //'endereco',
            //'data_cadastro',
            //'intervalo_doacao',
            //'valor_doacao',
            //'forma_pagamento',
            //'agencia',
            //'conta',
            //'numero_cartao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Doador $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
