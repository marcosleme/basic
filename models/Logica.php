<?php

namespace app\models;

use Yii;

//Função que realiza todas operações matemáticas do exercício proposto 

class Logica //extends \yii\db\ActiveRecord
{
	const NUMEROS = array(20,65,682,1050,1558,4032,5065,5095,6063,15000); //Constante contendo os números do exercício
	
	//Função para impressão dos números do array
	public function printArray()
	{
		echo implode(', ',self::NUMEROS);
	}
	
	public function getArray()
	{
		return self::NUMEROS;
	}
	
	//Função realiza a subtração e então devolve o resto da divisão por 4
	public function mathLogic($a, $b){
		$result = ($b - $a) % 4;
		return $result;
	}
	
	//Recebe dois números inteiros
	//Devolve string contendo as operações matematicas realizadas. Ex: 20-15=5, 5%4=1
	public function generateResponse($a, $b){
		return $b. ' - '. $a. ' = '. ($b-$a). ', '. ($b-$a). ' % 4 = '. $this->mathLogic($a, $b);
	}
	
	//Percorre o array e passa por cada dupla de valores possíveis do array
	//Devolve um array de string contendos as respostas da função generateResponse
	public function subtractLogic(){
		$array = self::NUMEROS;
		$response = array();
		for($maior = 1; $maior < 10; $maior++){
			for($menor = 0; $menor < $maior; $menor++){
				if($this->mathLogic($array[$menor], $array[$maior]) == 0){
					array_push($response, $this->generateResponse($array[$menor], $array[$maior]));
				}
			}
		}
		return $response;
	}
	
	//Recebe dois números inteiros
	//Devolve string contendo a dupla de números inserida. Ex: 15; 20
	public function generatePairResponse($a, $b){
		return $a. '; '. $b;
	}
	
	//Percorre o array e passa por cada dupla de valores possíveis do array
	//Devolve um array de string contendos as respostas da função generatePairResponse
	public function showSubtractPairs(){
		$array = self::NUMEROS;
		$response = array();
		for($maior = 1; $maior < 10; $maior++){
			for($menor = 0; $menor < $maior; $menor++){
				if($this->mathLogic($array[$menor], $array[$maior]) == 0){
					array_push($response, $this->generatePairResponse($array[$menor], $array[$maior]));
				}
			}
		}
		return $response;		
	}
}