<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Funcionario.php';// classe responsavel por fazer manipular o login do usuario
require '../model/Setor.php'; 
require '../model/Cargo.php';
require '../model/Cidade.php';//classe responsavel por manipular todo registro das cidades


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
        'horario' => $_POST['horario']
         );
    $oFuncionario = new Funcionario(DB::getInstance(), $dadosFormularioFuncionario);
    if($oFuncionario->inserir()){
        header("Location: ../view/cadastro_funcionario.php?salvo=true");
    }else{
        //eita
    }
}

        //if para cadastro de funcionario
if (isset($_POST['atualizar_modal'])) {
    $dadosFormularioFuncionario = array(
        'nome' =>$_POST['nome_modal'],
        'CPF' => $_POST['cpf_modal'],
        'telefone' => $_POST['telefone_modal'],
        'email' => $_POST['email_modal'],
        'sexo' => $_POST['sexo_modal'],
        'endereco' => $_POST['endereco_modal'],
        'id_cidade' => $_POST['cidade_modal'],
        'id_setor' => $_POST['setor_modal'],
        'id_cargo' => $_POST['cargo_modal'],
        'horario' => $_POST['horario_modal'],
        'id_pessoa'=> $_POST['id_pessoa'],
        'id_funcionrio' => $_POST['id_funcionario'],
        'status' => 1);
        $oFuncionario = new Funcionario(DB::getInstance(), $dadosFormularioFuncionario);
        if($oFuncionario->editar()){
            header("Location: ../view/cadastro_funcionario.php?atualizar=true");
        }else{
            //eita
        }
    }
            
    if(isset($_POST['excluir_registro'])){
        $oFuncionario = new Funcionario(DB::getInstance(), array("id_funcionario" => $_POST['id_exclusao']));
       if($oFuncionario->deletar()){
        header("Location: ../view/cadastro_funcionario.php?excluir=true");
    }
    
    
    }
    if(isset($_POST['exibir_registro'])){
        $oFuncionario = new Funcionario(DB::getInstance(),array('id_funcionario' =>$_POST['id_para_atualizar']));
        $dados['dados'] = $oFuncionario->listar_por_id();
        echo json_encode($dados);
    
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