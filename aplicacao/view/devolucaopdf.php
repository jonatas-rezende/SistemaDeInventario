<?php 
include('../../vendor/autoload.php');
require_once('../controller/EmprestimoController.php');
$data = date ("d-m-Y");

$tabelinha = "
<h1>Relátorio de Devolução</h1>
<p class='direita'>Sistema de Inventário, $data</p>
<table border=2 id='tabela' name='tabela'
    class='table table-striped table-bordered table-hover table-overflow dataTable'>
    <thead>
        <tr>
            <!--Criar uma função para listar apenas esses campos ai--->
            <!--Usei os mesmos dados para filtrar a tabela--->
            <th>Id</th>
            <th>Funcionario</th>
            <th>Data</th>
            <th>Data Devolução</th>
            
           
        </tr>
</table>";

$mpdf=new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("../assets/css/estilo.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($tabelinha);
$mpdf->Output();

?>
