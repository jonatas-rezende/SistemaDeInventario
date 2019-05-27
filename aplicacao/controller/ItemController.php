<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Item.php';
require '../model/Setor.php'; 

if (isset($_POST['salvar'])) {
    $dadosFormularioItem = array(
        'id_setor' =>$_POST['id_setor'],
        'matricula' => $_POST['matricula'],
        'modelo' => $_POST['modelo'],
        'localizacao' => $_POST['localizacao'],
        'data_aquisicao' => $_POST['data_aquisicao'],
        'valor_aquisicao' => $_POST['valor_aquisicao'],
        'vida_util' => $_POST['vida_util'],
        'descricao_estado' => $_POST['descricao_estado'],
        'situacao' => $_POST['situacao']
    );
    $oItem = new Item(DB::getInstance(), $dadosFormularioItem);
    if($oItem->inserir()){
        header("Location: ../view/cadastro_item.php?salvo=true");
    }else{
        //eita
    }
}

if (isset($_POST['atualizar_modal'])) {
    $dadosFormularioItem = array(
        'id_setor' =>$_POST['id_setor_modal'],
        'matricula' => $_POST['matricula_modal'],
        'modelo' => $_POST['modelo_modal'],
        'localizacao' => $_POST['localizacao_modal'],
        'data_aquisicao' => $_POST['data_aquisicao_modal'],
        'valor_aquisicao' => $_POST['valor_aquisicao_modal'],
        'vida_util' => $_POST['vida_util_modal'],
        'descricao_estado' => $_POST['descricao_estado_modal'],
        'situacao' => $_POST['situacao_modal']
    );
    $oItem = new Item(DB::getInstance(), $dadosFormularioItem);
    if($oItem->editar()){
        header("Location: ../view/cadastro_item.php?atualizar=true");
    }else{
        //eita
    }
}

if(isset($_POST['excluir_registro'])){
    $oItem = new Item(DB::getInstance(), array("id_item" => $_POST['id_exclusao']));
   if($oItem->deletar()){
    header("Location: ../view/cadastro_item.php?excluir=true");
}


}

function listaItens() {
    $oItem = new Item(DB::getInstance(), null);
    return $oItem->listar();
}

?>