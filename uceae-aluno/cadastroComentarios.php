<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastroComentarios.css">
    <title>Comentários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    
<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
    <a class="navbar-brand" href="#">
      <img src="img/UCEAE2.png" alt="" width="130" height="" id="logo1">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 130px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Portal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="uceae-aluno/brazil.php">Mapa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Instituições
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Públicas</a></li>
            <li><a class="dropdown-item" href="#">Acessibilidade</a></li>
            <li><a class="dropdown-item" href="#">Privadas</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
      	<div style="margin-right: 20px;">
        <?php
          session_start();
          if(!isset($_SESSION['CNPJ'])){
              echo "<button class='btn btn-outline-dark' type='button' style='margin-right: 10px;' data-bs-toggle='modal' data-bs-target='#ModalEntrar'>Entrar</button>";
              echo "<a href='uceae-login/formularioAluno.php' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Cadastre-se!</a>";
              echo "<a href='uceae-login/formularioInst.php' class='btn btn-warning' tabindex='-1' role='button' aria-disabled='true'>Cadastrar sua instituição!</a>";
          }
        ?>
          <?php
            
            if(isset($_SESSION['CNPJ'])){
              if($_SESSION['CNPJ'] != ''){
                echo "<a href='uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
                echo "<a href='uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              
              }
            }

          ?>
    	  </div>
      </form>
    </div>
  </div>
  </nav>
  
  <!-- Área de Gráficos -->

   <div class="topo">
    <h1 class="h1">Comentários e Avaliações</h1>
    <h3 class="h3">Veja o que outros usuários acharam sobre essa Instituição</h3>
    <div class="conteudo">
        <div class="info">
        </div>
        <div class="grafico">
        </div>
    </div>
   </div>

    <!-- Área de Comentários -->

   <div class="comentarios">
    <h1 class="titulo">Comentários</h1>
    <div class="barra-filtro">
        <select name="filtro" id="filtro_tempo" class="tipo">
            <option value="todos">Todos</option>
            <option value="recentes">Mais Recentes Primeiro</option>
        </select>
    </div>
   </div>

    <!-- Inserir Comentário -->

     <label for="Titulo" class="titulo-comentario">Título</label>
        <input type="text" name="titulo" id="txt_titulo" class="input-text">
     <label for="Comentário" class="texto-comentario"></label> 
        <input type="text" name="comentario" id="txt_comentario" class="input-text">

   <!-- Modal -->

    <div class="modal fade" id="ModalEntrar" tabindex="-1" aria-labelledby="ModalLabelEntrar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title entrar-titulo w-100" id="ModalLabelEntrar">Entrar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="margin: 0 25% 0 25%;">
            <form method="POST" name="loginform" id='loginform'>
                <input class="form-control" type="text" placeholder="Login" name='login' id='login'>
                <br>
                <input class="form-control" type="password" placeholder="Senha" name='senha' id='senha'>
        </div>
                <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary btn-block" style="width: 50%;" onclick='logar();'>Entrar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>