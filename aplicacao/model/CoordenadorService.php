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
            $stmt1 = $this->conexao->prepare($sql1);
            $stmt1->bindValue(1, $this->conexao->lastInsertId());
            $stmt1->bindValue(2, $this->coordenador->__get('status'));
            $stmt1->bindValue(3, $this->coordenador->__get('senha'));
            $stmt1->execute();
        }

	}

 ?>