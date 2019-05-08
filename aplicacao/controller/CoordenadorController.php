<?php
require_once 'DB.php';// Classe responsavel pela conexão ao banco de dados
require_once '../model/LoginService.php';// classe responsavel por fazer manipular o login do usuario

if(isset($_POST['entrar'])){ //verifica se o botao de logar foi submetido
   $formulario_login =  array(
        'cpf' => $_POST['cpf'], //adiciono no array o cpf
        'senha'=> $_POST['senha']//seguido pela senha
    );

    $oLoginService = new LoginService();
    $oLoginService->verificarLoginCoordenador($formulario_login);


}
?>