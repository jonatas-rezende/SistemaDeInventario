<?php 

	class SetorService{

		private $conexao;
		private $setor;

	    public function __construct(Conexao $conexao, Setor $setor) {
            $this->conexao = $conexao->conectar();
            $this->setor = $setor;
        }

        public function inserir() {

            $sql = 'INSERT INTO setores (id_coordenador, ramal_telefonico, nome) VALUES (?,?,?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->setor->__get('id_coordenador'));
            $stmt->bindValue(2, $this->setor->__get('ramal_telefonico'));
            $stmt->bindValue(3, $this->setor->__get('nome'));                        
            return $stmt->execute();
        }

        public function listar() {
            $sql = 'SELECT s.nome, ramal_telefonico, p.nome as coordenador 
					FROM setores s 
					INNER JOIN coordenadores c ON s.id_coordenador = c.id_coordenador
					INNER JOIN pessoas p ON c.id_pessoa = p.id_pessoa';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editar() {
            $sql = "UPDATE setores SET id_coordenador = ?, ramal_telefonico = ?, nome = ? 
            		WHERE id_setores = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->setor->__get('id_coordenador'));
            $stmt->bindValue(2, $this->setor->__get('ramal_telefonico'));
            $stmt->bindValue(3, $this->setor->__get('nome'));
            $stmt->bindValue(4, $this->setor->__get('id_setores'));            
            return $stmt->execute();
        }
        
        public function deletar() {
            $sql = 'DELETE FROM setores WHERE id_setores = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->setor->__get('id_setores'));
            return $stmt->execute();
        }        


	}

 ?>