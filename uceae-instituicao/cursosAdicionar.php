<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adicionar Cursos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/cursosAdicionar.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/addCurso.js"></script>
</head>
<body>

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
  <br><br><br>

   <!-- --------------------- Label --------------------- -->

   <h1 id="titulo">Adicionar Cursos</h1>
   <br><br><br>

   <!-- --------------------- Form de Adicionar --------------------- -->

   <form action="" method="post">
      <div class="container">
        <label for="name">Inserir Curso</label>
        <div class="input-file-upload">
          <div class="upload-btn">
            <button class="btn">
              Selecionar o Arquivo
            </button>
            <input type="file" id="upfile" onchange="readUrl(this);">
          </div>
          <img class="upload-img" id="file-upload">
        </div>
        <button>Enviar</button>
      </div>
   </form>
</body>
</html>