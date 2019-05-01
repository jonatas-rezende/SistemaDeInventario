<?php 

	class SetorService{

		private $conexao;
		private $setor;

	    public function __construct(Conexao $conexao, Setor $setor) {
            $this->conexao = $conexao->conectar();
            $this->setor = $setor;
        }

	}

 ?>