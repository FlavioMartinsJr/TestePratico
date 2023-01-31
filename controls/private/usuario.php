<?php
    //função inserir
    function inserirUsuario($conexao,$nome,$data,$email,$senha){
        $sql = "insert into tb_usuario values(default,'$nome',$data,'$email','$senha')";
        return mysqli_query($conexao,$sql);
    }
    //função alterar
    function alterarUsuario($conexao,$id,$nome,$data,$email,$senha){
        $sql = "update tb_usuario set  nome = '$nome', dataNascimento = $data, email = '$email', senha = '$senha' where idUsuario = $id";
        return mysqli_query($conexao, $sql);
    }

    //função excluir
    function excluirUsuario($conexao,$id){
        $sql = "delete from tb_usuario where idUsuario = $id";
        return mysqli_query($conexao, $sql);
    }

    //função listar
    function listarUsuario($conexao){
        $usuarios = array();
        $resultado = mysqli_query($conexao, "select * from tb_usuario order by idUsuario asc");
        while ($usuario = mysqli_fetch_assoc($resultado)){
            array_push ($usuarios, $usuario);
        }
        return $usuarios;
    }
    //função buscar por nome
    function listarUsuarioPorNome($conexao,$busca){
        $usuarios = array();
        $resultado = mysqli_query($conexao, "select * from tb_usuario where idUsuario like '%$busca%' or nome like '%$busca%' or email like '%$busca%' order by idUsuario asc");
        while ($usuario = mysqli_fetch_assoc($resultado)){
            array_push ($usuarios, $usuario);
        }
        return $usuarios;
    }

    //funcao para tranformar datas do input date 
    function transformarDataParaBanco($data){
        $dataP = explode('-', $data);
        $dataNoFormatoParaOBranco = $dataP[0].''.$dataP[1].''.$dataP[2];
        return $dataNoFormatoParaOBranco;
    }
    //funcao para tranformar datas do mysql  
    function transformarDataParaExibir($data){
        $dataP = explode('-', $data);
        $dataNoFormatoParaExibir = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
        return $dataNoFormatoParaExibir;
    }
    //funcao para tranformar datas para ir no input   
    function transformarDataParaInput($data){
        $dataP = explode('-', $data);
        $dataNoFormatoParaInput = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
        return $dataNoFormatoParaInput;
    }
?>