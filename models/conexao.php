<?php
    $servidor = "localhost";
    $banco = "testePratico";
    $usuario = "root";
    $senha = "";
    $posta = "3306";
    $conexao = mysqli_connect($servidor,$usuario,$senha,$banco,$posta);
    if(!$conexao){
        header("location:../views/erro.php");
        die();
    }
?>