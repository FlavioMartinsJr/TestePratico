<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/Font-Awesome/js/all.min.js">
    <link rel="stylesheet" href="../public/Font-Awesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../public/img/icons8-casa-24.png" />
    <title>Loanding</title>
</head>
<body>
<?php
include("../../models/conexao.php");
include("./usuario.php");
    if($_POST){
        $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
        $dataNascimento = mysqli_real_escape_string($conexao,transformarDataParaBanco($_POST['dataNascimento']));
        $email = mysqli_real_escape_string($conexao,$_POST['email']);
        $senha = mysqli_real_escape_string($conexao,$_POST['senha']);
        

        if(inserirUsuario($conexao,$nome,$dataNascimento,$email,$senha)){
            echo '  <div class="alert alert-success alert-dismissible fade show container w-80 mt-4" role="alert">
                        <strong><i class="fa-solid fa-check"></i> Cadastro Realizado com Sucesso!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><script> setTimeout(location.href=("../../views/index.php"),5000)</script>';
        }else{
            echo '  <div class="alert alert-danger alert-dismissible fade show container w-80 mt-4" role="alert">
                        <strong><i class="fa-solid fa-xmark"></i> Ocorreu um Erro no Cadastro!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><script> setTimeout(location.href=("../../views/index.php"),5000)</script>';
        }
    }
?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
