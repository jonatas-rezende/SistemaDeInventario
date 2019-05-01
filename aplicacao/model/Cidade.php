<?php 

	class Cidade{

		private $idCidade;
		private $nome;
		private $idEstado;

	}

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

 ?>