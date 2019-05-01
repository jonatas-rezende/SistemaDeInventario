<?php 

	class EstadoService{

		private $conexao;
		private $estado;

	    public function __construct(Conexao $conexao, Estado $estado) {
            $this->conexao = $conexao->conectar();
            $this->estado = $estado;
        }

	}

 ?>