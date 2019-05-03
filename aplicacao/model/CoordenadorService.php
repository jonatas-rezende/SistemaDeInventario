<?php 

	class CoordenadorService{

		private $conexao;
		private $coordenador;

	    public function __construct(Conexao $conexao, Coordenador $coordenador) {
            $this->conexao = $conexao->conectar();
            $this->coordenador = $coordenador;
        }

        public function inserir() {

        	$sql = 'INSERT INTO pessoas (nome, CPF, telefone, email, sexo, endereco, id_cidade) 
        		    VALUES (?,?,?,?,?,?,?)';
        	$stmt = $this->conexao->prepare($sql);
        	$stmt->bindValue(1, $this->coordenador->__get('nome'));
            $stmt->bindValue(2, $this->coordenador->__get('CPF'));
            $stmt->bindValue(3, $this->coordenador->__get('telefone'));
            $stmt->bindValue(4, $this->coordenador->__get('email'));
            $stmt->bindValue(5, $this->coordenador->__get('sexo'));
            $stmt->bindValue(6, $this->coordenador->__get('endereco'));
            $stmt->bindValue(7, $this->coordenador->__get('id_cidade'));
            $stmt->execute();

            $sql1 = 'INSERT INTO coordenadores (id_pessoa, status, senha) VALUES (?,?,?)';   

            $status = 1; //como está sendo cadastrado, já estará ativo...

            $stmt1 = $this->conexao->prepare($sql1);
            $stmt1->bindValue(1, $this->conexao->lastInsertId());
            $stmt1->bindValue(2, $status);
            $stmt1->bindValue(3, $this->coordenador->__get('senha'));

            return $stmt1->execute();
        }

        public function listar() {
            $sql = 'SELECT p.nome, p.CPF, p.telefone, p.email, p.sexo, p.endereco, ci.nome AS cidade, 
                           e.nome AS estado, status, senha
                    FROM coordenadores co
                    INNER JOIN pessoas p ON co.id_pessoa = p.id_pessoa
                    INNER JOIN cidades ci ON p.id_cidade = ci.id_cidade
                    INNER JOIN estados e ON ci.id_estado = e.id_estado';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editar() {
            $sql = 'UPDATE pessoas 
                    SET nome = ?, CPF = ?, telefone = ?, email = ?, sexo = ?, endereco = ?, id_cidade = ?
                    WHERE id_pessoa = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->coordenador->__get('nome'));
            $stmt->bindValue(2, $this->coordenador->__get('CPF'));
            $stmt->bindValue(3, $this->coordenador->__get('telefone'));
            $stmt->bindValue(4, $this->coordenador->__get('email'));
            $stmt->bindValue(5, $this->coordenador->__get('sexo'));
            $stmt->bindValue(6, $this->coordenador->__get('endereco'));
            $stmt->bindValue(7, $this->coordenador->__get('id_cidade'));
            $stmt->bindValue(8, $this->coordenador->__get('id_pessoa'));
            $stmt->execute();

            $sql1 = 'UPDATE coordenadores 
                    SET status = ?, senha = ?
                    WHERE id_pessoa = ?';
            $stmt1 = $this->conexao->prepare($sql);
            $stmt1->bindValue(1, $this->coordenador->__get('status'));
            $stmt1->bindValue(2, $this->coordenador->__get('senha'));
            $stmt1->bindValue(3, $this->coordenador->__get('id_pessoa'));
            return $stmt1->execute();

        }
        
        public function deletar() {

            $sql = 'UPDATE coordenadores SET status = ? WHERE id_pessoa = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->coordenador->__get('status'));
            $stmt->bindValue(2, $this->coordenador->__get('id_pessoa'));
            return $stmt->execute();

        }        


	}

 ?>