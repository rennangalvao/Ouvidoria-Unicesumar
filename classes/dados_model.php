<?php


class DadosUsuario {

	private $protocolo;
	private $nome;
	private $cpf;
	private $rg;
	private $email;
	private $cep;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $uf;
	private $pais;
	private $telefone_ddd;
	private $telefone_numero;
	private $celular_ddd;
	private $celular_numero;
	private $mensagem;
    

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}

	
}

?>