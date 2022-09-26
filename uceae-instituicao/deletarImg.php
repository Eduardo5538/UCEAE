<?php
    include "conection.php";
    $cod_imagem = $_GET['cod_imagem'];
    try
    {
        $Comando = $conexao->prepare("SELECT * FROM imagens_instituicao WHERE cod_imagem = ?");
        $Comando->bindParam(1, $cod_imagem);
        $Comando->execute();
        $res = $Comando->fetchAll();

        $caminho = $res[0]['imagem'];
        unlink($caminho);


        include "conection.php";
        $Comando = $conexao->prepare("DELETE FROM imagens_instituicao WHERE cod_imagem = ?");
        $Comando->bindParam(1, $cod_imagem);
        $Comando->execute();

        if($Comando->rowCount() > 0){
            header('Location: paginaInst.php');
        }
    }

    catch(PDOException $erro){
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
    }



?>