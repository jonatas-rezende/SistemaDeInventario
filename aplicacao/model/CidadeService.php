<?php 

	class CidadeService{

		private $conexao;
		private $cidade;


	    public function __construct(Conexao $conexao, Cidade $cidade) {
            $this->conexao = $conexao->conectar();
            $this->cidade = $cidade;
        }

        public function inserir() {

            $sql = 'INSERT INTO cidades (nome, estados_id_estado) VALUES (? ?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->cidade->__get('nome'));
            $stmt->bindValue(2, $this->cidade->__get('idEstado'));
            $stmt->execute();
        }

        public function listar() {
            $sql = 'SELECT * FROM cidades';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editar() {
            $sql = "UPDATE cidades SET nome = ?, estados_id_estado = ? WHERE id_cidade = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->cidade->__get('nome'));
            $stmt->bindValue(2, $this->cidade->__get('idEstado'));
            $stmt->bindValue(3, $this->cidade->__get('id_cidade'));
            return $stmt->execute();
        }
        
        public function deletar() {
            $sql = 'DELETE FROM cidades WHERE id_cidade = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->cidade->__get('id_cidade'));
            $stmt->execute();
        }

	}

 ?>