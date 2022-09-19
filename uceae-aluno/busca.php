<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/busca.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
	<title>UCEAE</title>

    <script type="text/javascript">
		$(document).ready(function(){
			$("#toogle").click(function(){
				$("#filtros").slideToggle('slow');
			});
		});
	</script>

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
          <a class="nav-link active" aria-current="page" href="index.php">Portal</a>
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
              echo "<a href='../uceae-login/formularioAluno.php' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Cadastre-se!</a>";
              echo "<a href='../uceae-login/formularioInst.php' class='btn btn-warning' tabindex='-1' role='button' aria-disabled='true'>Cadastrar sua instituição!</a>";
          }
        ?>
          <?php
            
            if(isset($_SESSION['CNPJ'])){
              if($_SESSION['CNPJ'] != ''){
                echo "<a href='../uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
                echo "<a href='../uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              
              }
            }

          ?>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

<main>
    <br>
    <h1 id="titulo">Procure as melhores escolas de sua região!</h1>
    <br><br>

    <div id="pesquisa">

        <form action="#" method="POST" name="formBusca" id="formBusca">
            <input type="search" name="busca" id="busca" placeholder="Buscar">
            <button type="submit" id="search-button">
                <img src="img/icones/search.png">
            </button>
        </form>

    </div>
    <br>

    <p id="toogle">Filtros para ajudar sua pesquisa!</p>

    <div id="filtros">
        <div id="inputs">
            <select>
                <option>Estado</option>
                <option>Estado1</option>
                <option>Estado2</option>
            </select>

            <select>
                <option>Cidade</option>
                <option>Cidade1</option>
                <option>Cidade2</option>
            </select>

            <select>
                <option>Curso</option>
                <option>Curso1</option>
                <option>Curso2</option>
            </select>

            <select>
                <option>Grade</option>
                <option>Grade1</option>
                <option>Grade2</option>
            </select>
        </div>
        
        <br><br>

        <div id="modalidade">
            <label>Modalidade: </label>
            <input type="radio" id="Presencial" name="modalidade" value="Presencial">
            <label for="Presencial">Presencial</label><br>
            <input type="radio" id="Online" name="modalidade" value="Online"> 
            <label for="Online">Online</label><br>
            <input type="radio" id="Hibrido" name="modalidade" value="Hibrido">
            <label for=" Hibrido"> Híbrido</label><br>
        </div>

        <br>

        <label style="margin-top: 30px;">Preço</label><br>
        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">

        <br><br>

        <input type="button" id="pesquisar">
    </div>
</main>
            
<footer>
  <p id="rua-bottom">Rua Paçoca 131 - Prédio do Grande Soldador</p>

  <p id="uceae-bottom">UCEAE - Todos direitos reservados®.</p>

  <div id="sociais-bottom">
    <p>Siga a gente nas redes sociais!</p>
    <div id="botoes-bottom">
      <a href="#"><i class="bi bi-twitter green grande"></i></a>
      <a href="#"><i class="bi bi-instagram insta grande"></i></a>
      <a href="#"><i class="bi bi-facebook blue grande"></i></a>
    </div>
  </div>
</footer>

</body>
<!-- Script para animação em css e js -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>