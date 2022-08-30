<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/paginaInst.css">
	<title>Sua Página</title>
</head>
<body>

<?php
  session_start();
  include 'conection.php';
  try
    {
       $Comando = $conexao->prepare("SELECT * from escolas WHERE cnpj = ?");
       $Comando->bindParam(1, $_SESSION['CNPJ']);
       $Comando->execute();
       $Res = $Comando->fetchAll();
       $RetornoJSON = json_encode($Res);
    }

    //------------------- PARTE BUGADA DO EDUARDO BROXA ---------------------
/*
   session_start();
   include 'conection.php';
    try
      {
         $Comando = $conexao->prepare("SELECT * from escolas WHERE cnpj = 123");
         //$Comando->bindParam(1, $_SESSION['cnpj']);
         $Res = $Comando->fetchAll();
         echo "<Script>alert('". $_SESSION['cnpj'] ."')</script>";
         $RetornoJSON = json_encode($Res);
      }*/
    catch(PDOException $erro)
      {
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
      }
    ?>
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
          <a class="nav-link" href="../uceae-aluno/brazil.php">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mapa</a>
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
          <strong><label id="nome_perfil">-----------</label></strong>
        	<button id="btn_alterarFoto" onclick="teste()"><img src="img/user.png" id="ft_perfil"></button>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

  <!-- --------------------- Banner da Instituição --------------------- -->

  <div class="image-upload" id="banner-foto">
  <label for="file-input" id="input-file">
    <form action="" method="post" id="alter_banner">
    <?php
        echo "<img src='".  $Res[0]['foto_banner']  ."' id='foto_banner''>"
      ?>
    </form>
  </label>
  <input id="file-input" type="file">
  </div>
  <section id="foto">
  <div class="image-upload">
  <label for="file-input">
    <?php
        echo "<img src='".  $Res[0]['foto_perfil']  ."' id='foto_perfil'>"
      ?>
  </label>

  <input id="file-input" type="file" />
</div>
  </section>
  <!-- --------------------- Botao de adicionar Propagandas --------------------- -->

  <br><br>
  <center>
  <div id="adicionar">
  <img src="img/add.png" id="inserir_img" >
  <h2 id="texto">Adicionar Propaganda</h2>
  </div>
</center>
<br><br><br><br>

<!-- --------------------- Formulário de Consulta --------------------- -->

<form name="frm_alt" method="POST" id="form_alt">
  <br>
  <div class="row">
    <div class="col">
      <label>Nome Instituição</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>CNPJ</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
    <div class="col">
      <label>Cep</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
    <div class="col">
      <label>Mensalidade</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Email</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
    <div class="col">
      <label>Telefone</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Rua</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
    <div class="col">
      <label>Bairro</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
    <div class="col">
      <label>Cidade</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
      <div class="col">
      <label>UF</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" placeholder="">
    </div>
  </div>
  <div id="nav-alterar">
    <button id="btn_salvar"><img src="img/salvar.png" id="salvar-icon"><label id="lbl_salvar">Salvar</label></button>
  </div>
</form>
<br><br><br>

  <!-- --------------------- Cards Personalizados --------------------- -->
  <center>
  <div class="wrapper">
    <div class="card">
      <img src="img/graficos.png">
      <div class="info">
        <h1>Gráficos</h1>
        <p>Veja quantos alunos visualizaram sua página nos últimos dias!</p>
        <a href="#" class="btn">Veja Mais</a>
      </div>
    </div>
     <div class="card">
      <img src="img/estrela.png">
      <div class="info">
        <h1>Avaliações</h1>
        <p>Veja o que outros usuários comentaram sobre sua instituição!</p>
        <a href="#" class="btn">Veja Mais</a>
      </div>
    </div>
     <div class="card">
      <img src="img/adicionar-ficheiro.png">
      <div class="info">
        <h1>Adicionar Curso</h1>
        <p>Adicione cursos que estarão visíveis para seus visitantes!</p>
        <a href="cursosAdicionar.php" class="btn">Veja Mais</a>
      </div>
    </div>
    </div>
  </center>
  <br><br><br>
  <br><br><br>

  <!-- --------------------- Conteudo --------------------- -->
      
  <hr width="50%" style="margin-left:25% ;">
      <h1>Edição de Informações</h1>
      <h3>Parte que os usuários terão Acesso</h3>
   <!-- --------------------- Vazio --------------------- -->
  <script>
    function teste(){
      alert('passou')
    }
  </script>

</body>
</html>