<?php
    include 'conection.php';

    $nome = $_POST['nome_inst'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];
    $senha= $_POST['senha'];
    $cep_inst = $_POST['cep'];
    $rua_inst = $_POST['rua'];
    $bairro_inst = $_POST['bairro'];
    $cidade_inst = $_POST['cidade'];
    $uf = $_POST['unid_fed'];
    $cnpj = $_POST['cnpj'];
    $ft_perfil = $_FILES["foto_perfil"];
    $ft_banner = $_FILES["foto_banner"];
    $ft_prop = $_FILES["foto_propaganda"];
    $comprovante = $_FILES["comprovante"];
    $mensalidade = $_POST['mensalidade'];
    $desc = $_POST['desc'];
    $acessibilidade = $_POST['acessibilidade'];
    $modalidade = $_POST['modalidade'];
    $acessibilidade_pauzinho = "";

    if($acessibilidade == "SIM"){
        $acessibilidade_pauzinho = "S";
    }
    if($acessibilidade == "NAO"){
        $acessibilidade_pauzinho = "N";
    }

  	if (!empty($ft_perfil["name"]))
  	{
  		if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico|webp)$/", $ft_perfil["type"]))
  		{
  			echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
  			exit;
  		}
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico|webp){1}$/i", $ft_perfil["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img = "../uceae-login/img/".$nome_img;
  		move_uploaded_file($ft_perfil["tmp_name"], $caminho_img);
  	}
      if (!empty($ft_prop["name"]))
  	{
  		if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico|webp)$/", $ft_prop["type"]))
  		{
  			echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
  			exit;
  		}
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico|webp){1}$/i", $ft_prop["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img2 = "../uceae-login/img/".$nome_img;
  		move_uploaded_file($ft_prop["tmp_name"], $caminho_img2);
  	}
      if (!empty($ft_banner["name"]))
  	{
  		if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico|webp)$/", $ft_banner["type"]))
  		{
  			echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
  			exit;
  		}
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico|webp){1}$/i", $ft_banner["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img3 = "../uceae-login/img/".$nome_img;
  		move_uploaded_file($ft_banner["tmp_name"], $caminho_img3);
  	}

      if (!empty($comprovante["name"]))
  	{   
  		preg_match("/\.(pdf|docx|pptx|jpg|png|webp){1}$/i", $comprovante["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_arq = "../uceae-login/docs/".$nome_img;
  		move_uploaded_file($comprovante["tmp_name"], $caminho_arq);
  	}



    try
    {
        $inserir = $conexao->prepare("insert into escolas (nome_escola, cnpj, rua_escola, email_escola, cep_escola, cidade_escola, bairro_escola, uf_escola, foto_perfil, foto_banner, foto_prop, telefone_escola, comprovante, mensalidade, acessibilidade, modalidade, acessibilidade_texto) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $inserir->bindParam(1,$nome);
        $inserir->bindParam(2,$cnpj);
        $inserir->bindParam(3,$rua_inst);
        $inserir->bindParam(4,$email);
        $inserir->bindParam(5,$cep_inst);
        $inserir->bindParam(6,$cidade_inst);
        $inserir->bindParam(7,$bairro_inst);
        $inserir->bindParam(8,$uf);
        $inserir->bindParam(9,$caminho_img);
        $inserir->bindParam(10,$caminho_img3);
        $inserir->bindParam(11,$caminho_img2);
        $inserir->bindParam(12,$telefone);
        $inserir->bindParam(13,$caminho_arq);
        $inserir->bindParam(14,$mensalidade);
        $inserir->bindParam(15,$acessibilidade_pauzinho);
        $inserir->bindParam(16, $modalidade);
        $inserir->bindParam(17, $desc);



        $inserir->execute();

        $inserir = $conexao->prepare("insert into login(login, senha, cnpj, nome, imagem) values (?,?,?,?,?)");
        $inserir->bindParam(1, $email);
        $inserir->bindParam(2, $senha);
        $inserir->bindParam(3,$cnpj);
        $inserir->bindParam(4,$nome);
        $inserir->bindParam(5,$caminho_img);
        $inserir->execute();

        if($inserir->rowCount() > 0)
        {
            $nome = "";
            $cnpj = "";
            $email = "";
            $senha= "";
            $nascimento = "";
            $cep_inst = "";
            $rua_inst = "";
            $bairro_inst = "";
            $cidade_inst = "";
            $uf = "";
            $ft_perfil = "";
            $ft_banner = "";
            $ft_prop = "";

            $retorno = "<script>
            location.href = '../uceae-instituicao/paginaInst.php'</script>";

        }
// capturando um possível erro durando a realização do código
        else
        {
            $retorno = "falhou";
        }
    }
// capturando uma possível excessão no código
    catch(PDOException $erro)
    {
        $retorno = "$erro: ".$erro->getMessage();
    }
    echo $retorno;

?>