<?php 

	class CargoService{

		private $conexao;
		private $cargo;

	    public function __construct(Conexao $conexao, Cargo $cargo) {
            $this->conexao = $conexao->conectar();
            $this->cargo = $cargo;
        }

        public function inserir() {

            $sql = 'INSERT INTO cargos (descricao) VALUES (?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->cargo->__get('descricao'));
            $stmt->execute();
        }

        public function listar() {
            $sql = 'SELECT * FROM cargos';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editar() {
            $sql = "UPDATE cargos SET descricao = ? WHERE id_cargo = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->cargo->__get('descricao'));
            $stmt->bindValue(2, $this->cargo->__get('id_cargo'));
            return $stmt->execute();
        }
        
        public function deletar() {
            $sql = 'DELETE FROM cargos WHERE id_cargo = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->cargo->__get('id_cargo'));
            $stmt->execute();
        }

	}

 ?>