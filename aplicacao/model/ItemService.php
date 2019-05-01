<?php 

	class ItemService{

		private $conexao;
		private $item;

	    public function __construct(Conexao $conexao, Item $item) {
            $this->conexao = $conexao->conectar();
            $this->item = $item;
        }

	}


 ?>