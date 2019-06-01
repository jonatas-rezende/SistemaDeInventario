<?php
require_once '../model/Funcionario.php';
require_once 'DB.php';
require_once '../model/Emprestimo.php';
require_once '../model/Item.php';


function listarFuncionario(){
    $oFuncionario = new Funcionario(DB::getInstance(),null);
    return $oFuncionario->listar();
}