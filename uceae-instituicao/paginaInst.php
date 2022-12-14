<!DOCTYPE html>
<html>
<head>
  
<?php
  session_start();
  include 'conection.php';
  try
    {
      if($_SESSION['CNPJ'] == null){
        header('Location: ../index.php');
      }
       $Comando = $conexao->prepare("SELECT * from escolas WHERE cnpj = ?");
       $Comando->bindParam(1, $_SESSION['CNPJ']);
       $Comando->execute();
       $Res = $Comando->fetchAll();
       $RetornoJSON = json_encode($Res);
    }

    //------------------- PARTE BUGADA DO EDUARDO BROXA ---------------------
/*
   session_start();
   include 'conection.php';
    try
      {
         $Comando = $conexao->prepare("SELECT * from escolas WHERE cnpj = 123");
         //$Comando->bindParam(1, $_SESSION['cnpj']);
         $Res = $Comando->fetchAll();
         echo "<Script>alert('". $_SESSION['cnpj'] ."')</script>";
         $RetornoJSON = json_encode($Res);
      }*/
    catch(PDOException $erro)
      {
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
      }
      try{
        $Comando = $conexao->prepare("SELECT * from cursos WHERE CNPJ = ?");
        $Comando->bindParam(1, $_SESSION['CNPJ']);
        $Comando->execute();
        $Res4 = $Comando->fetchAll();
      }
      catch(PDOException $error){
          echo $error;
      }
    ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="imagem/png" href="../img/UCEAE4.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/paginaInst.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/alt.js"></script>
  <script src="js/paginaInst.js"></script>
	<title><?php echo $Res[0]['nome_escola']; ?></title>
</head>
<body onload='consultaImg()'>


  <!-- --------------------- Barra de Navega????o --------------------- -->

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
          <a class="nav-link" href="../uceae-aluno/brazil.php">Mapa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sobreNos.php">Sobre N??s</a>
        </li>
      </ul>
      <form class="d-flex">
      	<div style="margin-right: 20px;">
          <strong><label id="nome_perfil"><?php echo $Res[0]['nome_escola']?></label></strong>
        	<button type="button" id="btn_alterarFoto" data-bs-toggle="modal" data-bs-target="#ModalSair"> <?php echo "<img src='".  $Res[0]['foto_perfil']  ."' id='ft_perfil'>"?></button>
    	  </div>
      </form>
    </div>
  </div>
  </nav>

  <!-- --------------------- Banner da Institui????o --------------------- -->

  <div class="image-upload" id="banner-foto">
  <label for="file-input" id="input-file">
  <form method="post" id="alter_banner" action='alterarBanner.php' enctype="multipart/form-data">
    <?php
        echo "<img src='".  $Res[0]['foto_banner']  ."' id='foto_banner' name='foto_banner'>"
      ?>
    
  </label>
  <input id="file-input" name='foto-banner' type="file" onchange='alterar_foto()'>
  <div id='resp1' class="btn btn-resp1"></div>
  
  </form>

  </div>
  <br><br><br>
  <section id="foto">
  <div class="image-upload2">
  <label for="file-input2" id="input-file">
  <form method='post' id='alter_perfil' action='alterarFoto.php' enctype="multipart/form-data">
    <label for="file-input2">
      <?php
          echo "<img src='".  $Res[0]['foto_perfil']  ."' id='foto_perfil'>"
        ?>
    </label>
    <div id='resp2' class="btn btn-resp2"></div>
      
    <input id="file-input2" name='foto_perfil' type="file" / onchange='alterar_foto2()'>
  
  </form>
  
</div>
<br><br><br>
  </section>
  <!-- --------------------- Botao de adicionar Propagandas --------------------- -->

  <br><br>
  <center>
  <div id="adicionar">
  <img src="img/add.png" id="inserir_img" >
  <h2 id="texto">Adicionar Propaganda</h2>
  </div>
</center>
<br><br><br><br>

<!-- --------------------- Formul??rio de Consulta --------------------- -->

