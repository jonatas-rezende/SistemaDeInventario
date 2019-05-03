<?php 

	class EstadoService{

		private $conexao;
		private $estado;

	    public function __construct(Conexao $conexao, Estado $estado) {
            $this->conexao = $conexao->conectar();
            $this->estado = $estado;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO estados (nome) VALUES (?)';    
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->estado->__get('nome'));
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
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = "UPDATE estados SET nome = ? WHERE id_estado = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->estado->__get('nome'));
                $stmt->bindValue(2, $this->estado->__get('id_estado'));            
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                $sql = 'DELETE FROM estados WHERE id_estado = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->estado->__get('id_estado'));
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
	}
 ?>