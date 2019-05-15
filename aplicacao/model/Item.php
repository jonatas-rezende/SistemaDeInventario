<?php 

	class Item{

		private $conexao;
		private $item;

		private $idSetor;
		private $matricula;
		private $modelo;
		private $localizacao;
		private $dataAquisicao;
		private $valorAquisicao;
		private $vidaUtil;
		private $descricaoEstado;
		private $status;

	    public function __get($atributo) {
	        return $this->$atributo;
	    }

	    public function __set($atributo, $valor) {
	        $this->$atributo = $valor;
	    }

	    public function __construct(Conexao $conexao, Item $item) {
            $this->conexao = $conexao->conectar();
            $this->item = $item;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO itens (id_setor, matricula, modelo, localizacao,
                                           data_aquisicao, valor_aquisicao, vida_util, descricao_estado,
                                           situacao, status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

                $situacao = 1; //conforme está sendo cadastrado já entra disponível
                $status = 1 //conforme está sendo cadastrado já entra ativo

                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item['id_setor']);
                $stmt->bindValue(2, $this->item['matricula']);
                $stmt->bindValue(3, $this->item['modelo']);
                $stmt->bindValue(4, $this->item['localizacao']);
                $stmt->bindValue(5, $this->item['data_aquisicao']);
                $stmt->bindValue(6, $this->item['valor_aquisicao']);
                $stmt->bindValue(7, $this->item['vida_util']);
                $stmt->bindValue(8, $this->item['descricao']);
                $stmt->bindValue(9, $situacao);
                $stmt->bindValue(10, $status);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT s.nome as setor, matricula, modelo, localizacao, data_aquisicao,
                               valor_aquisicao, vida_util, descricao_estado, situacao
                        FROM itens i
                        INNER JOIN setores s ON i.id_setor = s.id_setor
                        WHERE status <> 0';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = 'UPDATE itens 
                        SET id_setor = ?, matricula = ?, modelo = ?, localizacao = ?, 
                            data_aquisicao = ?, valor_aquisicao = ?, vida_util = ?, descricao_estado = ?, 
                            situacao = ?, status = ?
                        WHERE id_item = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item['id_setor']);
                $stmt->bindValue(2, $this->item['matricula']);
                $stmt->bindValue(3, $this->item['modelo']);
                $stmt->bindValue(4, $this->item['localizacao']);
                $stmt->bindValue(5, $this->item['data_aquisicao']);
                $stmt->bindValue(6, $this->item['valor_aquisicao']);
                $stmt->bindValue(7, $this->item['vida_util']);
                $stmt->bindValue(8, $this->item['descricao_estado']);
                $stmt->bindValue(9, $this->item['situacao']);
                $stmt->bindValue(10, $this->item['status']);
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
                $stmt->bindValue(2, $this->item['id_item']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
	}
 ?>