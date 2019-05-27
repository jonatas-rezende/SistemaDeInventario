<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Funcionario.php';// classe responsavel por fazer manipular o login do usuario
require '../model/Setor.php'; 
require '../model/Cargo.php';
require '../model/Cidade.php';//classe responsavel por manipular todo registro das cidades



//if para cadastro de funcionario
if (isset($_POST['salvar'])) {
    $dadosFormularioFuncionario = array(
        'nome' =>$_POST['nome'],
        'CPF' => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'sexo' => $_POST['sexo'],
        'endereco' => $_POST['endereco'],
        'id_cidade' => $_POST['cidade'],
        'id_setor' => $_POST['setor'],
        'id_cargo' => $_POST['cargo'],
        'horario' => Date('m-d-YYYY')
        
        
    );
    $oFuncionario = new Funcionario(DB::getInstance(), $dadosFormularioFuncionario);
    if($oFuncionario->inserir()){
        header("Location: ../view/cadastro_funcionario.php?salvo=true");
    }else{
        //eita
    }
}

function listaCidades(){
    $oCidade = new Cidade(DB::getInstance(), null);
    return $oCidade->listar();
}

function listaSetores(){
    $oSetor = new Setor(DB::getInstance(), null);
    return $oSetor->listar();
}

function listaCargos(){
    $oCargo = new Cargo(DB::getInstance(), null);
    return $oCargo->listar();
}

function listaFuncionarios() {
    $oFuncionario = new Funcionario(DB::getInstance(), null);
    return $oFuncionario->listar();
}


?>