<?php
require 'DB.php';// Classe responsavel pela conexão ao banco de dados
require '../model/Coordenador.php';// classe responsavel por fazer manipular o login do usuario
require '../model/Cidade.php'; //classe responsavel por manipular todo registro das cidades

// if o login
if(isset($_POST['entrar'])){ //verifica se o botao de logar foi submetido
	$formulario_login =  array(
        'cpf' => $_POST['cpf'], //adiciono no array o cpf
        'senha'=> $_POST['senha']//seguido pela senha
    );
	

	$oLoginService = new Coordenador(DB::getInstance(),$formulario_login);
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

//if para cadastro de coordenador
if (isset($_POST['salvar'])) {
    $dadosFormularioCoordenador = array(
        'nome' =>$_POST['nome'],
        'CPF' => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'sexo' => $_POST['sexo'],
        'endereco' => $_POST['endereco'],
        'id_cidade' => $_POST['cidade'],
        'senha' => md5($_POST['senha'])
    );
    $oCoordenador = new Coordenador(DB::getInstance(), $dadosFormularioCoordenador);
    if($oCoordenador->inserir()){
        header("Location: ../view/cadastro_coordenador.php?salvo=true");
    }else{
        //eita
    }
}

function listaCidades(){
    $oCidade = new Cidade(DB::getInstance(), null);
    return $oCidade->listar();
}

function listaCoordenadres() {
    $oCoordenador = new Coordenador(DB::getInstance(), null);
    return $oCoordenador->listar();
}

?>