<?php 
	include('../../vendor/autoload.php');
 
    $html = "
    <fieldset>
        <h1>Termo de Emprestimo</h1>
        <p class='center sub-titulo'>
            <strong>Sistema de Invetário</strong>   
        </p>
        <p>O setor de <strong>nome do setor..</strong>  faz  o  empréstimo  do seguinte item :  </p>
        <p>para o funcionário <strong>nome do funcionario..</p>
        <p>e para clareza firmo(amos) que foi emprestado de acordo com as regras da empresa.</p>
        <p class='direita'>Sistema de Inventário, Data</p>
        <p> ......................................................................................................................................</p>
        <p class='center'>
            <strong>Assinatura do Coordenador</strong>   
        </p>
        <p>......................................................................................................................................</p>
        <p class='center'>
        <strong>Assinatura do Funcionário</strong>   
    </p>
    </fieldset>";
 
	$mpdf=new \Mpdf\Mpdf();
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("../assets/css/estilo.css");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
 
	exit;