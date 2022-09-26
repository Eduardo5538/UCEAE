<!DOCTYPE html>
<html>
<head>
  
<?php
  session_start();
  include 'conection.php';
  try
    {
      if($_SESSION['CPF'] == null){
        header('Location: ../index.php');
      }
       $Comando = $conexao->prepare("SELECT * from tab_alunos WHERE cpf_aluno = ?");
       $Comando->bindParam(1, $_SESSION['CPF']);
       $Comando->execute();
       $Res = $Comando->fetchAll();
       $RetornoJSON = json_encode($Res);
    }
    catch(PDOException $erro)
      {
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
      }
    ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="imagem/png" href="../img/UCEAE3.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/paginaAluno.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/alt.js"></script>
	<title><?php echo $Res[0]['nome_aluno']; ?></title>
</head>
<body>


  <!-- --------------------- Barra de Navegação --------------------- -->

	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
    <a class="navbar-brand" href="../index.php">
      <img src="img/UCEAE2.png" alt="" width="130" height="" id="logo1">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 130px;">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Portal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="busca.php">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="brazil.php">Mapa</a>
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
          <strong><label id="nome_perfil"><?php echo $Res[0]['nome_aluno']?></label></strong>
        	<button type="button" id="btn_alterarFoto" data-bs-toggle="modal" data-bs-target="#ModalSair"> <?php echo "<img src='../uceae-login/".  $Res[0]['foto_aluno']  ."' id='ft_perfil'>"?></button>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

  <!-- --------------------- Área da Foto --------------------- -->

  <div class="image-upload2">
  <label for="file-input2" id="input-file">
  <form method='post' id='alter_perfil' action='alterarFoto.php' enctype="multipart/form-data">
    <label for="file-input2">
      <?php
          echo "<img src='../uceae-login/".  $Res[0]['foto_aluno']  ."' id='foto_perfil'>"
        ?>
    </label>
    <input id="file-input2" name='foto_perfil' type="file" / onchange='alterar_foto2()'>
  </form>
  
</div>
<br><br><br>

 <!-- --------------------- Formulário do Aluno --------------------- -->

<form action="" method="post" class="form-aluno" id="frm_aluno">

</form>
<br><br><br><br>
<h1 class="titulo-forms">Informações Pessoais</h1>
<form action="" method="post" class="form form-infoAluno" id="frm_infoAluno">
<div class="linha-forms info-pessoal">
   <!-- Bloco de Informações -->
  <div class="bloco-info-pessoal">
    <div class="bloco-itens">
      <label for="">Nome</label><br>
      <input type="text" name="" id="">
    </div>
    <div class="bloco-itens">
      <label for="">Sobrenome</label><br>
      <input type="text" name="" id="">
    </div>
    <div class="bloco-itens">
      <label for="">Data de Nascimento</label><br>
      <input type="date" name="" id="">
    </div>
    <div class="bloco-itens">
      <label for="">Email</label><br>
      <input type="email" name="" id="">
    </div>
  </div>
  <!-- Bloco de Imagem -->
</form>
<div class="image-upload2">
  <label for="file-input2" id="input-file">
  <form method='post' id='alter_fotoForm' action='alterarFoto.php' enctype="multipart/form-data">
    <label for="file-input2">
      <?php
          echo "<img src='../uceae-login/".  $Res[0]['foto_aluno']  ."' id='foto_perfilForm'>"
        ?>
    </label>
    <div id='resp2' class="btn btn-resp2"></div>
      
    <input id="file-input2" name='foto_perfil' type="file" / onchange='alterar_foto2()'>
  
  </form>
  
</div>
</div>

<br><br>
<div class="linha-forms">
  <div class="bloco-forms">
    <h1 class="titulo-forms">Contato</h1><br>
    <form action="" method="post" class="form form-contatoAluno" id="frm_contatoAluno">
      
    </form>
  </div>
  <div class="bloco-forms">
    <h1 class="titulo-forms">Endereço</h1><br>
    <form action="" method="post" class="form form-enderecoAluno" id="frm_EnderecoAluno">
      
    </form>
  </div>
</div>
<br><br>
<h1>teste</h1>
 <!-- --------------------- Modal --------------------- -->

  <div class="modal fade" id="ModalSair" tabindex="-1" aria-labelledby="ModalLabelSair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title entrar-titulo w-100" id="ModalLabelSair"><?php echo $Res[0]['nome_aluno']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="margin: 0 25% 0 25%;">
           <?php echo "<img src='../uceae-login/".  $Res[0]['foto_aluno']  ."' id='ft_perfil_modal'>"?><br><br>
           <h3><?php echo $Res[0]['nome_aluno']; ?></h3><br>
           <label><?php echo $Res[0]['email']; ?></label>
        </div>
              <div class="modal-footer justify-content-center">
              <a href='../uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Sair</a>
              <a href='../uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>
              </div>
      </div>
    </div>
  </div>

</body>
</html>