<?php 

	class CidadeService{

		private $conexao;
		private $cidade;


	    public function __construct(Conexao $conexao, Cidade $cidade) {
            $this->conexao = $conexao->conectar();
            $this->cidade = $cidade;
        }


	}

 ?>