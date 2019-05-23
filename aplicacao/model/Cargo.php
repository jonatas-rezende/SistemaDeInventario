<?php 

	class Cargo{

		private $conexao;
		private $cargo;

		private $descricao;

	    public function __get($atributo) {
	        return $this->$atributo;
	    }

	    public function __set($atributo, $valor) {
	        $this->$atributo = $valor;
	    }

	    public function __construct($conexao, $cargo) {
            $this->conexao = $conexao;
            $this->cargo = $cargo;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO cargos (descricao, status) VALUES (?, ?)';    
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cargo['descricao']);
                $stmt->bindValue(2, $this->cargo['status']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT * FROM cargos';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = "UPDATE cargos SET descricao = ?, status = ? WHERE id_cargo = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cargo['descricao']);
                $stmt->bindValue(2, $this->cargo['status']);
                $stmt->bindValue(3, $this->cargo['id_cargo']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                $status = 0; // 0 significa excluido

                $sql = 'UPDATE cargos SET status = ? WHERE id_cargo = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $status);
                $stmt->bindValue(2, $this->cargo['id_cargo']);
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

	}

 ?>