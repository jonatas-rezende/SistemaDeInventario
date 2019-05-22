<?php 

	class Emprestimo {

		private $conexao;
		private $emprestimo;
        private $itens_emprestimo;

		private $idFuncionario;
		private $data;
		private $dataDevolucao;
		private $observacao;

		public function __get($atributo) {
		    return $this->$atributo;
		}

		public function __set($atributo, $valor) {
		    $this->$atributo = $valor;
		}		

		public function __construct($conexao, $emprestimo, $itens_emprestimos) {
            $this->conexao = $conexao;
            $this->emprestimo = $emprestimo;
            $this->itens_emprestimo = $itens_emprestimo;

        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO emprestimos (id_funcionario, data, data_devolucao, observacao) VALUES (?, ?, ?, ?)';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->emprestimo['id_funcionario']);
                $stmt->bindValue(2, $this->emprestimo['data']);
                $stmt->bindValue(3, $this->emprestimo['data_devolucao']);
                $stmt->bindValue(4, $this->emprestimo['observacao']);
                $stmt->execute();


                $lastId = $this->conexao->lastInsertId() //pegar o ultimo ID de cadastro emprestimos

                foreach ($this->itens_emprestimos as $item) {
                    $sql1 = 'INSERT INTO itens_emprestimos (id_emprestimo, id_item) VALUES (?, ?)';    
                    $stmt1 = $this->conexao->prepare($sql1);
                    $stmt1->bindValue(1, $lastId);
                    $stmt1->bindValue(2, $item['id_item']);
                    $stmt1->execute();
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = '';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

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