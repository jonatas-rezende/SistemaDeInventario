<?php 

	class Funcionario extends Pessoa{

		private $idFuncionario;
		private $idCargo;
		private $horario;
		private $status;
		private $idSetor;

	}

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }	

 ?>