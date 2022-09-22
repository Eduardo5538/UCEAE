<?php
    session_start();
    include "conection.php";
        try
        {
            $Comando = $conexao->prepare("SELECT * from imagens_instituicao WHERE cnpj = ?");
            $Comando->bindParam(1, $SESSION['CNPJ']);
            $Comando->execute();
            $Res = $Comando->fetchAll();
            $RetornoJSON = json_encode($Res);
            echo $RetornoJSON;

        }

        catch(PDOException $erro){
            $RetornoJSON = "Erro: " . $erro->getMessage();
            echo $RetornoJSON;
        }
?>