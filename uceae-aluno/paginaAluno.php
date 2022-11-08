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

  <div class="div-header">
    <div class="linha-blocos">
      <div class="div-foto">
        <img src="" alt="">
      </div>
      <div class="div-titulo">
        <h1>Boas Vindas!</h1>
        <p>Sinta-se à vontade para editar seus dados!</p>
      </div>
    </div>
  </div>

  <!-- Area Formulario Alteração de Dados -->

  <div class="div-form">
    <form action="POST" name="form_alterar" id="frm_alt" class="form">
      <div class="bloco-form div-info">
        <div class="bloco-itens">
          <label for="">Nome</label><br>
          <input type="text" name="" id="">
        </div>
        <div class="bloco-itens">
          <label for="">CPF</label><br>
          <input type="text" name="" id="">
        </div>
        <div class="bloco-itens">
          <label for="">Data de Nascimento</label><br>
          <input type="date" name="" id="">
        </div>
        <div class="bloco-itens">
          <label for="">Sexo</label><br>
          <input type="radio" name="radio" id="btn_masc" value="M">
          <label for="">Masculino</label>
          <input type="radio" name="radio" id="btn_fem" value="F">
          <label for="">Feminino</label>
          <input type="radio" name="radio" id="btn_naoinforma" value="NA">
          <label for="">Não Informado</label>
        </div> 
        <div class="bloco-itens">
          <label for="">Possui Deficiência?</label><br>
          <input type="radio" name="radio" id="btn_sim" value="S">
          <label for="">Sim</label>
          <input type="radio" name="radio" id="btn_nao" value="N">
          <label for="">Não</label>
        </div>
        <div class="bloco-itens">
          <label for="">Descrição da Deficiência</label><br>
          <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
      </div>
      <br><br>
      <div class="linha-blocos">
        <div class="bloco-form div-contato">
          <div class="bloco-itens">
            <label for="">Telefone</label><br>
            <input type="tel" name="" id="">
          </div>
          <div class="bloco-itens">
            <label for="">Email</label><br>
            <input type="email" name="" id="">
          </div>
        </div>
        <div class="bloco-form div-endereco">
          <div class="bloco-itens">
            <label for="">CEP</label><br>
            <input type="text" name="" id="">
          </div>
          <div class="bloco-itens">
            <label for="">Rua</label><br>
            <input type="text" name="" id="">
          </div>
          <div class="bloco-itens">
            <label for="">Bairro</label><br>
            <input type="text" name="" id="">
          </div>
          <div class="bloco-itens">
            <label for="">Cidade</label><br>
            <input type="text" name="" id="">
          </div>
          <div class="bloco-itens">
            <label for="">UF</label><br>
            <input type="text" name="" id="">
          </div>
        </div>
      </div>
    </form>
  </div>
</body>
</html>