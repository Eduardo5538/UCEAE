<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adicionar Cursos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/cursosAdicionar.css">
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

   <h1 id="titulo">Seus Cursos</h1>
   <br><br><br>
   <br><br><br>
   <h2 id="texto">Nenhum Curso Adicionado</h2>

   <!-- --------------------- Card de Adicionar --------------------- -->

   <div id="resposta">
     <div id="card">
       <div id="card-image">
         <img src="img/adicionar-botao.png">
       </div>
       <div id="card-conteudo">
         <h1>Adicionar Curso</h1>
       </div>
     </div>
   </div>

</body>
</html>