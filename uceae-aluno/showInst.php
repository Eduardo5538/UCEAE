<?php
  session_start();
    include "conection.php";
    if(!isset($_GET['cnpj'])){
      header('Location: brazil.php');
    }
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
    try{
      $Comando = $conexao->prepare("SELECT * from comentarios WHERE CNPJ = ?");
      $Comando->bindParam(1, $cnpj);
      $Comando->execute();
      $Res1 = $Comando->fetchAll();
      $RetornoJSON1 = json_encode($Res1);
                
    }
    catch(PDOException $error){
      echo $error;
    }
    try{
      $Comando = $conexao->prepare("SELECT * from objetivos WHERE CNPJ = ?");
      $Comando->bindParam(1, $cnpj);
      $Comando->execute();
      $Res3 = $Comando->fetchAll();
      $RetornoJSON = json_encode($Res);
    }
    catch(PDOException $error){
        echo $error;
    }
    try{
      $Comando = $conexao->prepare("SELECT * from cursos WHERE CNPJ = ?");
      $Comando->bindParam(1, $cnpj);
      $Comando->execute();
      $Res4 = $Comando->fetchAll();
    }
    catch(PDOException $error){
        echo $error;
    }



    $tamanho = sizeof($Res1);
    $nota1 = 0;
    $nota2 = 0;
    $nota3 = 0;
    $nota4 = 0;
    $nota5 = 0;
    $media1 = 0;
    $media2 = 0;
    $media3 = 0;
    $media4 = 0;
    $media5 = 0;



    for($i = 0; $i <= sizeof($Res1) - 1; $i++)
    {
      if($Res1[$i]['nota'] == 1){
        $nota1 += 1;
      }
      elseif($Res1[$i]['nota'] == 2){
        $nota2+= 1;
      }
      elseif($Res1[$i]['nota'] == 3){
        $nota3+= 1;
      }
      elseif($Res1[$i]['nota'] == 4){
        $nota4+= 1;
      }
      else{
        $nota5+= 1;
      }
    }

    
    echo "<input type='hidden' id='nota1' name='nota1' value='".$nota1."'>";
    echo "<input type='hidden' id='nota2' name='nota2' value='".$nota2."'>";
    echo "<input type='hidden' id='nota3' name='nota3' value='".$nota3."'>";
    echo "<input type='hidden' id='nota4' name='nota4' value='".$nota4."'>";
    echo "<input type='hidden' id='nota5' name='nota5' value='".$nota5."'>";
    echo "<input type='hidden' id='tamanho' name='nota5' value='".$tamanho."'>";
    echo "<input type='hidden' id='cnpj' name='cnpj' value='".$_GET['cnpj']."'>";

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
      let nota1 = document.getElementById("nota1").value;
      let nota2 = document.getElementById("nota2").value;
      let nota3 = document.getElementById("nota3").value;
      let nota4 = document.getElementById("nota4").value;
      let nota5 = document.getElementById("nota5").value;
      let tamanho = document.getElementById("tamanho").value;

      let aprov = parseInt(nota5) + parseInt(nota4) + parseInt(nota3);
      let desaprov = tamanho - aprov;

      if(desaprov < 0){
        desaprov = desaprov * -1;
      }

    

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Notas', 'Porcentagem'],
          ["1 estrela", parseInt(nota1)],
          ["2 estrelas", parseInt(nota2)],
          ["3 estrelas", parseInt(nota3)],
          ["4 estrelas", parseInt(nota4)],
          ['5 estrelas', parseInt(nota5)]
        ]);

        var options = {
          title: 'Gráfico de Avaliações',
          width: 700,
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
          colors:["#0181E5"]
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
          ['Aprovação',  parseInt(aprov)],
          ['Desaprovação', parseInt(desaprov)],
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none',
          title: 'Taxa de Aprovação',
          colors:['#49b675', "#cd5c5c"]

        };

        var chart = new google.visualization.PieChart(document.getElementById('div-graficos-rosca'));
        chart.draw(data, options);
      }
    </script>
