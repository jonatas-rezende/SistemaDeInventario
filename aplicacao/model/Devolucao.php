<?php 

	class Devolucao {

		private $conexao;
		private $devolucao;

		private $idEmprestimo;
		private $data;
		private $observacao;

		public function __get($atributo) {
		    return $this->$atributo;
		}

		public function __set($atributo, $valor) {
		    $this->$atributo = $valor;
		}		

		public function __construct(Conexao $conexao, $devolucao) {
            $this->conexao = $conexao->conectar();
            $this->coordenador = $devolucao;
        }

        public function inserir() {

            try {

                $sql = '';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->funcionario['nome']);
                $stmt->execute();

                $sql1 = '';    

                $stmt1 = $this->conexao->prepare($sql1);
                $stmt1->bindValue(1, $this->conexao->lastInsertId());
                return $stmt1->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = '';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = '';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->funcionario['nome']);
                $stmt->execute();

                $sql1 = '';
                $stmt1 = $this->conexao->prepare($sql);
                $stmt1->bindValue(1, $this->funcionario['id_cargo']);
                return $stmt1->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                $sql = '';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->funcionario['id_funcionario']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
	}
 ?>