<?php
require_once('../config/conexao.php');
class DB {
	private static $instance;
	static function getInstance(){
	if(!isset(self::$instance))	{
		try{
			self::$instance = new PDO("mysql:host=localhost;dbname=sistema_inventario", 'root', "");
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}
		return self::$instance;
	}
	 public static function prepare($sql) {
        return self::getinstance()->prepare($sql);
    }
}

?>