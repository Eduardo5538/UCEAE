<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós e Contato</title>
    <link rel="stylesheet" href="css/sobreNos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="uceae-login/js/logar.js"></script>
</head>
<body class="bg">

    <!-- navbar -->

	<nav class="navbar navbar-expand-lg navbar-light bg-light barra" style="height: 70px;">
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
          <a class="nav-link" href="../uceae/sobreNos.php">Sobre Nós</a>
        </li>
      </ul>
        
      <form class="d-flex">
      	<div style="margin-right: 20px;">
        <?php
          session_start();
          if(!isset($_SESSION['CNPJ']) && !isset($_SESSION['CPF'])){
              echo "<button class='btn btn-outline-dark' type='button' style='margin-right: 10px;' data-bs-toggle='modal' data-bs-target='#ModalEntrar'>Entrar</button>";
              echo "<a href='uceae-login/formularioAluno.php' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Cadastre-se!</a>";
              echo "<a href='uceae-login/formularioInst.php' class='btn btn-warning' tabindex='-1' role='button' aria-disabled='true'>Cadastrar sua instituição!</a>";
          }
            
            if(isset($_SESSION['CNPJ']) && !isset($_SESSION['CPF'])){
              if($_SESSION['CNPJ'] != ''){
                echo "<a href='uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
                echo "<a href='uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              }
            }

            if(!isset($_SESSION['CNPJ']) && isset($_SESSION['CPF'])){
              if($_SESSION['CPF'] != ''){
                
                echo "<a href='uceae-aluno/paginaAluno.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
                echo "<a href='uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              
              }
            }
          ?>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

  <!-- Itens -->

    <div class="centralizado">
        <div class="bloco-logo">
            <img src="img/UCEAE1.png" alt="">
        </div>
        <div class="bloco-nome">
            <h1 class="nome-uceae">Um Curso Especial para Alguém Excepcional</h1>
            <br>
            <a href="docs/ManualdoUsuário.pdf" tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'><button class="btns btn-manual">Manual do Usuário</button></a>
            <a href="docs/Documentacao_UCEAE-1.pdf"  tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'><button class="btns btn-doc">Documentação</button></a>
        </div>
    </div>
    <br><br>
    <br><br>
    <div class="div-titulo">
        <div id="container">
            <span id="text1"></span>
            <span id="text2"></span>
        </div>

        <svg id="filters">
            <defs>
                <filter id="threshold">
                    <feColorMatrix in="SourceGraphic" type="matrix" values="1 0 0 0 0
                        0 1 0 0 0
                        0 0 1 0 0
                        0 0 0 255 -140" />
                </filter>
            </defs>
        </svg>
    <br><br>
    <br><br>
    <br><br>
    <h1 class="titulo-equipe">------- Nossa Equipe -------</h1>
    <br><br>
    <div class="box">
      <div class="card">
        <div class="imgBx">
            <img src="img/davi.png" alt="images">
        </div>
        <div class="details">
            <h2>Davi Alexandre<br><span>Programador</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="img/edu.jfif" alt="images">
        </div>
        <div class="details">
            <h2>Eduardo Correa<br><span>Programador</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="img/rangel.jfif" alt="images">
        </div>
        <div class="details">
            <h2>Gabriel Rangel<br><span>Programador</span></h2>
        </div>
      </div>
    </div>
    <br><br>
    <div class="box">
      <div class="card">
        <div class="imgBx">
            <img src="img/destro.jfif" alt="images">
        </div>
        <div class="details">
            <h2>Arthur Destro<br><span>Documentação</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="img/volp.jfif" alt="images">
        </div>
        <div class="details">
            <h2>Gabriel Volpiani<br><span>Documentação</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="img/mussi.jpg" alt="images">
        </div>
        <div class="details">
            <h2>Guilherme Mussi<br><span>Documentação</span></h2>
        </div>
      </div>
    </div>
    <br><br>
    <div class="div-redes">
        <div class="linha-cards">
            <div class="card-rede">
                <div class="img-rede">
                    <a href="https://instagram.com/uceae"><img src="img/logo-instagram.png" class="img-instagram" alt=""></a>
                </div>
                <div class="nome-rede">
                    <h2>instagram.com/uceae</h2>
                </div>
            </div>
            <div class="card-rede">
                <div class="img-rede">
                    <a href="https://facebook.com/uceae"><img src="img/facebook-logo.png" class="img-face" alt=""></a>
                </div>
                <div class="nome-rede">
                    <h2>facebook.com/uceae</h2>
                </div>
            </div>
            <div class="card-rede">
                <div class="img-rede">
                    <a href="https://twitter.com/portal_uceae"><img src="img/twitter-icon.png" class="img-twitter" alt=""></a>
                </div>
                <div class="nome-rede">
                    <h2>twitter.com/uceae</h2>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="two">
        <h1>Contato
            <span>Dúvidas? Reclamações? Envie-nos seu Feedback!</span>
        </h1>
    </div>
    <br><br><br><br>
    <div class="div-formContato">
        <form action="https://api.staticforms.xyz/submit" method="post" id="frm_formContato" class="form-contato" class="formContato">
          <input type="hidden" name="accessKey" value="439ca4fb-1e0c-4d39-b935-872c7323e422">
            <div class="div-linhaForm linha1">
                <input type="text" name="name" id="txt_nomeContato" class="campo" placeholder="Nome Completo">
                <input type="email" name="email" id="txt_emailContato" class="campo "placeholder="Seu Email">
            </div>
            <br><br>
            <div class="div-linhaForm linha2">
                <input type="text" name="subject" id="txt_titulo" class="campo" placeholder="Título"><br>
                <textarea name="message" id="txt_assuntoContato" class="campo assuntoContato" placeholder="Assunto"></textarea>
            </div>
            <input type="hidden" name="redirectTo" value="http://localhost/git/uceae/sobreNos.php">
            <input type="submit" value="Enviar Feedback" class="btn-enviarContato" id="btn_contato">
        </form>
    </div>
    <br><br>
    </div>
teste
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

</body>

<script>
        const elts = {
            text1: document.getElementById("text1"),
            text2: document.getElementById("text2")
        };

        const texts = [
            "UCEAE",
            "Abrindo Caminho para o Aprendizado",
            "Busca por instituições Inclusivas",
            "Em busca da acessibilidade"
        ];

        const morphTime = 2;
        const cooldownTime = 1.5;

        let textIndex = texts.length - 1;
        let time = new Date();
        let morph = 0;
        let cooldown = cooldownTime;

        elts.text1.textContent = texts[textIndex % texts.length];
        elts.text2.textContent = texts[(textIndex + 1) % texts.length];

        function doMorph() {
            morph -= cooldown;
            cooldown = 0;

            let fraction = morph / morphTime;

            if (fraction > 1) {
                cooldown = cooldownTime;
                fraction = 1;
            }

            setMorph(fraction);
        }

        function setMorph(fraction) {
            elts.text2.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            elts.text2.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            fraction = 1 - fraction;
            elts.text1.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            elts.text1.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            elts.text1.textContent = texts[textIndex % texts.length];
            elts.text2.textContent = texts[(textIndex + 1) % texts.length];
        }

        function doCooldown() {
            morph = 0;

            elts.text2.style.filter = "";
            elts.text2.style.opacity = "100%";

            elts.text1.style.filter = "";
            elts.text1.style.opacity = "0%";
        }

        function animate() {
            requestAnimationFrame(animate);

            let newTime = new Date();
            let shouldIncrementIndex = cooldown > 0;
            let dt = (newTime - time) / 1000;
            time = newTime;

            cooldown -= dt;

            if (cooldown <= 0) {
                if (shouldIncrementIndex) {
                    textIndex++;
                }

                doMorph();
            } else {
                doCooldown();
            }
        }

        animate();
    </script>


</html>