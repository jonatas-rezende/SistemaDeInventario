<?php 

	class PessoaService{

		private $conexao;
		private $pessoa;

	    public function __construct(Conexao $conexao, Pessoa $pessoa) {
            $this->conexao = $conexao->conectar();
            $this->pessoa = $pessoa;
        }

	}

 ?>