<?php
    include "conection.php";
    session_start();
    $ft_perfil = $_FILES["foto_perfil"];
    if(isset($_FILES["foto_perfil"])){

        if (!empty($ft_perfil["name"])){
            if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico)$/", $ft_perfil["type"]))
            {
                echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
                exit;
            }
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico){1}$/i", $ft_perfil["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img = "../uceae-login/img/".$nome_img;
  		move_uploaded_file($ft_perfil["tmp_name"], $caminho_img);
  	    }
    }
  	
        try
        {
            $Consulta = $conexao->prepare("SELECT * FROM escolas WHERE cnpj = ?");
            $Consulta->bindParam(1, $_SESSION['CNPJ']);
            $Consulta->execute();
            $Res = $Consulta->fetchAll();

            unlink($Res[0]['foto_perfil']);

            $Comando = $conexao->prepare("UPDATE escolas
            SET foto_perfil = ?
            WHERE cnpj = ?");
            $Comando->bindParam(1, $caminho_img);
            $Comando->bindParam(2, $_SESSION['CNPJ']);
            $Comando->execute();
            
          
            if($Comando->rowCount() > 0){
                echo "<script>window.location.href = '../uceae-instituicao/paginaInst.php'</script>";
            }
            else{
                echo "<script>window.location.href = '../uceae-instituicao/paginaInst.php'</script>";
            }
        }

        catch(PDOException $erro){
            $RetornoJSON = "Erro: " . $erro->getMessage();
            echo $RetornoJSON;
        }
?>