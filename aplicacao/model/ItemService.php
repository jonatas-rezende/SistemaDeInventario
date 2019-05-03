<?php 

	class ItemService{

		private $conexao;
		private $item;

	    public function __construct(Conexao $conexao, Item $item) {
            $this->conexao = $conexao->conectar();
            $this->item = $item;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO itens (id_setor, matricula, modelo, quantidade, localizacao,
                                           data_aquisicao, valor_aquisicao, vida_util, descricao_estado,
                                           situacao, status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

                $situacao = 1; //conforme está sendo cadastrado já entra disponível
                $status = 1 //conforme está sendo cadastrado já entra ativo

                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item->__get('id_setor'));
                $stmt->bindValue(2, $this->item->__get('matricula'));
                $stmt->bindValue(3, $this->item->__get('modelo'));
                $stmt->bindValue(4, $this->item->__get('quantidade'));
                $stmt->bindValue(5, $this->item->__get('localizacao'));
                $stmt->bindValue(6, $this->item->__get('data_aquisicao'));
                $stmt->bindValue(7, $this->item->__get('valor_aquisicao'));
                $stmt->bindValue(8, $this->item->__get('vida_util'));
                $stmt->bindValue(9, $this->item->__get('descricao'));
                $stmt->bindValue(10, $situacao);
                $stmt->bindValue(11, $status);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT s.nome as setor, matricula, modelo, quantidade, localizacao, data_aquisicao,
                               valor_aquisicao, vida_util, descricao_estado, situacao
                        FROM itens i
                        INNER JOIN setores s ON i.id_setor = s.id_setor
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

                $sql = 'UPDATE itens 
                        SET id_setor = ?, matricula = ?, modelo = ?, quantidade = ?, localizacao = ?, 
                            data_aquisicao = ?, valor_aquisicao = ?, vida_util = ?, descricao_estado = ?, 
                            situacao = ?, status = ?
                        WHERE id_item = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item->__get('id_setor'));
                $stmt->bindValue(2, $this->item->__get('matricula'));
                $stmt->bindValue(3, $this->item->__get('modelo'));
                $stmt->bindValue(4, $this->item->__get('quantidade'));
                $stmt->bindValue(5, $this->item->__get('localizacao'));
                $stmt->bindValue(6, $this->item->__get('data_aquisicao'));
                $stmt->bindValue(7, $this->item->__get('valor_aquisicao'));
                $stmt->bindValue(8, $this->item->__get('vida_util'));
                $stmt->bindValue(9, $this->item->__get('descricao_estado'));
                $stmt->bindValue(10, $this->item->__get('situacao'));
                $stmt->bindValue(11, $this->item->__get('status'));
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        public function deletar() {

            try {

                /* como não vamos realmente excluir, mas somente mudar o status, ao mandar deletar
                realiza a alteração do status de 1 para 0 */

                $status = 0;

                $sql = 'UPDATE itens SET status = ? WHERE id_item = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $status);
                $stmt->bindValue(2, $this->item->__get('id_item'));
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

	}
 ?>

