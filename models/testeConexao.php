<?php
    include ("conexao.php");
    if(!$conexao){
        echo ("Não foi realizado a Conexão");
        exit;
    }else{
        echo ("Conexão realizada com Sucesso");
    }
?>