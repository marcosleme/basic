<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->textInput() ?>

    <?= $form->field($model, 'telefone')->textInput() ?>

    <?= $form->field($model, 'data_nascimento')->textInput() ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_cadastro')->textInput() ?>

    <?= $form->field($model, 'intervalo_doacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_doacao')->textInput() ?>

    <?= $form->field($model, 'forma_pagamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agencia')->textInput() ?>

    <?= $form->field($model, 'conta')->textInput() ?>

    <?= $form->field($model, 'numero_cartao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
