<?php 

	class CargoService{

		private $conexao;
		private $cargo;

	    public function __construct(Conexao $conexao, Cargo $cargo) {
            $this->conexao = $conexao->conectar();
            $this->cargo = $cargo;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO cargos (descricao) VALUES (?)';    
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cargo->__get('descricao'));
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT * FROM cargos';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = "UPDATE cargos SET descricao = ? WHERE id_cargo = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cargo->__get('descricao'));
                $stmt->bindValue(2, $this->cargo->__get('id_cargo'));
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                $sql = 'DELETE FROM cargos WHERE id_cargo = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cargo->__get('id_cargo'));
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
	}
 ?>