<?php 
require_once 'DB.php';
require_once '../model/Setor.php';
require_once '../model/Coordenador.php';

if (isset($_POST['salvar'])) {
    $oSetor = new Setor(DB::getInstance(), 
        array(
            'nome' =>$_POST['setor'],
            'ramal_telefonico' => $_POST['ramal'],
            'id_coordenador' => $_POST['coordenador']
        ));
    
   $verificador = $oSetor->inserir();
   if ($verificador) {       
     header("location: ../view/cadastro_setor.php?salvo=true");
   }
}

if (isset($_POST['atualizar_modal'])) {
    $oSetor = new Setor(DB::getInstance(), 
        array(
            'nome' =>$_POST['setor'],
            'ramal_telefonico' => $_POST['ramal'],
            'id_coordenador' => $_POST['coordenador']
        ));
    
   $verificador = $oSetor->editar();
   if ($verificador) {       
     header("location: ../view/cadastro_setor.php?atualizar=true");
   }
}

if(isset($_POST['excluir_registro'])){
    $oSetor = new Setor(DB::getInstance(), array("id_setor" => $_POST['id_exclusao']));
   if($oSetor->deletar()){
    header("Location: ../view/cadastro_setor.php?excluir=true");
}

/*if (isset($_POST['idsetor'])) {
    $idsetor = $_POST['idsetor'];
    $delete = new Setor(DB::getInstance(), $idsetor);
    $delete->deletar($idsetor);
    header("Location: ../view/cadastro_setor.php");
   }*/

function listaDeCoordenadores() {
    $oCoordenador = new Coordenador(DB::getInstance(), null);
    return $oCoordenador->listar();
}
function listarSetores() {
    $setores = new Setor(DB::getInstance(), array());
    return  $setores->listar();
}










?>