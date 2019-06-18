<?php 
    include('../../vendor/autoload.php');
    require_once('../controller/EmprestimoController.php');
    $data = date ("d-m-Y");
    foreach (listarEmprestimo() as $emprestimos){
        $emprestimos->funcionario;
        
    }
    foreach (listar_itens_emprestimo() as $itens_emprestimos){
        $itens_emprestimos->modelo;
    }
    $html = " 
        <fieldset>
        <h1>Termo de Emprestimo</h1>
        <p class='center sub-titulo'>
            <strong>Sistema de Invetário</strong>  
            
        </p>
        <p>O Funcionario <strong>$emprestimos->funcionario</strong> solicitou o  empréstimo  do seguinte item : </p>
        <p> <strong>$itens_emprestimos->modelo  </p>
        <p>e para clareza firmo(amos) que foi emprestado de acordo com as regras da empresa.</p>
        <p class='direita'>Sistema de Inventário, $data</p>
        <p> ......................................................................................................................................</p>
        <p class='center'>
            <strong>Assinatura do Coordenador</strong> 
        </p>
        <p>......................................................................................................................................</p>
        <p class='center'>
        <strong>Assinatura do Funcionário</strong>   
    </p>
   
    </fieldset>
    ";
    
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->SetDisplayMode('fullpage');
    $css = file_get_contents("../assets/css/estilo.css");
    $mpdf->WriteHTML($css,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
 
    exit;