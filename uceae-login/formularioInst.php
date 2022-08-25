<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de instituição</title>
	<link rel="stylesheet" type="text/css" href="css/formularioInst.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/cadastro.js"></script>
</head>
<body>
	<br><br>
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
                <input class="input__field" id="nome_inst" name="nome_inst" placeholder="Nome da instituição" required="" type="text" /><label class="input__label" for="nome_inst">Nome da Instituição</label>
              </div>
            </div>
            <div class="input form__inline-input">
              <div class="input__container">
                <input class="input__field" id="cnpj" name="cnpj" placeholder="CNPJ" required="" type="text" /><label class="input__label" for="cnpj">CNPJ</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="email" name="email" placeholder="Email" required="" type="text" /><label class="input__label" for="email">Email</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="senha" name="senha" placeholder="Senha" required="" type="password" /><label class="input__label" for="senha">Senha</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="confirm_senha" name="confirm_senha" placeholder="Confirmar Senha" required="" type="password" /><label class="input__label" for="confirm_senha">Confirmar Senha</label>
              </div>
            </div>
          </div>
          <hr>
          <br>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="tel" name="tel" placeholder="Telefone" required="" type="text" /><label class="input__label" for="tel">Telefone</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="cep" name="cep" placeholder="CEP" required="" type="text" /><label class="input__label" for="cep">CEP</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <select class="input__field" id="unid_fed" name="unid_fed"placeholder="Unidade Federativa" required="">
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
                <input class="input__field" id="rua"  name="rua" placeholder="Rua" required="" type="text" /><label class="input__label" for="rua">Rua</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="bairro" name="bairro"placeholder="Bairro" required="" type="text" /><label class="input__label" for="bairro">Bairro</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" id="cidade" name="cidade" placeholder="Cidade" required="" type="text" /><label class="input__label" for="cidade">Cidade</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <input type="file" name="foto_banner" id='foto_banner'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <input type="file" name="foto_perfil" id='foto_perfil'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
            <input type="file" name="foto_propaganda" id='foto_propaganda'><br><br>
            </div>
          </div>
          <div class="form__row">
            <div class="input-checkbox">
              <div class="input-checkbox__container">
                <input checked="" class="input-checkbox__field" id="agree" required="" tabindex="0" type="checkbox" /><span class="input-checkbox__square"></span><label class="input-checkbox__label" for="agree">Manter-me logado</label>
              </div>
            </div>
          </div>
          
          <div class="form__row">
            <div class="component component--primary form__button">
            <input type='submit' class="btn btn--regular" id="sign-up-button" tabindex="0" value='Cadastrar'><br><br>
              <a href="#" id="btn_criarConta">Já Possui uma conta? Entrar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br><br>
  </main>
</body>
</html>