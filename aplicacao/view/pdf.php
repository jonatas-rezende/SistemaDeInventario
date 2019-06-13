<?php
require '../controller/DB.php';// Classe responsavel pela conexão ao banco de dados

require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML("<h3>Sistema Invetário  <span> - Relátorio de Emprestimos</h3> ");
$mpdf->Output();
?>