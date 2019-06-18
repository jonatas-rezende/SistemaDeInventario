<?php 

require_once '../controller/DB.php';

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
		private $observacao;

	    public function __get($atributo) {
	        return $this->$atributo;
	    }

	    public function __set($atributo, $valor) {
	        $this->$atributo = $valor;
	    }

	    public function __construct($conexao, $item) {
            $this->conexao = $conexao;
            $this->item = $item;
        }

        public function inserir() {

            try {

                $sql = 'INSERT INTO itens (`matricula`, `modelo`, `localizacao`, `data_aquisicao`, `valor_aquisicao`, `vida_util`, `observacao`, `situacao`, `status`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

                $situacao = 1; //conforme está sendo cadastrado já entra disponível
                $status = 1; //conforme está sendo cadastrado já entra ativo

                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item['matricula']);
                $stmt->bindValue(2, $this->item['modelo']);
                $stmt->bindValue(3, $this->item['localizacao']);
                $stmt->bindValue(4, $this->item['data_aquisicao']);
                $stmt->bindValue(5, $this->item['valor_aquisicao']);
                $stmt->bindValue(6, $this->item['vida_util']);
                $stmt->bindValue(7, $this->item['observacao']);
                $stmt->bindValue(8, $situacao);
                $stmt->bindValue(9, $status);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar() {

            try {

                $sql = 'SELECT id_item, matricula, modelo, localizacao, data_aquisicao,
                               valor_aquisicao, vida_util, IF(situacao=1,"Disponível","Emprestado") as situacao
                        FROM itens
                        WHERE status <> 0 AND situacao <> 0';
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
                        SET matricula = ?, modelo = ?, localizacao = ?, data_aquisicao = ?, valor_aquisicao = ?, vida_util = ?, observacao = ?, situacao = ?, status = ?
                        WHERE id_item = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item['matricula']);
                $stmt->bindValue(2, $this->item['modelo']);
                $stmt->bindValue(3, $this->item['localizacao']);
                $stmt->bindValue(4, $this->item['data_aquisicao']);
                $stmt->bindValue(5, $this->item['valor_aquisicao']);
                $stmt->bindValue(6, $this->item['vida_util']);
                $stmt->bindValue(7, $this->item['observacao']);
                $stmt->bindValue(8, $this->item['situacao']);
                $stmt->bindValue(9, $this->item['status']);
                $stmt->bindValue(10, $this->item['id_item']);
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


        public function listar_por_id() {

            try {

                $sql = 'SELECT id_item, matricula, modelo, localizacao, data_aquisicao,
                               valor_aquisicao, vida_util, observacao
                        FROM itens
                        WHERE id_item = ?';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(1, $this->item['id_item']);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listar_relatorio() {

            try {

                $sql = 'SELECT matricula, modelo, localizacao, observacao
                        FROM itens
                        WHERE status <> 0';
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


    public function listarItensPorFuncionario()
    {
        # code...
    }
	}
 ?>