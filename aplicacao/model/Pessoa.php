<?php 

	class Pessoa{

		private $idPessoa;
		private $nome;
		private $CPF;
		private $telefone;
		private $email;
		private $sexo;
		private $endereco;	
		private $idCidade;

	}

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }


 ?>