<?php 

	require_once 'Pessoa.php';

	class Funcionario extends Pessoa{

		private $idPessoa;
		private $idCargo;
		private $horario;
		private $status;
		private $idSetor;

	    public function __get($atributo) {
	        return $this->$atributo;
	    }

	    public function __set($atributo, $valor) {
	        $this->$atributo = $valor;
	    }	

	}

 ?>