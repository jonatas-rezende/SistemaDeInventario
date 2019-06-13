<?php 
include('../../vendor/autoload.php');
require_once('../controller/ItemController.php');

$tabelinha = "
<h1>Relátorio de Estoque</h1>
<p class='direita'>Sistema de Inventário, Data</p>

<table border=2 id='tabela' name='tabela'
    class='table table-striped table-bordered table-hover table-overflow dataTable'>
    <thead>
        <tr>
            <!--Criar uma função para listar apenas esses campos ai--->
            <!--Usei os mesmos dados para filtrar a tabela--->
            <th>Matricula</th>
           <th> Modelo </th>
            <th> Localização </th>
            <th> Descrição </th>
           
            
           
        </tr>
    </thead>";
    foreach (listaItens()  as $item){
    $tabelinha .="
    <tbody>
        <tr>
            
            <td>$item->matricula</td>
            <td>$item->modelo</td>
            <td>$item->localizacao</td>
            <td>$item->descricao</td>
            
           

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
