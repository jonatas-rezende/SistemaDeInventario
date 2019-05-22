<?php

    class Conexao {

        private $host = 'localhost';
        private $dbname = 'sistema_inventario';
        private $user = 'root';
        private $password = '123456789';

        public function conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->password"
                );

                return $conexao;

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>