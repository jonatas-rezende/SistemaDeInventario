<?php
require_once '../model/Funcionario.php';
require_once 'DB.php';
require_once '../model/Emprestimo.php';
require_once '../model/Item.php';


if (isset($_POST['inserir_emprestimo'])) {
    $dadosFormularioEmprestimo = array(
        'id_funcionario' =>$_POST['funcionarios'],
        'data' => $_POST['dataEmprestimo'],
        'data_devolucao' => $_POST['dataDevolucao']
    );

    $oEmprestimo = new Emprestimo(DB::getInstance(), $dadosFormularioEmprestimo);
    $oEmprestimo->inserir();
    header("Location: ../view/cadastro_itens_emprestimo.php");

}


if (isset($_POST['incluir_item'])) {
    $dadosItensEmprestimo = array(
        'id_emprestimo' =>$_POST['idEmprestimo'],
        'id_item' => $_POST['modeloItem'],
    );

    $oEmprestimo = new Emprestimo(DB::getInstance(), $dadosItensEmprestimo);
    $oEmprestimo->inserir_item();
    header("Location: ../view/cadastro_itens_emprestimo.php");

}

if (isset($_POST['finalizar'])) {

    header("Location: ../view/cadastro_emprestimo.php");

}


function listarFuncionario(){
    $oFuncionario = new Funcionario(DB::getInstance(),null);
    return $oFuncionario->listar();
}

function listarItem(){
    $oItem = new Item(DB::getInstance(),null);
    return $oItem->listar();
}

function listarEmprestimo(){
    $oEmprestimo = new Emprestimo(DB::getInstance(),null);
    return $oEmprestimo->listar();
}

function listarUltimoEmprestimo(){
    $oEmprestimo = new Emprestimo(DB::getInstance(),null);
    return $oEmprestimo->listar_ultimo();
}

function listar_itens_emprestimo(){
    $oItensEmprestimo = new Emprestimo(DB::getInstance(),null);
    return $oItensEmprestimo->listar_itens_emprestimo();
}
