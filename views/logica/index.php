<?php
/* @var $this yii\web\View */
?>
<h1>Exercício de Lógica</h1>

<p>
Dado o seguinte array: [<?php echo $model->printArray(); ?>]; <br>
Faça uma função que pega a diferença entre os índices (exemplo: 65-20; 682-
65) e verifique se a diferença dividida por 4 é uma divisão exata, no final a função deve
retornar os valores que divido por 4 resulta em uma divisão exata.
</p>
<p>
Apenas as seguintes subtrações após serem divididas por 4 tem seu resto igual a 0:
</p>
<p>
	<?php 
		$numeros = $model->getArray();
		$response = $model->subtractLogic();
		echo implode('<br>', $response);
	?>
</p>
<p>
Portanto os pares que possuem o resultado de sua subtração que dividido por 4 são definidos como divisão exata são os seguintes:
</p>

<p>
	<?php 
		$response = $model->showSubtractPairs();
		echo '('. implode('), (', $response) . ')';
	?>
</p>
