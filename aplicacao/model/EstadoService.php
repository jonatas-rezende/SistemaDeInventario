<?php 

	class EstadoService{

		private $conexao;
		private $estado;

	    public function __construct(Conexao $conexao, Estado $estado) {
            $this->conexao = $conexao->conectar();
            $this->estado = $estado;
        }

        public function inserir() {

            $sql = 'INSERT INTO estados (nome) VALUES (?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->estado->__get('nome'));
            return $stmt->execute();
        }

        public function listar() {
            $sql = 'SELECT * FROM estados';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editar() {
            $sql = "UPDATE estados SET nome = ? WHERE id_estado = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->estado->__get('nome'));
            $stmt->bindValue(2, $this->estado->__get('id_estado'));            
            return $stmt->execute();
        }
        
        public function deletar() {
            $sql = 'DELETE FROM estados WHERE id_estado = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->estado->__get('id_estado'));
            return $stmt->execute();
        }

	}

 ?>