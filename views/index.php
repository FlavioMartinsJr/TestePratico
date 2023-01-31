<?php
    include("../models/conexao.php");
    include("../controls/private/usuario.php");

    if(!empty($_GET['buscar'])){
        $pesquisa = $_GET['buscar'];
        $resultado = listarUsuarioPorNome($conexao,$pesquisa);
    }else{
        $resultado = listarUsuario($conexao);
    }
    $usuarios = $resultado;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Flavio Martins Jr">
    <link rel="stylesheet" href="../controls/public/Font-Awesome/js/all.min.js">
    <link rel="stylesheet" href="../controls/public/Font-Awesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../controls/public/img/icons8-casa-24.png" />
   <link rel="stylesheet" href="../controls/public/css/style.css">  
    <title>Inicio</title>
</head>
<body>
    
    <header class="headerPrincipal ">
        <nav class="navbar navbar-expand-md navbar-dark shadow p-3 mb-2 header">
            <div class="container-fluid ">
                <a class="navbar-brand" href="./index.php">
                    <img src="../controls/public/img/logoInicio.png" height="50"  alt="logotipo pixelhouse">
                </a>  
                <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="textoNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Painel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>      
    </header>
    <section class="container sectionServices">
        <h5>Serviços</h5>
        <div class="row w-100 blocos">
            <div class="col-5 col-md-4 col-lg-2 blocos-estrutura azul">
                <i class="fa-solid fa-user-group blocos-incones"></i>
                <p>Usuarios Encontrados</p>
                <h6 id="usuariosEncontrados">2</h6>
            </div>
            <div class="col-5 col-md-4 col-lg-2 blocos-estrutura laranja" onclick="window.location.href = 'https://github.com/FlavioMartinsJr'">
                <i class="fa-brands fa-github blocos-incones"></i> 
                <p>Projeto Postado</p>
                <h6>Repositorio</h6>
            </div>
            <div class="col-5 col-md-4 col-lg-2 blocos-estrutura verde" id="download-pdf">
                <i class="fa-solid fa-download blocos-incones"></i>
                <p>Sobre Projeto</p>
                <h6>Documentação</h6>
            </div>
            <div class="col-5 col-md-4 col-lg-2 blocos-estrutura vermelho" data-toggle="tooltip" data-placement="bottom" title="(11) 95988-0565">
                <i class="fa-solid fa-mobile-screen blocos-incones"></i>
                <p>Sobre Dev</p>
                <h6>Contato</h6>
            </div>
        </div>
    </section>
    <main class="container main-tabela">
        <nav class="nav-tabela">
            <ul class="nav nav-pills nav-fill ">
                <li class="nav-item">
                    <div class="form-inline">
                        <h4>Controle de Usuarios</h4>
                    </div>
                </li>
                <li class="nav-item">
                    <form method="get" class="form-inline ">
                        <div class="nav-tabela-pesquisa">
                            <input type="text" name="buscar" placeholder="Pesquisar o usuario..." autofocus>
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <div class="form-inline nav-tabela-filtro">
                        <label for="filtro"> Filtrar</label>
                        <select name="filtro">
                            <option value=" ">Selecione...</option>
                            <option value="asc">Ordenar Nome Crescente</option>
                            <option value="desc">Ordenar Nome Decrescente</option>
                        </select>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="form-inline">
                        <button class="nav-tabela-btnCadastrar" tabindex="0" data-toggle="modal" data-target="#cadastrar">Cadastrar Novo</button>
                    </div>
                </li>
            </ul>
        </nav>
        <section class="container-fluid table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Alterar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="7"><a href="https://www.linkedin.com/in/flavio-martins-junior-601b36200/" target="_blank">Linkedlin</a></td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $contUser = 0;
                    foreach ($usuarios as $usuario) :
                        $contUser++;
                    ?>
                    <tr>
                        <td class="align-middle"><?= $usuario['idUsuario'] ?></td>
                        <td class="align-middle"><?= $usuario['nome'] ?></td>
                        <td class="align-middle"><?= $usuario['email'] ?></td>
                        <td class="align-middle"><?= transformarDataParaExibir($usuario['dataNascimento']) ?></td>
                        <td class="align-middle"><?= $usuario['senha'] ?></td>
                        <td class="align-middle">
                            <button tabindex="1" data-toggle="modal" onclick="verificarUsuario(<?php echo $usuario['idUsuario']?>,'<?php echo $usuario['nome']?>','<?php echo $usuario['dataNascimento']?>','<?php echo $usuario['email']?>','<?php echo $usuario['senha']?>')" class="alterar"data-target="#alterar">
                                <i class="fa-solid fa-pen" style="color:#3300FF"></i>
                            </button>
                        </td>
                        <td class="align-middle">
                            <button tabindex="2" data-toggle="modal" onclick="autenticarUsuario(<?php echo $usuario['idUsuario']?>)" class="excluir"data-target="#excluir">
                                <i class="fa-regular fa-trash-can" style="color:#BD0606"></i>
                            </button>
                        </td>
                    </tr>
                    <?php 
                    endforeach;
                    echo "<p id='contUser' style='display:none;'>".$contUser."</p>";
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer class="border-top text-muted bg-light">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-4 text-center text-md-left">
                    &copy; 2023 - Controle de Usuarios<br>
                </div>
                <div class="col-12 col-md-4 text-center text-md-center">
                    Politica de Privaciade<br>
                </div>
                <div class="col-12 col-md-4 text-center text-md-right">
                    Termos de Uso<br>
                </div>
            </div>
        </div>
    </footer>


    <!-- modal do cadastro -->
    <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="btnCadastrar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-body" id="btnCadastrar">Cadastrar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controls/private/cadastrar.php" method="post">
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-row mt-0 mt-md-3">
                                <div class="form-group col-6 col-md-6 col-lg-6">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control w-100" name="nome" id="nome" placeholder="Digite o nome" maxlength="25" required>
                                </div>
                                <div class="form-group col-6 col-md-6 col-lg-6">
                                    <label for="dataNascimento">Nascimento</label>
                                    <input type="date" class="form-control w-100" name="dataNascimento" id="dataNascimento" min="1980-01-01" max="2023-01-31" required>
                                </div>
                            </div>
                            <div class="form-row mt-0 mt-md-3">
                                <div class="form-group col-12 col-md-12 col-lg-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control w-100" name="email" id="email" placeholder="Digite o email" maxlength="35"required>
                                </div>
                            </div>
                            <div class="form-row mt-0 mt-md-3">
                                <div class="form-group col-12 col-md-12 col-lg-12 ">
                                    <label for="senha">Senha</label>
                                    <input type="text" class="form-control w-100" name="senha" id="senha" placeholder="Digite sua senha" maxlength="25"required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container">
                            <div class="row justify-content-around">
                                <button type="button" class="btn btn-secondary col-5" style="background-color: #B7BCC0;" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-primary col-5" value="Cadastrar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- fim do modal -->

    <!-- modal do alterar -->
    <div class="modal fade" id="alterar" tabindex="-1" role="dialog" aria-labelledby="btnAlterar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-body" id="btnAlterar">Alterar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controls/private/alterar.php" method="post">
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-row mt-0 mt-md-3">
                                <div class="form-group col-5 col-md-5 col-lg-5">
                                    <label for="nomeAlterar">Nome</label>
                                    <input type="text" class="form-control w-100" name="nomeAlterar" id="nomeAlterar" placeholder="Digite o nome" maxlength="25" required>
                                </div>
                                <div class="form-group col-5 col-md-5 col-lg-5">
                                    <label for="dataNascimentoAlterar">Nascimento</label>
                                    <input type="date" class="form-control w-100" name="dataNascimentoAlterar" id="dataNascimentoAlterar"  min="1980-01-01" max="2023-01-31" required>
                                </div>
                                <div class="form-group col-2 col-md-2 col-lg-2">
                                    <label for="id">Id</label>
                                    <input type="text" class="form-control w-100 " name="id" id="id" maxlength="25" readonly required>
                                </div>
                            </div>
                            <div class="form-row mt-0 mt-md-3">
                                <div class="form-group col-12 col-md-12 col-lg-12">
                                    <label for="emailAlterar">Email</label>
                                    <input type="email" class="form-control w-100" name="emailAlterar" id="emailAlterar" placeholder="Digite o email" maxlength="35"required>
                                </div>
                            </div>
                            <div class="form-row mt-0 mt-md-3">
                                <div class="form-group col-12 col-md-12 col-lg-12 ">
                                    <label for="senhaAlterar">Senha</label>
                                    <input type="text" class="form-control w-100" name="senhaAlterar" id="senhaAlterar"  placeholder="Digite sua senha" maxlength="25"required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container">
                            <div class="row justify-content-around">
                                <button type="button" class="btn btn-secondary col-5" style="background-color: #B7BCC0;" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-primary col-5" value="Alterar">
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- fim do modal -->

      <!-- modal de excluir -->
    <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="btnExcluir" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-body" id="btnExcluir">Aviso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controls/private/excluir.php" method="post">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="container text-center my-3">
                                <i class="fa-regular fa-circle-question" style="font-size:50px;"></i>
                            </div>
                            <div class="container">
                                <h5 class="text-center">Deseja realmente excluir usuario?</h5>
                                <input type="text" id="codigo" name="codigo" style="display:none;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container">
                            <div class="row justify-content-around">
                                <button type="button" class="btn btn-secondary col-5" style="background-color: #B7BCC0;" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-danger col-5" value="Excluir">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- fim do modal -->
    
    <script src="../controls/public/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>