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

function listaDeCoordenadores() {
    $listagem = new Coordenador(DB::getInstance(), array());
    return $listagem->listar();
}

function listarSetores() {
    $setores = new Setor(DB::getInstance(), array());
    return  $setores->listar();
}

?>