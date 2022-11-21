<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="imagem/png" href="../img/UCEAE4.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/busca.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="js/logar.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


	<title>UCEAE</title>

    <script type="text/javascript">
		$(document).ready(function(){
			$("#toogle").click(function(){
        $("#filtros").slideToggle('slow', function(){
          if($('#filtros').css('display') == 'none'){
            $(".material-symbols-outlined").remove();
            $("#toogle").append('<span class="material-symbols-outlined">arrow_drop_down</span>');
          }
          if($('#filtros').css('display') == 'block'){
            $(".material-symbols-outlined").remove();
            $("#toogle").append('<span class="material-symbols-outlined">arrow_drop_up</span>');
          }
        });
        }
			);

      $('#formBusca').attr('action', 'javascript:void(0);');
		});
	</script>

</head>
<body>


<!-- navbar -->
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
          <a class="nav-link active" href="#">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="brazil.php">Mapa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sobreNos.php">Sobre Nós</a>
        </li>
      </ul>
      <form class="d-flex">
      	<div style="margin-right: 20px;">
        <?php
          session_start();
          if(!isset($_SESSION['CNPJ']) && !isset($_SESSION['CPF'])){
              echo "<button class='btn btn-outline-dark' type='button' style='margin-right: 10px;' data-bs-toggle='modal' data-bs-target='#ModalEntrar'>Entrar</button>";
              echo "<a href='../uceae-login/formularioAluno.php' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Cadastre-se!</a>";
              echo "<a href='../uceae-login/formularioInst.php' class='btn btn-warning' tabindex='-1' role='button' aria-disabled='true'>Cadastrar sua instituição!</a>";
          }
            
            if(isset($_SESSION['CNPJ']) && !isset($_SESSION['CPF'])){
              if($_SESSION['CNPJ'] != ''){
                echo "<a href='../uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
                echo "<a href='../uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              }
            }

            if(!isset($_SESSION['CNPJ']) && isset($_SESSION['CPF'])){
              if($_SESSION['CPF'] != ''){
                echo "<a href='../uceae-aluno/paginaAluno.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
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

        <form action="" method="POST" name="formBusca" id="formBusca">
            <input type="text" name="busca" id="busca" placeholder="Buscar"> 
            <button type="button" id="search-button" onclick="consulta()" required>
                <img src="img/icones/search.png">
            </button>
        </form>

    </div>
    <br>

    <p id="toogle">Filtros para ajudar sua pesquisa!
        <span class="material-symbols-outlined" style="color: #976DD0;">arrow_drop_down</span>
    </p>
    
    <div id="filtros">
      <form action="" method="POST" id="formBuscaFiltro" name="formBuscaFiltro">
        <div id="inputs">
            <select onchange="trocacidade()" id="estado" name="estado">
              <option value="AC" id="AC">AC</option><option value="AL" id="AL">AL</option>
              <option value="AP" id="AP">AP</option><option value="AM" id="AM">AM</option>
              <option value="BA" id="BA">BA</option><option value="CE" id="CE">CE</option>
              <option value="DF" id="DF">DF</option><option value="ES" id="ES">ES</option>
              <option value="GO" id="GO">GO</option><option value="MA" id="MA">MA</option>
              <option value="MT" id="MT">MT</option><option value="MS" id="MS">MS</option>
              <option value="MG" id="MG">MG</option><option value="PA" id="PA">PA</option>
              <option value="PB" id="PB">PB</option><option value="PR" id="PR">PR</option>
              <option value="PE" id="PE">PE</option><option value="PI" id="PI">PI</option>
              <option value="RJ" id="RJ">RJ</option><option value="RN" id="RN">RN</option>
              <option value="RS" id="RS">RS</option><option value="RO" id="RO">RO</option>
              <option value="RR" id="RR">RR</option><option value="SC" id="SC">SC</option>
              <option value="SP" id="SP">SP</option><option value="SE" id="SE">SE</option>
              <option value="TO" id="TO">TO</option>
            </select>

            <select id="cidade" name="cidade" disabled>
                <option>Cidade</option>
            </select>
        </div>
        
        <br><br>

        <div id="radio">
            <label>Modalidade: </label>
            <input type="radio" id="Presencial" name="modalidade" value="Presencial">
            <label for="Presencial">Presencial</label><br>
            <input type="radio" id="Online" name="modalidade" value="Online"> 
            <label for="Online">Online</label><br>
            <input type="radio" id="Hibrido" name="modalidade" value="Hibrido">
            <label for=" Hibrido">Híbrido</label><br>
        </div><br><br>

        <div id="radio">
            <label>Acessibilidade: </label>
            <input type="radio" id="SIM" name="acessibilidade" value="SIM">
            <label for="SIM">SIM</label><br>
            <input type="radio" id="NAO" name="acessibilidade" value="NAO"> 
            <label for="NAO">NÃO</label><br>
        </div>

        <br>

        <label style="margin-top: 30px;">Preço da Mensalidade:</label><br>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; margin-bottom: 10px;">
        <div id="slider-range" class="peniszudo"></div>

        <br><br>

        <input type="button" id="pesquisar" onclick="consultaFiltro()">
      </form>
    </div>
    
    <br>
    <div id="cards"></div>
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
      <a href="../../uceae/uceae-login/alterar-senha.php">Esqueceu sua Senha?</a>
      </center>
        </form>
    </div>
  </div>
</div>

</body>
<!-- Script para animação em css e js -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<script src="js/consulta.js"></script>

</html>