<?php 

	class Setor{

		private $idSetor;
		private $idCoordenador;
		private $ramalTelefonico;
		private $nome;

	}

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

 ?>