</head>
<body onload='CarregaPagina()'>
    
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
          <a class="nav-link" href="../uceae-aluno/busca.php">Busca</a>
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
        echo "<p>" . $Res[0]['email_escola']  . "</p><br>";
        echo "<a href='../uceae-login/". $Res[0]['comprovante'] ."' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Verificar Acessibilidade</a><br><Br>"
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
        if($Res[0]['modalidade'] == ""){
          echo "<h5>Tipo de curso: Não informado</h5> <br>";
        }
        else{
          echo "<h5>Tipo de curso: ". $Res[0]['modalidade'] ."</h5> <br>";
        }
        
        if( $Res[0]['acessibilidade'] == "S"){
          echo "<h5>Acessivel!</h5> <br>";
        }
        else{
          echo "<h5>Não acessivel!</h5><br>";
        }

        if($Res[0]['acessibilidade_texto'] == ""){
          echo "<h5>Não descreve sua acessibilidade!</h5><br>";
        }
        else{
          echo "<h5>Tipo de acessibilidade: ". $Res[0]['acessibilidade_texto'] ."</h5><br>";
        }
        if($Res[0]['mensalidade'] == "" || $Res[0]['mensalidade'] == "0.00"){
          echo "<h5>Mensalidade: Grátis!</h5>";
        }
        else{
          echo "<h5>Mensalidade: R$" . $Res[0]['mensalidade']  . "</h5>";
        }
        
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
  <br><br><br>

  <!-- ---------- Informações da instituição ---------- -->
  <br><br>
  <div class="main-container">
  <div class="heading">
    <h1 class="heading__title titulo-grande">Sobre a Instituição</h1>
    <p class="heading__credits">Biografia e Informações</p>
  </div>
  <div class="cards">
    <?php 
    if(isset($Res[0]['origem'])){
            echo "<div class='card card-1'>
              <div class='card__icon'><i class='fas fa-bolt'>Biografia</i></div>
              <p class='card__exit'><i class='fas fa-times'></i></p>
              <h2 class='card__title'>" . $Res[0]['origem'] . "</h2>
            </div>";
    }
    if(isset($Res[0]['descAcess'])){
        echo "<div class='card card-2'>
          <div class='card__icon'><i class='fas fa-bolt'>Acessibilidades</i></div>
          <p class='card__exit'><i class='fas fa-times'></i></p>
          <h2 class='card__title'>". $Res[0]['descAcess'] ."</h2>
        </div>";
    }
    if(isset($Res[0]['informacoes'])){
        echo "<div class='card card-3'>
          <div class='card__icon'><i class='fas fa-bolt'>Informações Extras</i></div>
          <p class='card__exit'><i class='fas fa-times'></i></p>
          <h2 class='card__title'>". $Res[0]['informacoes'] ."</h2>
        </div>";
    }
    if(isset($Res[0]['informacoes'])){
       echo " <div class='card card-4'>
          <div class='card__icon'><i class='fas fa-bolt'>Link do Site</i></div>
          <p class='card__exit'><i class='fas fa-times'></i></p>
          <h2 class='card__title'>Para acessar nosso site, clique no link abaixo:</h2>
          <p class='card__apply'>
            <a class='card__link' href='https://" . $Res[0]['link'] . "'>Site Oficial<i class='fas fa-arrow-right'></i></a>
          </p>
        </div>
      </div>";
    }
    else{
      echo "<center><h3 id='infoBiografia'>Dados extras não informados</h3></center>";
    }
    ?>
</div>

  <!-- Card Metas -->
  <br><br>
  <h1 class="titulo-grande">Nossos Objetivos</h1>
  <br><br>
  <div class="row1-container">
    <div class="box box-down cyan">
      <h2>Objetivo 2</h2>
      <p><?php if(isset($Res3[0])){echo $Res3[0]['obj1'];} ?></p>
      <img src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
    </div>

    <div class="box red">
      <h2>Objetivo 1</h2>
      <p><?php if(isset($Res3[0])){echo $Res3[0]['obj2'];} ?></p>
      <img src="https://assets.codepen.io/2301174/icon-team-builder.svg" alt="">
    </div>

    <div class="box box-down blue">
      <h2>Objetivo 3</h2>
      <p><?php if(isset($Res3[0])){echo $Res3[0]['obj3'];} ?></p>
      <img src="https://assets.codepen.io/2301174/icon-calculator.svg" alt="">
    </div>
  </div>
  <div class="row2-container">
    <div class="box orange">
      <h2>Objetivo 4</h2>
      <p><?php if(isset($Res3[0])){echo $Res3[0]['obj4'];} ?></p>
      <img src="https://assets.codepen.io/2301174/icon-karma.svg" alt="">
    </div>
  </div>
  <br><br>

  <!-- Carousel de Imagens -->

  <div id='imagens_inst' onload='consultaImg()'>
        <?php

            try
            {
                $Comando = $conexao->prepare("SELECT * from imagens_instituicao WHERE cnpj = ?");
                $Comando->bindParam(1, $_GET['cnpj']);
                $Comando->execute();
                $Res = $Comando->fetchAll();
                $RetornoJSON = json_encode($Res);
                

            }

            catch(PDOException $erro){
                $RetornoJSON = "Erro: " . $erro->getMessage();
                echo $RetornoJSON;
            }


            if (count($Res) > 0){
                echo "<div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel' style='height:20%'>";
                echo "<div class='carousel-inner'>";
                for($j = 0; $j < count($Res); $j++){
                    if($j == 0){
                        echo  "<div class='carousel-item active'>";
                    }
                    else{
                        echo "<div class='carousel-item'>";
                    }
                    echo "<img src='" . $Res[$j]['imagem'] . "' class='d-block w-100 imagem-carousel' alt='" . $Res[$j]['cod_imagem'] . "' id='img-carousel'>";
                    echo "</div>";

                }
                echo "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>";
                echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                echo "<span class='visually-hidden'>Previous</span>";
                echo "</button>";
                echo "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>";
                echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                echo "<span class='visually-hidden'>Next</span>";
                echo "</button>";
                echo "</div>";
            }
        ?>
