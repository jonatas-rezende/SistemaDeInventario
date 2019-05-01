<?php 

	require_once 'Pessoa.php';

	class Coordenador extends Pessoa{

		private $idPessoa;
		private $status;
		private $senha;

		public function __get($atributo) {
		    return $this->$atributo;
		}

		public function __set($atributo, $valor) {
		    $this->$atributo = $valor;
		}

	}

 ?>