<?php
  session_start();
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
  <link rel="icon" type="imagem/png" href="../img/UCEAE3.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/showInst.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/comentario.js"></script>
	<title><?php echo $Res[0]['nome_escola']; ?></title>

  <!-- Definindo Gráfico Horizontal -->
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      
      // grafico barra 

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Notas', 'Porcentagem'],
          ["1 estrela", 12],
          ["2 estrelas", 3],
          ["3 estrelas", 12],
          ["4 estrelas", 24],
          ['5 estrelas', 45]
        ]);

        var options = {
          title: 'Gráfico de Avaliações',
          width: 800,
          height: 350,
          legend: { position: 'none' },
          chart: { title: 'Quantidade de Notas',
                   subtitle: 'Análise por Porcentagem' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Quantidade'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" },
          colors:['#F08008']
        };

        var chart = new google.charts.Bar(document.getElementById('div-graficos-barra'));
        chart.draw(data, options);
      };

      // grafico rosca

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Aprovação', 'Total'],
          ['Aprovação',     100],
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none',
          title: 'Taxa de Aprovação',
          colors:['#8400DA']
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('div-graficos-rosca'));
        chart.draw(data, options);
      }
    </script>
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

  <br>

  <div id="informacoes">
    <div id="informacoes-header">
      <?php
        echo "<h1>" . $Res[0]['nome_escola']  . "</h1> ";
        echo "<p>" . $Res[0]['email_escola']  . "</p>";
      ?>
    </div>
    <br>
    <div id="informacoes-main">
      <?php
        echo "<h5>" . $Res[0]['rua_escola']  . "</h5> - ";
        echo "<h5>" . $Res[0]['bairro_escola']  . "</h5>, ";
        echo "<h5>" . $Res[0]['cidade_escola']  . "</h5> - ";
        echo "<h5>" . $Res[0]['uf_escola']  . "</h5>";
        echo "<a href='tel://". $Res[0]['telefone_escola'] ."'>" . $Res[0]['telefone_escola']  . "</a><br><br>";
      ?>
    </div>
  </div><br>
  <div style="text-align: center;">
  <BR><BR>
  <h1>MAPA</h1>
    <?php
      echo "<iframe src='https://www.google.com.br/maps?q=" . $Res[0]['cep_escola'] . ",%20Brasil&output=embed' width='80%' height='750' style='border:0;' allowfullscreen='true' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
    ?>
  </div>

  <!-- ---------- Comentários ---------- -->

  <hr>
  
   <!-- Área de Gráficos -->

   <div class="topo">
    <h1 class="h1">Comentários e Avaliações</h1>
    <h3 class="h3">Veja o que outros usuários acharam sobre essa Instituição</h3>
    <div class="conteudo">
        <div class="info" id = "div-graficos-rosca">
        </div>
        <div class="grafico" id="div-graficos-barra">
        </div>
    </div>
   </div>

 
    <!-- Inserir Comentário -->
    <?php
    
    if(!isset($_SESSION['CNPJ']) && isset($_SESSION['CPF'])){
      if($_SESSION['CPF'] != ''){
        echo "<h1 id='h1'>Inserir Comentário</h1>
          <form id='form_comentario' method='post'> 
              <input type='text' name='titulo' id='txt_titulo' class='input-text titulo' placeholder='Título'>
              <div class='star_rating' id='div-estrelas'>
                <button class='star'>&#9734;</button>
                <button class='star'>&#9734;</button>
                <button class='star'>&#9734;</button>       
                <button class='star'>&#9734;</button>
                <button class='star'>&#9734;</button>
              </div>
              <br><br>
              <input type='text' name='comentario' id='txt_comentario' class='input-text comentario' placeholder='Comentário'>
              <br>
              <input type='hidden' value='". $cnpj ."' name='cnpj' id='cnpj'>
              <input type='button' value='Comentar' onclick='inserir()' id='btn_comentario'>
              
          </form>
          ";
      
      }
    }
    else{
      echo "<h1 id='mensagem'>Logue-se para comentar</h1>";
    }



    ?>
    <!-- Área de Comentários -->

   <div class="comentarios">
    <h1 class="titulo2">Comentários</h1>
    <div class="barra-filtro">
        <select name="filtro" id="filtro_tempo" class="tipo">
            <option value="todos">Todos</option>
            <option value="recentes">Mais Recentes Primeiro</option>
        </select>
       
    </div>
   </div>
   
   <?php
            $cnpj = $_GET['cnpj'];
            try{
                $Comando = $conexao->prepare("SELECT * from comentarios WHERE CNPJ = ?");
                $Comando->bindParam(1, $cnpj);
                $Comando->execute();
                $Res1 = $Comando->fetchAll();
                $RetornoJSON = json_encode($Res1);
                
            }
            catch(PDOException $error){
                echo $error;
            }
            if($RetornoJSON  == "[]")
            {
                echo "<h1 id='retorno'>Nenhum comentário ainda</h1><br><br>";
            }
            else
            {
                for($i = 0; $i <= sizeof($Res1) - 1; $i++)
                {
                  echo "
                          <h5 class='card-title'>".$Res1[$i]['titulo']."</h5>
                          <p class='card-text'>".$Res1[$i]['nome']."</p>
                          <h6'>".$Res1[$i]['conteudo']."</h6>
                      <br><br><br>";
                }
                
            }
        ?>
 
</body>
</html>