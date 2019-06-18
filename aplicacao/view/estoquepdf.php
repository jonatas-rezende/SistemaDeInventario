<?php 
include('../../vendor/autoload.php');
require_once('../controller/ItemController.php');
$data = date ("d-m-Y");
$tabelinha = "
<h1>Relátorio de Empréstimo</h1>
<p class='direita'>Sistema de Inventário, $data</p>
<table border=2 id='tabela' name='tabela'
    class='table table-striped table-bordered table-hover table-overflow dataTable'>
    <thead>
        <tr>
            <!--Criar uma função para listar apenas esses campos ai--->
            <!--Usei os mesmos dados para filtrar a tabela--->
            <th>Matricula</th>
            <th>Modelo</th>
            <th>Localização</th>
            <th>Data Aquisição</th>
            <th>Vida Útil</th>
            
           
        </tr>
    </thead>";
    foreach (listaItens() as $item){
        $tabelinha .="
        <tbody>
            <tr class='dif'>
                
            <td>$item->matricula</td>
            <td>$item->modelo</td>
            <td>$item->localizacao</td>
            <td> $item->data_aquisicao</td>
            <td>$item->vida_util</td>
               
    
            </tr>
        </tbody>";
         }
     $tabelinha .="
    </table>";
    
$mpdf=new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("../assets/css/estilo.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($tabelinha);
$mpdf->Output();
?>