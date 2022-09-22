<?php
    session_start();
    include "conection.php";
    $cnpj = $_SESSION['CNPJ'];
    $imagens = $_FILES['imagensF'];


    if(isset($_FILES["imagensF"])){

        if (isset($imagens["name"][0])){
            if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico)$/", $imagens["type"][0]))
            {
                echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
                exit;
            }
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico){1}$/i", $imagens["name"][0],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img = "../uceae-login/img/".$nome_img;
  		move_uploaded_file($imagens["tmp_name"][0], $caminho_img);
  	    }
    }
        try
        {
            $Comando = $conexao->prepare("insert into imagens_instituicao (cnpj, imagem) values (?,?)");
            $Comando->bindParam(1, $_SESSION['CNPJ']);
            $Comando->bindParam(2, $caminho_img);
            $Comando->execute();

            if($Comando->rowCount() > 0){
                echo "funfou";
            }
        }

        catch(PDOException $erro){
            $RetornoJSON = "Erro: " . $erro->getMessage();
            echo $RetornoJSON;
        }
?>