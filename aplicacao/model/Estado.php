<?php 

	class Estado{

		private $conexao;
		private $estado;

		private $nome;

	    public function __get($atributo) {
	        return $this->$atributo;
	    }

	    public function __set($atributo, $valor) {
	        $this->$atributo = $valor;
	    }

	    public function __construct($conexao, $estado) {
            $this->conexao = $conexao;
            $this->estado = $estado;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO estados (nome) VALUES (?)';    
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->estado['nome']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT * FROM estados';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = "UPDATE estados SET nome = ? WHERE id_estado = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->estado['nome']);
                $stmt->bindValue(2, $this->estado['id_estado']);            
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                $sql = 'DELETE FROM estados WHERE id_estado = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->estado['id_estado']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


	}

 ?>