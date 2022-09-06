<?php
    include "conection.php";
    $cnpj = $_GET['cnpj'];
    try{
        $Comando = $conexao->prepare("SELECT * from escolas WHERE cnpj = ?");
        $Comando->bindParam(1, $cnpj);
        $Comando->execute();
        $Res = $Comando->fetchAll();
        $RetornoJSON = json_encode($Res);
    }
    catch(PDOException $error){
        echo $error;
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/showInst.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title><?php echo $Res[0]['nome_escola']; ?></title>
</head>
<body>
    
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
          <a class="nav-link" href="../uceae-aluno/brazil.php">Busca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mapa</a>
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
          <strong><label id="nome_perfil"><?php echo $Res[0]['nome_escola']?></label></strong>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

  <!-- --------------------- Banner da Instituição --------------------- -->

  <div class="image-upload" id="banner-foto">
  <label for="file-input" id="input-file">
  <form method="post" id="alter_banner" action='alterarImg.php' enctype="multipart/form-data">
    <?php
        echo "<img src='".  $Res[0]['foto_banner']  ."' id='foto_banner' name='foto_banner'>"
      ?>
    
  </label>
  </form>
  </div>
  <section id="foto">
  <div class="image-upload">
  <form method='post' id='alter_perfil'>
    <label for="file-input">
      <?php
          echo "<img src='".  $Res[0]['foto_perfil']  ."' id='foto_perfil'>"
        ?>
    </label>
  </form>
</div>
  </section>
  <!-- --------------------- Botao de adicionar Propagandas --------------------- -->

  <br><br><br><br>

  <?php
   
   echo "<h1>" . $Res[0]['nome_escola']  . "</h1><br><br>";
   echo "<h3>" . $Res[0]['email_escola']  . "</h3><br><br>";
   echo "<h4>" . $Res[0]['cidade_escola']  . "</h4><br><br>";
   echo "<h5>" . $Res[0]['nome_escola']  . "</h5><br><br>";
   echo "<h5>" . $Res[0]['rua_escola']  . "</h5><br><br>";
   echo "<h5>" . $Res[0]['uf_escola']  . "</h5><br><br>";
   echo "<a href='#'>" . $Res[0]['telefone_escola']  . "</a><br><br>";

   

?>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.402513434294!2d-43.91000007038396!3d-19.90743594992827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa69bcc8c577769%3A0xfb9fd9a312a6145d!2sAv.%207%20de%20Abril%20-%20Esplanada%2C%20Belo%20Horizonte%20-%20MG%2C%2030280-240!5e0!3m2!1ses!2sbr!4v1662474737779!5m2!1ses!2sbr" width="80%" height="750" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</body>
</html>