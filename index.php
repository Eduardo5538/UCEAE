<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="uceae-login/js/logar.js"></script>
  <link rel="icon" type="imagem/png" href="img/UCEAE4.png" />
	<title>UCEAE</title>

  <script>
    
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
          <a class="nav-link" href="uceae-aluno/busca.php">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="uceae-aluno/brazil.php">Mapa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../uceae/sobreNos.php">Sobre N??s</a>
        </li>
      </ul>
      <form class="d-flex">
      	<div style="margin-right: 20px;">
        <?php
          session_start();
          if(!isset($_SESSION['CNPJ']) && !isset($_SESSION['CPF'])){
              echo "<button class='btn btn-outline-dark' type='button' style='margin-right: 10px;' data-bs-toggle='modal' data-bs-target='#ModalEntrar'>Entrar</button>";
              echo "<a href='uceae-login/formularioAluno.php' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Cadastre-se!</a>";
              echo "<a href='uceae-login/formularioInst.php' class='btn btn-warning' tabindex='-1' role='button' aria-disabled='true'>Cadastrar sua institui????o!</a>";
          }
            
            if(isset($_SESSION['CNPJ']) && !isset($_SESSION['CPF'])){
              if($_SESSION['CNPJ'] != ''){
                echo "<a href='uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua p??gina!</a>";
                echo "<a href='uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              }
            }

            if(!isset($_SESSION['CNPJ']) && isset($_SESSION['CPF'])){
              if($_SESSION['CPF'] != ''){
                
                echo "<a href='uceae-aluno/paginaAluno.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua p??gina!</a>";
                echo "<a href='uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              
              }
            }

          ?>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

<main>

  <!-- Partes -->
  <div>

    <!-- Parallax -->
    <div id="parallax-center">
      <div id="parallax-img">
        <h2 id="parallax-text" data-aos="zoom-in" data-aos-duration="1500">EDUCA????O</h2>
      </div>
    </div>

    <div id="parte-1">
    <img src="img/lupa.png" height="400px" width="400px" data-aos="fade-up" data-aos-offset="200">
      <div id="parte-1-text">
        <h2 data-aos="fade-up">Uma nova oportunidade.</h2>
        <p data-aos="fade-up">Ache as escolas mais pr??ximas de voc??!</p>
      </div>
    </div>

    <div id="parte-2">
      <div id="parte-2-img">
        <div id="parte-2-content">

          <div class="parte-2-card" data-aos="fade-up">
            <img src="img/icones/school-branco.png" width="50px" height="50px">
            <div class="parte-2-text">
              <h5>Ache a escola ideal!</h5>
              <p>A melhor escola est?? aqui!</p>
            </div>
          </div>

          <div class="parte-2-card" data-aos="fade-up">
            <img src="img/icones/search-branco.png" width="50px" height="50px">
            <div class="parte-2-text">
              <h5>Busque por dezenas de filtros!</h5>
              <p>Milhares de institui????es!</p>
            </div>
          </div>

          <div class="parte-2-card" data-aos="fade-up">
            <img src="img/icones/searching-bar-branco.png" width="50px" height="50px">
            <div class="parte-2-text">
              <h5>Pesquise na nossa barra de pesquisa!</h5>
              <p>Assim achar?? a melhor escola no melhor tempo!</p>
            </div>
          </div>

          <div class="parte-2-card" data-aos="fade-up">
            <img src="img/icones/log-in-branco.png" width="50px" height="50px">
            <div class="parte-2-text">
              <h5>Cadastre sua institui????o!</h5>
              <p>E pessoas conhecer??o!</p>
            </div>
          </div>

          <div class="parte-2-card" data-aos="fade-up">
            <img src="img/icones/log-in-branco.png" width="50px" height="50px">
            <div class="parte-2-text">
              <h5>Cadastre-se em nosso site!</h5>
              <p>Ache as melhores institui????es!</p>
            </div>
          </div>

          <div class="parte-2-card" data-aos="fade-up">
            <img src="img/icones/favorites-branco.png" width="50px" height="50px">
            <div class="parte-2-text">
              <h5>Avalie!</h5>
              <p>Avalie nosso site!</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="parte-3">
      <div id="parte-3-text">
        <h1>Procure!</h1>
        <h5>Procure pelas institui????es de sua prefer??ncia!</h5>
        <br><br>
      </div>
      <div id="parte-3-cards">

        <div id="parte-3-card">
        <img src="img/icones/school.png" width="50px" height="50px">
          <div>
            <h4>P??blicas</h4>
            <p>Escolas p??blicas com acessibilidade.</p>
            <a href="uceae-aluno/busca.php"><h6>Procurar</h6></a>
          </div>
        </div>

        <div id="parte-3-card">
        <img src="img/icones/school.png" width="50px" height="50px">
          <div>
            <h4>Particulares</h4>
            <p>Escolas particulares com acessibilidade.</p>
            <a href="uceae-aluno/busca.php"><h6>Procurar</h6></a>
          </div>
        </div>

        <div id="parte-3-card">
        <img src="img/icones/school.png" width="50px" height="50px">
          <div>
            <h4>Acessibilidade</h4>
            <p>Escolas especializadas em acessibilidade.</p>
            <a href="uceae-aluno/busca.php"><h6>Procurar</h6></a>
          </div>
        </div>

      </div>
    </div>

  </div>


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
      <center>
      <a href="../uceae/uceae-login/alterar-senha.php">Esqueceu sua Senha?</a>
      </center>
        </form>
    </div>
  </div>
</div>

</main>

<footer>
  <p id="rua-bottom">Rua Pa??oca 131 - Pr??dio do Grande Soldador</p>

  <p id="uceae-bottom">UCEAE - Todos direitos reservados??.</p>

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

<!-- Script para anima????o em css e js -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>