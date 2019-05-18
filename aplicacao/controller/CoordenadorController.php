<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Coordenador.php';// classe responsavel por fazer manipular o login do usuario

if(isset($_POST['entrar'])){ //verifica se o botao de logar foi submetido
	$formulario_login =  array(
        'cpf' => $_POST['cpf'], //adiciono no array o cpf
        'senha'=> $_POST['senha']//seguido pela senha
    );
	$banco = DB::getInstance();

	$oLoginService = new Coordenador($banco,$formulario_login);
	$dados = $oLoginService->login();// chama o metodo do login
	if ($dados != null){ //verifica se não está nulo
	    session_start();//inicia a sessão
		$_SESSION['dados_usuario'] = $dados; //joga os dados do usuario na sessão
		header('Location: ../view/index.php');//redireciona para a pagina principal
	   //exit();
	} else{ //se for nulo
		header('Location: ../index.php'); // redireciona para ele mesmo
		//exit();
	}
}
?>