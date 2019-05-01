<?php 

	class Item{

		private $idItem;
		private $idSetor;
		private $matricula;
		private $modelo;
		private $quantidade;
		private $localizacao;
		private $dataAquisicao;
		private $valorAquisicao;
		private $vidaUtil;
		private $descricao_estado;
		private $status;

	}

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

 ?>