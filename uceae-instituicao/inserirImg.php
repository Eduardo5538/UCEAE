<?php
    session_start();
    include "conection.php";
    $cnpj = $SESSION['CNPJ'];
    $imagens = $_FILES['imagens'];
    if(isset($_FILES["imagens"])){
        echo "<script>alert('cheguei')</script> ";

        if (!empty($imagens["name"])){
            if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico)$/", $imagens["type"]))
            {
                echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
                exit;
            }
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico){1}$/i", $imagens["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img = "../uceae-login/img/".$nome_img;
  		move_uploaded_file($imagens["tmp_name"], $caminho_img);
  	    }
    }
        try
        {
            $Comando = $conexao->prepare("insert into imagens_instituicao (cnpj, imagem) values (?,?)");
            $Comando->bindParam(1, $SESSION['CNPJ']);
            $Comando->bindParam(2, $caminho_img);
            $Comando->execute();
        }

        catch(PDOException $erro){
            $RetornoJSON = "Erro: " . $erro->getMessage();
            echo $RetornoJSON;
        }
?>