<form name="frm_alt" method="POST" action='altInst.php' id="form_alt">
  <br>
  <div class="row">
    <div class="col">
      <label>Nome Institui????o</label><br>
      <input type="text" class="form-control" required id="txt_nomeInst" name="txt_nomeInst" placeholder="<?php echo $Res[0]['nome_escola']; ?>">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>CNPJ</label><br>
      <input type="text" class="form-control" required id="txt_cnpj" name="txt_cnpj" onchange="validarCNPJ()" onfocus="ativaMascaras()" maxlength="18" placeholder="<?php echo $Res[0]['CNPJ']; ?>">
      <h3 id="div_cnpj"></h3>
    </div>
    <div class="col">
      <label>Cep</label><br>
      <input type="text" class="form-control" required id="txt_cep" name="txt_cep" onfocus="ativaMascaras()" maxlength="9" placeholder="<?php echo $Res[0]['cep_escola']; ?>">
    </div>
    <div class="col">
      <label>Mensalidade</label><br>
      <input type="text" class="form-control" required id="txt_mensalidade" id="txt_mensalidade" name="txt_mensalidade" placeholder="<?php echo $Res[0]['mensalidade']; ?>">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Email</label><br>
      <input type="text" class="form-control" required id="txt_email" name="txt_email" placeholder="<?php echo $Res[0]['email_escola']; ?>">
    </div>
    <div class="col">
      <label>Telefone</label><br>
      <input type="text" class="form-control" required id="txt_telefone" name="txt_telefone" onfocus="ativaMascaras()" maxlength="14" placeholder="<?php echo $Res[0]['telefone_escola']; ?>">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label>Rua</label><br>
      <input type="text" class="form-control" required id="txt_rua" name="txt_rua" placeholder="<?php echo $Res[0]['rua_escola']; ?>">
    </div>
    <div class="col">
      <label>Bairro</label><br>
      <input type="text" class="form-control" required id="txt_bairro" name="txt_bairro" placeholder="<?php echo $Res[0]['bairro_escola']; ?>">
    </div>
    <div class="col">
      <label>Cidade</label><br>
      <input type="text" class="form-control" required id="txt_cidade"  name="txt_cidade" placeholder="<?php echo $Res[0]['cidade_escola']; ?>">
    </div>
      <div class="col">
      <label>UF</label><br>
      <input type="text" class="form-control" required id="txt_uf" name="txt_uf" placeholder="<?php echo $Res[0]['uf_escola']; ?>">
    </div>
  </div>
  <div id="nav-alterar">
    <input type='submit' id="btn_salvar" value='Alterar'>
  </div>
</form>

