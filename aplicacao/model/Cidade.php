<?php 

	class Cidade{

        private $conexao;
        private $cidade;

		private $nome;
		private $idEstado;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }       

        public function __construct($conexao, $cidade) {
            $this->conexao = $conexao;
            $this->cidade = $cidade;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO cidades (nome, estados_id_estado) VALUES (?,?)';    
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cidade['nome']);
                $stmt->bindValue(2, $this->cidade['idEstado']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT id_cidade, c.nome, e.nome as estado 
                        FROM cidades c 
                        INNER JOIN estados e 
                        ON c.id_estado = e.id_estado';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = "UPDATE cidades SET nome = ?, id_estado = ? WHERE id_cidade = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cidade['nome']);
                $stmt->bindValue(2, $this->cidade['idEstado']);
                $stmt->bindValue(3, $this->cidade['id_cidade']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                $sql = 'DELETE FROM cidades WHERE id_cidade = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->cidade['id_cidade']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
	}
 ?>