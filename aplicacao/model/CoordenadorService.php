<?php 

	class CoordenadorService{

		private $conexao;
		private $coordenador;

	    public function __construct(Conexao $conexao, Coordenador $coordenador) {
            $this->conexao = $conexao->conectar();
            $this->coordenador = $coordenador;
        }

	}

 ?>