<br><br><br>

  <!-- --------------------- Cards Personalizados --------------------- -->
  <center>
  <div class="wrapper">
    <div class="card">
      <img src="img/lapis.png">
      <div class="info">
        <h1>Editar Informa????es</h1>
        <p>Adicione Informa????es para que seus visitantes saibam o que esperar!</p>
        <a href="#area_texto" class="btn">Veja Mais</a>
      </div>
    </div>
     <div class="card">
      <img src="img/estrela.png">
      <div class="info">
        <h1>Avalia????es</h1>
        <p>Veja o que outros usu??rios comentaram sobre sua institui????o!</p>
        <a href="#link-interno" class="btn">Veja Mais</a>
      </div>
    </div>
     <div class="card">
      <img src="img/adicionar-ficheiro.png">
      <div class="info">
        <h1>Adicionar Curso</h1>
        <p>Adicione cursos que estar??o vis??veis para seus visitantes!</p>
        <a href="#" class="btn">Veja Mais</a>
      </div>
    </div>
    </div>
  </center>
  <br><br><br>
  <br><br><br>

  <!-- --------------------- Informa????es da Institui????o --------------------- -->
      
  <hr width="50%" style="margin-left:25% ;">
      
      <div id="area_texto">
      <h1 class="titulos-paginaInst fonte-sensei">Edi????o de Informa????es</h1>
      <h3 class="fonte-sensei">Escreva um pouco sobre a institui????o!</h3>
      <br><br><br>
      <form action="addObjetivos.php" method="POST" id="frm_infoExtra" class="form-altera????o">
        <div id="area_desc_origem" class="meio">
          <label for="origem" class="lbl_textos">Origem</label>
          <br>
          <textarea name="origem" id="txt_desc_origem" rows="4" cols="50" maxlength="245"></textarea>
          <br><br>
        </div>
        <div id="area_desc_acess" class="meio">
          <label for="descricao" class="lbl_textos">Descri????o da Acessibilidade</label>
          <br>
          <textarea name="descricao" id="txt_desc_acessibilidade" rows="4" cols="50" maxlength="245"></textarea>
          <br><br>
        </div>
        <div id="area_info_extra" class="meio">
        <label for="extra" class="lbl_textos">Informa????es Extras</label>
          <br>
          <textarea name="extra" id="txt_info_extra" rows="4" cols="50" maxlength="245"></textarea>
          <br><br>
        </div>
        <div id="area_link" class="meio">
        <label for="link" class="lbl_textos">Link do Site Oficial</label>
          <br>
          <input type="text" name="link" id="txt_link" rows="4" cols="50" maxlength="245"></textarea>
          <br><br>
        </div>
        <div class="meio div-objetivos">
        <label for="lista-objetivos" class="titulos-paginaInst fonte-sensei h1-obj">Objetivos</label><br>
          <input type="text" name='obj' id="txt_objt1" class="objetivos" placeholder="1??: "><br><br>
          <input type="text" name='obj1' id="txt_objt2" class="objetivos" placeholder="2??: "><br><br>
          <input type="text" name='obj2' id="txt_objt3" class="objetivos" placeholder="3??: "><br><br>
          <input type="text" name='obj3' id="txt_objt4" class="objetivos" placeholder="4??: ">
        </div>
        <br><br><br>
        <button type="submit" class="btn-objetivos">Enviar</button>
        <br><br><br>
      </form>
        <div class="meio div-imagens">
          <h1 class="titulos-paginaInst fonte-sensei">Imagens da Institui????o</h1>
          <br><br><br>
          <form action="inserirImg.php" method="post" name="cadastroImg" id="frm_cadImg" enctype="multipart/form-data">
          <label for="imagens[]" class="label-imagens-input">
            <input type="file" name="imagensF[]" id='imagens[]' class="imagens-input" >
           Selecionar Imagem
          </label>
          <input type="button" id='btn_img' value="Enviar Imagem" class='btn-enviar-img' onclick="insertImg()">
        </form>
          <div id="imagens_inst"></div>
        </div>
      </div>
      </div>
      <br><br><br>
      <br><br><br>
  <!-- --------------------- Inserir Cursos --------------------- -->
      <div style="text-align: center;">
        <h1 class="titulos-paginaInst fonte-sensei" id='link-form-curso'>Inserir Cursos</h1>
        <br><br>
          <form action="addCurso.php" method="post" id="frm_inserirCurso" class="inserirCurso">
            <div class="linha-formulario">
              <div class="item-formulario">
                <label for="Titulo-curso" class="label-item">T??tulo</label>
                <br>
                <input type="text" name="Titulo-curso" id="txt_tituloCurso" class="input-form input-titulo-curso">
              </div>
              <div class="item-formulario">
                <label for="Modalidade-curso" class="label-item">Modalidade</label>
                <br>
                <select name="Modalidade-curso" id="slc_modalidadeCurso" class="input-form input-modalidade-curso">
                  <option value="Presencial"></option>
                  <option value="Presencial">Presencial</option>
                  <option value="Online">Online</option>
                  <option value="Hibrido">H??brido</option>
                </select>
              </div>
            </div>
            <br>
            <div class="linha-formulario">
              <div class="item-formulario">
                <label for="Periodo-curso" class="label-item">Per??odo</label>
                <br>
                <div class="area-checkbox">
                  <input type="checkbox" name="Periodo-Curso" id="cb_periodoCurso" value="M" class="cb-form">
                  <label for="Periodo-curso" class="label-item-cb">Manh??</label>
                  <br>
                  <input type="checkbox" name="Periodo-Curso" id="cb_periodoCurso" value="T" class="cb-form">
                  <label for="Periodo-curso" class="label-item-cb">Tarde</label>
                  <br>
                  <input type="checkbox" name="Periodo-Curso" id="cb_periodoCurso" value="N" class="cb-form">
                  <label for="Periodo-curso" class="label-item-cb">Noite</label>
                  <br>
                  <input type="checkbox" name="Periodo-Curso" id="cb_periodoCurso" value="I" class="cb-form">
                  <label for="Periodo-curso" class="label-item-cb">Integral</label>
                  <br>
                </div>
              </div>
              <div class="item-formulario item-desc">
                <label for="Desc-curso" class="label-item">Descri????o</label>
                <br>
                <textarea name="Desc-curso" id="txt_descCurso" class="desc-curso"></textarea>
              </div>
            </div>
            <div class="linha-formulario">
              <div class="item-formulario">
                <label for="Valor-curso" class="label-item">Pre??o</label>
                <br>
                <input type="number" name="Valor-curso" id="txt_vlrCurso" class="input-form input-preco" step="0.1">
              </div>
              <div class="item-formulario">
                <label for="Acessibilidade-curso" class="label-item">Acessibilidade</label>
                <br>
                <div class="area-radio">
                  <label for="" class="label-item-cb">Adaptado</label>
                  <input type="radio" name="Acessibilidade-curso" id="txt_adapCurso" value="S">
                  <label for="" class="label-item-cb">N??o Adaptado</label>
                  <input type="radio" name="Acessibilidade-curso" id="txt_adapCurso" value="N">
                </div>
              </div>
            </div>
            <div class="linha-formulario">
              <div class="item-formulario item-botao">
                <input type="submit" value="Cadastrar" class="btn-inserirCurso">
              </div>
            </div>
          </form>
        <br><br><br>
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
        echo "<h5>Per??odo Noturno</h5>";
      }
      elseif($Res4[$i]['periodo'] == "M"){
        echo "<h5>Per??odo Manh??</h5>";
      }
      elseif($Res4[$i]['periodo'] == "T"){
        echo "<h5>Per??odo Tarde</h5>";
      }
      else{
        echo "<h5>Per??odo Integral</h5>";
      }
      
      echo "<hr>";
      echo "<p>" . $Res4[$i]['descr'] ."</p>";
      echo "<hr>";
      if($Res4[$i]['acessibilidade'] == "S"){
        echo "<p>Curso Adaptado</p>";
      }
      else{
        echo "<p>Curso n??o Adaptado</p>";
      }
     
      echo "<p>Mensalidade: </p><p><b>R$: " . $Res4[$i]['preco']  . "</b></p>";
      echo "</div>";
    }
  }

  ?>
