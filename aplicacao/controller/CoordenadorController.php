<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Coordenador.php';// classe responsavel por fazer manipular o login do usuario
session_start();
if(isset($_POST['entrar'])){ //verifica se o botao de logar foi submetido
	$formulario_login =  array(
        'cpf' => $_POST['cpf'], //adiciono no array o cpf
        'senha'=> $_POST['senha']//seguido pela senha
    );
	$banco = DB::getInstance();

	$oLoginService = new Coordenador($banco,$formulario_login);

	if ($oLoginService->login() == '1'){
		$_SESSION['dados_usuario'] = $formulario_login;
		header('Location: ../view/index.php');
	//	exit();
	} else{
		header('Location: ../index.php');
		exit();
	}


}
?>