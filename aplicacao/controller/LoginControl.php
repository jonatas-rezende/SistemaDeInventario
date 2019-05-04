<?php

require_once("../model/LoginService.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
LoginService::VerificarLoginCoordenador($cpf, $senha);
?>