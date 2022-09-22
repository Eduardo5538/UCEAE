<?php
    $cod_imagem = $_GET['cod_imagem'];
    try
    {
        include "conection.php";
        $Comando = $conexao->prepare("DELETE FROM imagens_instituicao WHERE cod_imagem = ?");
        $Comando->bindParam(1, $cod_imagem);
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