</div>
  <!-- Tabela de Cursos -->
  <div id="tabela_cursos">

  
    

  <?php
  if(isset($Res4)){
    for($i = 0; $i <= sizeof($Res4) - 1; $i++){
      echo "<div id='card_curso'>";
      echo "<h3><b>". $Res4[$i]['titulo'] ."</b></h3>";
      echo "<hr>";
      
      echo "<h5>Modalidade: ". $Res4[$i]['modalidade'] . "</h5>";
      if($Res4[$i]['periodo'] == "N"){
        echo "<h5>Período Noturno</h5>";
      }
      elseif($Res4[$i]['periodo'] == "M"){
        echo "<h5>Período Manhã</h5>";
      }
      elseif($Res4[$i]['periodo'] == "T"){
        echo "<h5>Período Tarde</h5>";
      }
      else{
        echo "<h5>Período Integral</h5>";
      }
      
      echo "<hr>";
      echo "<p>" . $Res4[$i]['descr'] ."</p>";
      echo "<hr>";
      if($Res4[$i]['acessibilidade'] == "S"){
        echo "<p>Curso Adaptado</p>";
      }
      else{
        echo "<p>Curso não Adaptado</p>";
      }
     
      echo "<p>Mensalidade: </p><p><b>R$: " . $Res4[$i]['preco']  . "</b></p>";
      echo "</div>";
    }
  }

  ?>

  </div>

  <!-- ---------- Comentários ---------- -->
  <br><br><br><br>
  <hr>
  
   <!-- Área de Gráficos -->

   <div class="topo">
    <label class="h1">Comentários e Avaliações</label>
    <h3 class="h3">Veja o que outros usuários acharam sobre essa Instituição</h3>
    <div class="conteudo">
        <div class="info" id = "div-graficos-rosca">
        </div>
        <div class="grafico" id="div-graficos-barra">
        </div>
    </div>
   </div>

 
    <!-- Inserir Comentário -->

    <div class="area-comentario" id="div-comentario">
      <?php
        if(!isset($_SESSION['CNPJ']) && isset($_SESSION['CPF'])){
          if($_SESSION['CPF'] != ''){
            echo "<br><br><br>";
            echo "<label id='h1' class='h1-titulo'>Inserir Comentário</label>
            <div class ='formulario'>
              <form id='form_comentario' method='post'> 
                <div class ='div-titulo-coment'>
                  <input type='text' name='titulo' id='txt_titulo' class='input-text titulo' placeholder='Título'>
                  <div class='star_rating' id='div-estrelas'>
                  <label class='star'>&#9734;</label>
                  <label class='star'>&#9734;</label>
                  <label class='star'>&#9734;</label>       
                  <label class='star'>&#9734;</label>
                  <label class='star'>&#9734;</label>
                </div>
                </div> 
                  <br><br>
                <div class ='div-texto-coment'>
                  <input type='text'  name='comentario' id='txt_comentario' class='input-text comentario' placeholder='Comentário'>
                </div>
                <br>
                <input type='hidden' value='". $cnpj ."' name='cnpj' id='cnpj'>
                <input type='hidden' name='nota' id='nota'>
                <input type='button' value='Comentar' onclick='inserir()' id='btn_comentario' class='btn btn-enviar'>
              </form>
            </div>
              ";
          
          }
        }
        else{
          echo "<label id='mensagem' class='mensagem'>Logue-se para comentar</label>";
        }
      ?>
    </div>

    <!-- Área de Comentários -->
    
   <div class="comentarios">
    <br><br><br><br>
    <label class="titulo2">Comentários</label>
    <div class="barra-filtro">
        <select name="filtro" id="filtro_tempo" class="tipo">
            <option value="todos">Todos</option>
            <option value="recentes">Mais Recentes Primeiro</option>
        </select>
       
    </div>
   </div>
   
   <?php
            
            if($RetornoJSON1  == "[]")
            {
                echo "<label id='retorno' class='retorno'>Nenhum comentário ainda</label><br><br>";
            }
            else
            {
              
                for($i = 0; $i <= sizeof($Res1) - 1; $i++)
                {
                      $Data = $Res1[$i]['data'];  
                      $NovaData = date("d/m/Y", strtotime($Data));   
                  echo "
                    <div id='card-coment' class='cards-coments'>
                      <div class='card-header'>
                        <img src='../uceae-login/". $Res1[$i]['imagem_comentario'] ."' class='card-foto'>
                        <p class='card-nome'>".$Res1[$i]['nome']."</p>
                        
                        <h4 class='data'>".$NovaData."</h4>
                      </div>
                      <div class='card-content'>";
                        for($j = 0; $j < $Res1[$i]['nota']; $j++){
                          echo "<label class='star2'>&#9733;</label>";
                          if($Res1[$i]['nota'] == null){
                            exit;
                          }
                        }
                        echo "<h5 class='card-title'>".$Res1[$i]['titulo']."</h5>
                        <h6 class='card-msg'>".$Res1[$i]['conteudo']."</h6>
                      </div>
                    </div>
                    <br><br><br>";
                }
                
            }
        ?>
</main>
</body>
</html>