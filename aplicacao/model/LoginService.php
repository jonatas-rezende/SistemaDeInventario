<?php
require_once("../controller/DB.php");
require_once("../config/conexao.php");


class LoginService{


function VerificarLoginCoordenador($cpf, $senha){
       
    $sql = "select * from pessoas INNER JOIN coordenadores ON coordenadores.senha = :senha and pessoas.cpf = :cpf";
    $stmt = DB::prepare($sql);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();	
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = mysqli_num_rows($resultado); //verificação 0/1

    if ($row == 1){
        $_SESSION['cpf'] = $cpf;
        header('Location: ../view/login.php');
        exit();
    } else{
        header('Location: ../index.php');
        exit();
    }

}
}
?>