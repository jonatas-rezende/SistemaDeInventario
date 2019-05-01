<?php 

	class FuncionarioService{

		private $conexao;
		private $funcionario;

	    public function __construct(Conexao $conexao, Funcionario $funcionario) {
            $this->conexao = $conexao->conectar();
            $this->funcionario = $funcionario;
        }

	}

 ?>