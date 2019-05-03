<?php 

	class FuncionarioService {

        private $conexao;
        private $funcionario;

        public function __construct(Conexao $conexao, Funcionario $funcionario) {
            $this->conexao = $conexao->conectar();
            $this->funcionario = $funcionario;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO pessoas (nome, CPF, telefone, email, sexo, endereco, id_cidade) 
                        VALUES (?,?,?,?,?,?,?)';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->funcionario->__get('nome'));
                $stmt->bindValue(2, $this->funcionario->__get('CPF'));
                $stmt->bindValue(3, $this->funcionario->__get('telefone'));
                $stmt->bindValue(4, $this->funcionario->__get('email'));
                $stmt->bindValue(5, $this->funcionario->__get('sexo'));
                $stmt->bindValue(6, $this->funcionario->__get('endereco'));
                $stmt->bindValue(7, $this->funcionario->__get('id_cidade'));
                $stmt->execute();

                $sql1 = 'INSERT INTO funcionarios (id_funcionario, id_pessoa, id_cargo, horario, status, id_setor) 
                         VALUES (?,?,?,?,?,?)';    

                $status = 1; //como está sendo cadastrado o funcionário já estará ativo...

                $stmt1 = $this->conexao->prepare($sql1);
                $stmt1->bindValue(1, $this->conexao->lastInsertId());
                $stmt1->bindValue(2, $this->conexao->lastInsertId());
                $stmt1->bindValue(3, $this->funcionario->__get('id_cargo'));
                $stmt1->bindValue(4, $this->funcionario->__get('horario'));
                $stmt1->bindValue(5, $status);
                $stmt1->bindValue(6, $this->funcionario->__get('id_setor'));

                return $stmt1->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT p.nome, p.CPF, p.telefone, p.email, p.sexo, p.endereco, ci.nome AS cidade, 
                               e.nome AS estado, ca.descricao AS cargo, s.nome AS setor
                        FROM funcionarios f
                        INNER JOIN pessoas p ON f.id_pessoa = p.id_pessoa
                        INNER JOIN cidades ci ON p.id_cidade = ci.id_cidade
                        INNER JOIN estados e ON ci.id_estado = e.id_estado
                        INNER JOIN cargos ca ON f.id_cargo = ca.id_cargo
                        INNER JOIN setores s ON f.id_setor = s.id_setor
                        WHERE status <> 0';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = 'UPDATE pessoas 
                        SET nome = ?, CPF = ?, telefone = ?, email = ?, sexo = ?, endereco = ?, id_cidade = ?
                        WHERE id_pessoa = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->funcionario->__get('nome'));
                $stmt->bindValue(2, $this->funcionario->__get('CPF'));
                $stmt->bindValue(3, $this->funcionario->__get('telefone'));
                $stmt->bindValue(4, $this->funcionario->__get('email'));
                $stmt->bindValue(5, $this->funcionario->__get('sexo'));
                $stmt->bindValue(6, $this->funcionario->__get('endereco'));
                $stmt->bindValue(7, $this->funcionario->__get('id_cidade'));
                $stmt->bindValue(8, $this->funcionario->__get('id_pessoa'));
                $stmt->execute();

                $sql1 = 'UPDATE funcionarios
                        SET id_cargo = ?, horario = ?, status = ?, id_setor = ?
                        WHERE id_funcionario = ?';
                $stmt1 = $this->conexao->prepare($sql);
                $stmt1->bindValue(1, $this->funcionario->__get('id_cargo'));
                $stmt1->bindValue(2, $this->funcionario->__get('horario'));
                $stmt1->bindValue(3, $this->funcionario->__get('status'));
                $stmt1->bindValue(4, $this->funcionario->__get('id_setor'));
                $stmt1->bindValue(5, $this->funcionario->__get('id_funcionario'));
                return $stmt1->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                /* como não vamos realmente excluir, mas somente mudar o status, ao mandar deletar
                realiza a alteração do status de 1 para 0 */

                $status = 0;

                $sql = 'UPDATE funcionarios SET status = ? WHERE id_funcionario = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $status);
                $stmt->bindValue(2, $this->funcionario->__get('id_funcionario'));
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
 ?>