<?php 

	class Coordenador extends Pessoa{

		private $status;

	}

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }	


 ?>