<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Cargo.php';

if (isset($_POST['salvar'])) {
    $dadosFormularioCargo = array(
        'descricao' =>$_POST['descricao']
    );
    $oCargo = new Cargo(DB::getInstance(), $dadosFormularioCargo);
    if($oCargo->inserir()){
        header("Location: ../view/cadastro_cargo.php?salvo=true");
    }else{
        //eita
    }
}

if (isset($_POST['atualizar_modal'])) {
    $dadosFormularioCargo = array(
        'descricao' =>$_POST['descricao']
    );
    $oCargo = new Cargo(DB::getInstance(), $dadosFormularioCargo);
    if($oCargo->editar()){
        header("Location: ../view/cadastro_cargo.php?atualizar=true");
    }else{
        //eita
    }
}

if(isset($_POST['excluir_registro'])){
    $oCargo = new Cargo(DB::getInstance(), array("id_cargo" => $_POST['id_exclusao']));
   if($oCargo->deletar()){
    header("Location: ../view/cadastro_cargo.php?excluir=true");
}


}

function listaCargos() {
    $oCargo = new Cargo(DB::getInstance(), null);
    return $oCargo->listar();
}

?>