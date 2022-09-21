<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de instituição</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/cadastro.js"></script>
  <link rel="stylesheet" type="text/css" href="css/formularioInst.css">
</head>
<body onload="mostrar()">
  <!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
    <a class="navbar-brand" href="../index.php">
      <img src="img/UCEAE2.png" alt width="130" height id="logo1">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 130px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Portal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../uceae-aluno/brazil.php">Mapa</a>
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
              echo "<a href='uceae-login/cadastroAluno.php' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Cadastre-se!</a>";
              echo "<a href='uceae-login/formularioInst.php' class='btn btn-warning' tabindex='-1' role='button' aria-disabled='true'>Cadastrar sua instituição!</a>";
          }
        ?>
          <?php
            
            if(isset($_SESSION['CNPJ'])){
              if($_SESSION['CNPJ'] != ''){
                echo "<a href='uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua página!</a>";
                echo "<a href='uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Deslogar</a>";
              
              }
            }

          ?>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

<main class="sign-up">
      <div class="sign-up__content">
        <header class="sign-up__header">
          <h1 class="sign-up__title">
            Informe-nos seus dados!
          </h1>
          <p class="sign-up__descr">
            Bem-vindo, por favor crie sua conta.
          </p>
        </header>
        <form class="sign-up__form form" id='form_inst' name='form_inst' method='post' action='insertInstituicao-cadastro.php' enctype="multipart/form-data">
          <div class="form__row form__row--two">
            <div class="input form__inline-input">
              <div class="input__container">
                <input class="input__field" id="nome_inst" name="nome_inst" placeholder="Nome da instituição" required type="text" /><label class="input__label" for="nome_inst">Nome da Instituição</label>
              </div>
            </div>
            <div class="input form__inline-input">
              <div class="input__container">
                <input class="input__field " id="cnpj" autocomplete="off" maxlength="18" name="cnpj" placeholder="CNPJ" required type="text" /><label class="input__label" for="cnpj">CNPJ</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="email" name="email" placeholder="Email" required type="text" /><label class="input__label" for="email">Email</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="senha" name="senha" placeholder="Senha" required type="password" /><label class="input__label" for="senha">Senha</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="confirm_senha" name="confirm_senha" placeholder="Confirmar Senha" required type="password" /><label class="input__label" for="confirm_senha">Confirmar Senha</label>
              </div>
            </div>
          </div>
          <hr>
          <br>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="tel" name="tel" placeholder="Telefone" required type="text" /><label class="input__label" for="tel">Telefone</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="cep" name="cep" placeholder="CEP" required type="text" /><label class="input__label" for="cep">CEP</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <select class="input__field" id="unid_fed" name="unid_fed"placeholder="Unidade Federativa" required>
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
                <label class="input__label" for="unid_fed">Unidade Federativa</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="rua"  name="rua" placeholder="Rua" required type="text" /><label class="input__label" for="rua">Rua</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="bairro" name="bairro"placeholder="Bairro" required type="text" /><label class="input__label" for="bairro">Bairro</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="cidade" name="cidade" placeholder="Cidade" required type="text" /><label class="input__label" for="cidade">Cidade</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="mensalidade" name="mensalidade" placeholder="mensalidade" required type="number" /><label class="input__label" for="mensalidade">Mensalidade</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <label for="foto_banner" id='label_banner'>Foto do Banner</label>
            <input type="file" name="foto_banner" id='foto_banner'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <label for="foto_perfil" id='label_perfil'>Foto de Perfil</label>
            <input type="file" name="foto_perfil" id='foto_perfil'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <label for="foto_propaganda" id='label_propaganda'>Propaganda</label>
            <input type="file" name="foto_propaganda" id='foto_propaganda'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <label for="comprovante" id='label_comprovante'>Comprovante de Acessibilidade</label>
            <input type="file" name="comprovante" id='comprovante'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="input-checkbox">
              <div class="input-checkbox__container">
                <input checked class="input-checkbox__field" id="agree" required tabindex="0" type="checkbox" /><span class="input-checkbox__square"></span><label class="input-checkbox__label" for="agree">Manter-me logado</label>
              </div>
            </div>
          </div>
          
          <div class="form__row">
            <div class="component component--primary form__button">
            <input type='submit' class="botao btn--regular" id="sign-up-button" tabindex="0" value='Cadastrar'><br><br>
              <a href="#" id="btn_criarConta">Já Possui uma conta? Entrar</a>
            </div>
          </div>
        </form>
      </div>
    </div>

  </main>

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
          </form>
      </div>
    </div>
  </div>

</body>
</html>