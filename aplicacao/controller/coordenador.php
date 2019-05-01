<?php
    // o local é diferente por conta de uma recuperação em contexto.
    require '../model/Coordenador.php';
    require '../model/CoordenadorService.php';
    require '../config/conexao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if ($acao == 'inserir') {
        $coordenador = new Coordenador();
        $coordenador->__set('nome', $_POST['nome']);
        $coordenador->__set('CPF', $_POST['CPF']);
        $coordenador->__set('telefone', $_POST['telefone']);
        $coordenador->__set('email', $_POST['email']);
        $coordenador->__set('sexo', $_POST['sexo']);
        $coordenador->__set('endereco', $_POST['endereco']);
        $coordenador->__set('id_cidade', $_POST['id_cidade']);
        $coordenador->__set('status', $_POST['status']);
        $coordenador->__set('senha', $_POST['senha']);
        
        $conexao = new Conexao();
        
        $coordenadorService = new CoordenadorService($conexao, $coordenador);
        $coordenadorService->inserir();
    
        echo 'inserido com sucesso';
    } else {

        echo 'ação não encontrada';

    }

?>