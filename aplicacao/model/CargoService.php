<?php 

	class CargoService{

		private $conexao;
		private $cargo;

	    public function __construct(Conexao $conexao, Cargo $cargo) {
            $this->conexao = $conexao->conectar();
            $this->cargo = $cargo;
        }

	}


 ?>