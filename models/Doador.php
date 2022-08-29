<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doadores".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $cpf
 * @property string $telefone
 * @property string $data_nascimento
 * @property string $endereco
 * @property string $data_cadastro
 * @property string $intervalo_doacao
 * @property int $valor_doacao
 * @property string $forma_pagamento
 * @property string $agencia
 * @property string $conta
 * @property string $numero_cartao
 */
class Doador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	 const NAOSELECIONADO = 0;
	 const DEBITO = 1;
	 const CREDITO = 2;
    public static function tableName()
    {
        return 'doadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'cpf', 'telefone', 'data_nascimento', 'endereco', 'intervalo_doacao', 'valor_doacao', 'forma_pagamento'], 'required', 'message' => '{attribute} não pode estar em branco.'],
            [['agencia', 'conta'], 'string', 'max' => 7],
			[['valor_doacao'], 'integer'],
            [['data_nascimento', 'data_cadastro'], 'safe'],
            [['bandeira_cartao','cpf', 'telefone'], 'string', 'max' => 15],
            [['nome', 'endereco'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30],
            [['intervalo_doacao', 'forma_pagamento'], 'string', 'max' => 10],
            [['numero_cartao'], 'string', 'max' => 20],
			//[['telefone'], 'match' ,'pattern'=>'/\(\ds{2}\)\ \d{7}(\d|\ ){2}/', 'message'=> 'Telefone deve estar no formato (99) 999999999.'],
			//[['cpf'], 'match' ,'pattern'=>'/\d{3}\.\d{3}\.\d{3}\.\-\d{2}/', 'message'=> 'CPF deve estar no formato 999.999.999-99.'],
			//[['numero_cartao'], 'match' ,'pattern'=>'/((\d){16}{0,1}/', 'message'=> 'Insira apenas numeros.'],
			//[['telefone'], 'match' ,'pattern'=>'/\d{10,13}/', 'message'=> 'Insira apenas numeros.'],
			//[['numero_cartao'], 'match' ,'pattern'=>'/(\d){0,10,12}/', 'message'=> 'Insira apenas numeros.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'cpf' => 'CPF',
            'telefone' => 'Telefone',
            'data_nascimento' => 'Data de Nascimento',
            'endereco' => 'Endereço',
            'data_cadastro' => 'Data de Cadastro',
            'intervalo_doacao' => 'Intervalo de Doação',
            'valor_doacao' => 'Valor da Doação',
            'forma_pagamento' => 'Forma de Pagamento',
            'agencia' => 'Agência',
            'conta' => 'Conta',
            'bandeira_cartao' => 'Bandeira do Cartão',
            'numero_cartao' => 'Número do Cartão',
        ];
    }
	
	
	public function validateDonation()
	{
		if($this->intervalo_doacao == self::NAOSELECIONADO){
			$this->addError('intervalo_doacao', 'Escolha o intervalo de doação');			
			return false;
		}
		
		if($this->validatePaymentMethod()){
			
			date_default_timezone_set('America/Sao_Paulo');		
			$this->data_cadastro = date('d-m-y h:i:s');	
			
			switch ($this->bandeira_cartao) {
				case 1:
					$this->bandeira_cartao = 'visa';
					break;
				case 2:
					$this->bandeira_cartao = 'master';
					break;
				case 3:
					$this->bandeira_cartao = 'ello';
					break;
			}
			
			switch ($this->forma_pagamento) {
				case 1:
					$this->bandeira_cartao = 'debito';
					break;
				case 2:
					$this->bandeira_cartao = 'credito';
					break;
			}
			
			switch ($this->intervalo_doacao) {
				case 1:
					$this->intervalo_doacao = 'unico';
					break;
				case 2:
					$this->intervalo_doacao = 'bimestral';
					break;
				case 3:
					$this->intervalo_doacao = 'semestral';
					break;
				case 4:
					$this->intervalo_doacao = 'anual';
					break;
			}
			
			return true;
		} else{
			return false;
		}
	}
	
	/*Funcao verifica qual metodo de pagamento realizado 
	*Verifica se os campos foram preenchidos corretamente a partir do metodo de pagamento selecionado
	*Limpa os campos de pagamento nao utilizados e devolve mensagens de erro caso algum registro nao esteja de acordo
	*/
	public function validatePaymentMethod()
	{
		$validado = false;
		
		if($this->forma_pagamento == self::DEBITO){
			
			$validado = true;
			$this->bandeira_cartao = null;
			$this->numero_cartao = null;
			
			if(strlen($this->agencia) < 1){
				$this->addError('agencia', 'Agencia deve ser preenchida');
				$validado = false;
			}
			
			if(strlen($this->conta) < 1){
				$this->addError('conta', 'Conta deve ser preenchida');
				$validado = false;
			}
			
		}
		
		if($this->forma_pagamento == self::CREDITO){
			$this->agencia = null;
			$this->conta = null;
			
			if($this->bandeira_cartao == self::NAOSELECIONADO){
				$this->addError('bandeira_cartao', 'Escolha a bandeira do cartão');
			}
			if($this->validateCreditCard()){
				$validado = true;
			}
		}
		
		if($this->forma_pagamento == self::NAOSELECIONADO){
			$this->addError('forma_pagamento', 'Escolha uma forma de pagamento');
		}
		
		if($validado){
			return true;
		} else {
			return false;
		}
		
	}
	
	/**Funcao de validacao do cartao de credito
	*Caso nao tenha inserido corretamente cria mensagem de erro
	*Realiza tratativa pega os 6 primeiros numeros e os 4 ultimos do cartao substituindo os do meio por '*'
	*Verifica se o cartao ja esta cadastrado no sistema devolvendo mensagem de erro
	*/
	private function validateCreditCard()
	{
		if(strlen($this->numero_cartao) < 16){
			$this->addError('numero_cartao', 'Número do cartão incompleto.');
			return false;
		} else {
			$creditCard = mb_substr($this->numero_cartao, 0, 6) . '******' . mb_substr($this->numero_cartao, 12, 16);//Variavel recebe os primeiros 6 digitos e ultimos 4 do cartao
			if(Doador::findOne(['numero_cartao' => $creditCard])){ //Busca no banco de dados o valor do cartao de credito
				$this->addError('numero_cartao', 'Não foi possível cadastrar esse número de cartão, entre em contato com o seu supervisor.');
				return false;
			} else {
				$this->numero_cartao = $creditCard;
				return true;
			}
		}
	}
}
