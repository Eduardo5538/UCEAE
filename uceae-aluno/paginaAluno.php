<!DOCTYPE html>
<html>
<head>
  
<?php
  session_start();
  include 'conection.php';
  try
    {
      if($_SESSION['CPF'] == null){
        header('Location: ../index.php');
      }
       $Comando = $conexao->prepare("SELECT * from tab_alunos WHERE cpf_aluno = ?");
       $Comando->bindParam(1, $_SESSION['CPF']);
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="imagem/png" href="../img/UCEAE4.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/paginaAluno.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/alt.js"></script>
  <script src="js/paginaAluno.js"></script>
	<title><?php echo $Res[0]['nome_aluno']; ?></title>
</head>
<body onload="carregaPagina()">


  <!-- --------------------- Barra de Navegação --------------------- -->

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
          <a class="nav-link" href="busca.php">Busca</a>
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
          <strong><label id="nome_perfil"><?php echo $Res[0]['nome_aluno']?></label></strong>
        	<button type="button" id="btn_alterarFoto" data-bs-toggle="modal" data-bs-target="#ModalSair"> <?php echo "<img src='../uceae-login/".  $Res[0]['foto_aluno']  ."' id='ft_perfil'>"?></button>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

  <!-- --------------------- Conteudo --------------------- -->

  <!-- Area Foto e Boas Vindas -->

  <div class="centralizado">
        <div class="bloco-foto">
            <img src="img/aluno.png" alt="" class="foto-aluno">
        </div>
        <div class="bloco-boasVindas">
            <h1 class="titulo">Boas Vindas!</h1>
            <br>
            <h2 class="subtitulo">Fique a vontade para alterar seus dados!</h2>
        </div>
    </div>

  <!-- Area Formulario Alteração de Dados -->

  <div class="div-form">
    <form action="alterarAluno.php" method='POST' name="form_alterar" id="frm_alt" class="form">
      <div class="linha-blocos">
        <div class="div-esquerda">
          <div class="div-info">
            <div class="bloco-itens">
              <label for="">Nome</label><br>
              <input type="text" name="Nome" id="" required  placeholder='<?php echo $Res[0]['nome_aluno']  ?>'>
            </div>
            <div class="bloco-itens">
              <label for="">CPF</label><br>
              <input type="text" name="CPF" id="txt_cpfAluno" maxlength='14' class='CPF' onchange="cpfVerify()"  placeholder='<?php echo $Res[0]['CPF_aluno']  ?>'>
              <div id="validacao"></div>
            </div>
            <div class="bloco-itens">
              <label for="">Data de Nascimento</label><br>
              <input type="date" name="nasc" required id="">
            </div>
            <div class="bloco-itens">
              <label for="">Sexo</label><br>
              <input type="radio" name="Sexo" id="btn_masc" value="M">
              <label for="" class="label-radio">Masculino</label>
              <input type="radio" name="Sexo" id="btn_fem" value="F">
              <label for="" class="label-radio">Feminino</label>
              <input type="radio" name="Sexo" id="btn_naoinforma" value="NA">
              <label for="" class="label-radio">Não Informado</label>
            </div> 
            <div class="bloco-itens">
              <label for="">Possui Deficiência?</label><br>
                <input type="radio" name="def" id="btn_sim" value="S">
                <label for="" class="label-radio">Sim</label>
                <input type="radio" name="def" id="btn_nao" value="N">
                <label for="" class="label-radio">Não</label>
            </div>
            <div class="bloco-itens">
              <label for="desc">Descrição da Deficiência</label><br>
              <textarea name="desc" id="desc" class="textarea-desc" cols="30" required placeholder='<?php echo $Res[0]['deficiencia']  ?>'></textarea>
            </div>
          </div>
        </div>
        <br><br>
        <div class="div-direita">
          <div class="div-contato">
            <div class="bloco-itens">
              <label for="Telefone">Telefone</label><br>
              <input type="text" name="Telefone" id="tel" class='tel' maxlength='15' required placeholder='<?php echo $Res[0]['telefone_aluno']  ?>'>
            </div>
            <div class="bloco-itens">
              <label for="">Email</label><br>
              <input type="email" name="Email" id="Email" required placeholder='<?php echo $Res[0]['email']  ?>'>
            </div>
            <div class="bloco-itens">
              <label for="">Senha</label><br>
              <input type="password" name="Senha" id="Senha" required>
            </div>
          </div>
          <br>
          <div class="div-endereco">
            <div class="bloco-itens">
              <label for="">CEP</label><br>
              <input type="text" name="CEP" id="CEP" class='input-cep' required maxlength='9' onchange='atualizarCampos()' placeholder='<?php echo $Res[0]['cep_aluno']  ?>'>
            </div>
            <div class="bloco-itens">
              <label for="">Rua</label><br>
              <input type="text" name="Rua" id="Rua" required placeholder='<?php echo $Res[0]['rua_aluno']  ?>'>
            </div>
            <div class="bloco-itens">
              <label for="">Bairro</label><br>
              <input type="text" name="Bairro" id="Bairro" required  placeholder='<?php echo $Res[0]['bairro_aluno']  ?>'>
            </div>
            <div class="bloco-itens">
              <label for="">Cidade</label><br>
              <input type="text" name="Cidade" id="Cidade" required  placeholder='<?php echo $Res[0]['cidade_aluno']  ?>'>
            </div>
            <div class="bloco-itens">
                  <label for="uf">Unidade Federativa</label><br>
                  <select class="estado" required name='UF' id="UF" required>
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
              </div>
          </div>
        </div>
    </div>
      <div class="div-botao">
        <input type="submit" value="Alterar" class="btn-alt">
      </div>
      <br><br>
    </form>
  </div>
</body>
</html>