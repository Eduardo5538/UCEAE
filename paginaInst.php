<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/paginaInst.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/paginaInst.js"></script>
	<title></title>
</head>
<body onload='consulta()'>

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
          <a class="nav-link active" aria-current="page" href="#">Portal</a>
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

  <div id="banner_perfil" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" id="carousel-inner">
      <div class="carousel-item active" id="imagem_banner">
        <div id="preto">
          <div class="d-block w-100" id="banner_inst"></div>
        </div>
        <div class="carousel-caption d-none d-md-block" id="carousel-cap">
          <h1 id="alterar_banner">Alterar Banner</h1>
        </div>
      </div>
      <section id="quadrado_foto">
        <img src="img/user.png" id="foto_perfil" title="Alterar Foto">
        <div class="carousel-caption d-none d-md-block" id="carousel-cap">
          <h5 id="alterar_foto">Alterar Foto</h5>
        </div>
      </section>
    </div>
  </div>


  <!-- --------------------- Botao de adicionar Propagandas --------------------- -->

  <br><br>
  <center>
  <div id="adicionar">
  <img src="img/add.png" id="inserir_img">
  <h2 id="texto">Adicionar Propaganda</h2>
  </div>
</center>
<br>
<hr id="linha">

<!-- --------------------- Formulário de Consulta --------------------- -->

<form name="frm_alt" method="POST" id="form_alt" action='alterarInst.php'>
  <div id="nav-alterar">
    <button id="btn_salvar"><img src="img/salvar.png" id="salvar-icon" onclick='alterar()'></button>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Nome Instituição</label><br>
      <input type="text" class="form-control" id="txt_nomeInst" name="txt_nomeInst" placeholder="">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>CNPJ</label><br>
      <input type="text" class="form-control" id="txt_cnpj" name="txt_cnpj" placeholder="">
    </div>
    <div class="col">
      <label>Cep</label><br>
      <input type="text" class="form-control" id="txt_cep" name='txt_cep' placeholder="">
    </div>
    <div class="col">
      <label>Mensalidade</label><br>
      <input type="text" class="form-control" id="txt_mensalidade" name="txt_mensalidade" placeholder="">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Email</label><br>
      <input type="text" class="form-control" id="txt_email" name='txt_email'>
    </div>
    <div class="col">
      <label>Telefone</label><br>
      <input type="text" class="form-control" id="txt_telefone" name='txt_telefone' placeholder="">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Rua</label><br>
      <input type="text" class="form-control" id="txt_rua" name='txt_rua' placeholder="">
    </div>
    <div class="col">
      <label>Bairro</label><br>
      <input type="text" class="form-control" id="txt_bairro" name='txt_bairro' placeholder="">
    </div>
    <div class="col">
      <label>Cidade</label><br>
      <input type="text" class="form-control" id="txt_cidade" name='txt_cidade' placeholder="">
    </div>
      <div class="col">
      <label>UF</label><br>
      <input type="text" class="form-control" id="txt_uf" name='txt_uf' placeholder="">
    </div>
    <input type="button" value="Alterar" onclick='alterar()'>
    <input type="submit" value="Alterar"'>
  </div>
</form>
  <hr id="linha">

  <!-- --------------------- Vazio --------------------- -->

  <script>
    function teste(){
      alert('passou')
    }
  </script>
</body>
</html>