</div>
      
  <!-- --------------------- Coment??rios --------------------- -->
    <div style="text-align:center;">
      <h1 class="titulos-paginaInst fonte-sensei" id="link-interno">Coment??rios</h1>
      <?php
            try{
              $Comando = $conexao->prepare("SELECT * from comentarios WHERE CNPJ = ?");
              $Comando->bindParam(1, $_SESSION['CNPJ']);
              $Comando->execute();
              $Res1 = $Comando->fetchAll();
              $RetornoJSON1 = json_encode($Res1);
                        
            }
            catch(PDOException $error){
              echo $error;
            }
            if($RetornoJSON1  == "[]")
            {
                echo "<h2 id='retorno' class='h2 fonte-sensei'>Nenhum coment??rio ainda</h2><br><br>";
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
    </div>

   <!-- Modal -->

  <div class="modal fade" id="ModalSair" tabindex="-1" aria-labelledby="ModalLabelSair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title entrar-titulo w-100" id="ModalLabelSair"><?php echo $Res[0]['nome_escola']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="margin: 0 25% 0 25%;">
           <?php echo "<img src='".  $Res[0]['foto_perfil']  ."' id='ft_perfil_modal'>"?><br><br>
           <h3><?php echo $Res[0]['nome_escola']; ?></h3><br>
           <label><?php echo $Res[0]['email_escola']; ?></label>
        </div>
              <div class="modal-footer justify-content-center">
              <a href='../uceae-login/unlogin.php' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Sair</a>
              <a href='../uceae-instituicao/paginaInst.php' class='btn btn-warning' tabindex='-1' role='button' style='margin-right: 10px;' aria-disabled='true'>Sua p??gina!</a>
              </div>
      </div>
    </div>
  </div>

   <!-- --------------------- Vazio --------------------- -->
  <script>  
    function teste(){
      alert('passou')
    }
  </script>

</body>
</html>