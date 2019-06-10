<?php 

	class Emprestimo {

		private $conexao;
		private $emprestimo;

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

		public function __construct($conexao, $emprestimo) {
            $this->conexao = $conexao;
            $this->emprestimo = $emprestimo;

        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO emprestimos (id_funcionario, data, data_devolucao, status) VALUES (?, ?, ?, ?)';
                $status = 1;

                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->emprestimo['id_funcionario']);
                $stmt->bindValue(2, $this->emprestimo['data']);
                $stmt->bindValue(3, $this->emprestimo['data_devolucao']);
                $stmt->bindValue(4, $status);
                $stmt->execute();


                $lastId = $this->conexao->lastInsertId(); //pegar o ultimo ID de cadastro emprestimos

                /*foreach($this->itens_emprestimo as $item) {
                    $sql1 = 'INSERT INTO itens_emprestimos (id_emprestimo, id_item) VALUES (?, ?)';    
                    $stmt1 = $this->conexao->prepare($sql1);
                    $stmt1->bindValue(1, $lastId);
                    $stmt1->bindValue(2, $item['id_item']);
                    $stmt1->execute();
                }*/

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT e.id_emprestimo, p.nome as funcionario, data, data_devolucao
                        FROM emprestimos e
                        INNER JOIN funcionarios f ON e.id_funcionario = f.id_funcionario
                        INNER JOIN pessoas p ON f.id_funcionario = p.id_pessoa
                        WHERE e.status <> 0
                        ORDER BY e.id_emprestimo DESC';
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

        public function listar_ultimo() {

            try {

                $sql = 'SELECT e.id_emprestimo, p.nome as funcionario, data, data_devolucao
                        FROM emprestimos e
                        INNER JOIN funcionarios f ON e.id_funcionario = f.id_funcionario
                        INNER JOIN pessoas p ON f.id_funcionario = p.id_pessoa
                        WHERE e.status <> 0
                        ORDER BY e.id_emprestimo  DESC LIMIT 1';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function inserir_item() {

            try {

                $sql = 'INSERT INTO itens_emprestimos (id_emprestimo, id_item, status) VALUES (?, ?, ?)';
                $status = 1;

                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->emprestimo['id_emprestimo']);
                $stmt->bindValue(2, $this->emprestimo['id_item']);
                $stmt->bindValue(3, $status);
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar_itens_emprestimo() {

            try {

                $sql = 'SELECT ie.id_emprestimo, i.matricula as matricula, i.modelo as modelo, i.descricao_estado as observacao
                    FROM itens_emprestimos ie
                    INNER JOIN itens i ON ie.id_item = i.id_item
                    INNER JOIN emprestimos e ON ie.id_emprestimo = e.id_emprestimo
                    WHERE ie.status <> 0 AND ie.id_emprestimo = (SELECT MAX(e.id_emprestimo) FROM emprestimos e) 
                    ORDER BY matricula DESC';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


	}
 ?>