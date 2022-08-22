<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/paginaInst.css">
	<title></title>
</head>
<body>

<?php
   include 'conection.php';
    try
      {
         $Comando = $conexao->prepare("SELECT * from escolas WHERE cod_escola = 1");
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
  <!-- --------------------- Barra de Navegação --------------------- -->

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
          <a class="nav-link active" aria-current="page" href="uceae-index/index.php">Portal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gráficos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Avaliações</a>
        </li>
        <li class="nav-item dropdown">
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

  <div id="banner">
  <div class="image-upload">
  <label for="file-input">
    <form action="" method="post">
    <?php
        echo "<img src='".  $Res[0]['foto_banner']  ."' id='foto_banner''>"
      ?>
    
  </label>

  <input id="file-input" type="file" />
  </form>
</div>

      
    <h2 id="texto3">Alterar Banner</h2>
  </div>
  <section id="foto">
  <div class="image-upload">
  <label for="file-input">
    <?php
        echo "<img src='".  $Res[0]['foto_perfil']  ."' id='foto_perfil''>"
      ?>
  </label>

  <input id="file-input" type="file" />
</div>

  
    <h2 id="texto2">Alterar Foto</h2>
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
      <img src="img/adicionar.png">
      <div class="info">
        <h1>Adicionar Curso</h1>
        <p>Adicione cursos que estarão visíveis para seus visitantes!</p>
        <a href="cursosAdicionar.php" class="btn">Veja Mais</a>
      </div>
    </div>
  </div>
      <div id="teste"></div>
  
  </center>
 
  <!-- --------------------- Vazio --------------------- -->
  <script>
    function teste(){
      alert('passou')
    }
  </script>

</body>
</html>