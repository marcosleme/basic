<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Doador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doador-form">
	
    <?php $form = ActiveForm::begin(); ?>
	

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput([
	'maxlength' => true,
	'placeholder' => 'exemplo@email.com',
	]) ?>

	<?= $form->field($model, 'cpf')->widget(\yii\widgets\MaskedInput::class, [
		'mask' => '999.999.999-99',
	]) ?>
	
	<?= $form->field($model, 'telefone')->widget(\yii\widgets\MaskedInput::class, [
		'mask' => '(99) 999999999',
	]) ?>

	<?= $form->field($model, 'data_nascimento')->widget(\yii\widgets\MaskedInput::class, [
		'mask' => '99/99/9999',
	]) ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intervalo_doacao')->dropDownList(['Selecione uma opção', 'Único', 'Bimestral', 'Semestral', 'Anual']) ?>

    <?= $form->field($model, 'valor_doacao')->textInput() ?>

    <?= $form->field($model, 'forma_pagamento')->dropDownList(['Selecione uma opção', 'Débito', 'Crédito'],['onchange'=>'displayFieldsByPaymentMethod()']) ?>



	<div id="debito">
    <?= $form->field($model, 'agencia')->textInput() ?>

    <?= $form->field($model, 'conta')->textInput() ?>
	</div>
	
	<div id="credito">
    <?= $form->field($model, 'bandeira_cartao')->dropDownList(['Selecione uma opção', 'Visa', 'Master', 'Ello']) ?>
		
    <?= $form->field($model, 'numero_cartao')->textInput() ?>
	</div>
	
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
	
    <?php ActiveForm::end(); ?>

</div>

<script>
	window.onload = function(){
		document.getElementById("debito").style.display = "none";
		document.getElementById("credito").style.display = "none";
	}
		
	function displayFieldsByPaymentMethod() {
		var mselect  =  document.getElementById("doador-forma_pagamento");
		var mselectvalue = mselect.options[mselect.selectedIndex].value;
		var mdivdebito =  document.getElementById("debito");
		var mdivcredito =  document.getElementById("credito");

		if (mselectvalue == 0) {
		   mdivdebito.style.display = "none";
		   mdivcredito.style.display = "none";
		}  
		if (mselectvalue == 1) {
		   mdivdebito.style.display = "block";
		   mdivcredito.style.display = "none";
		}  

		if (mselectvalue == 2) {
		  mdivdebito.style.display = "none";
		  mdivcredito.style.display = "block";

		}

	}   
</script>