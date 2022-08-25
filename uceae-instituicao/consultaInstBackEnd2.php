<?php
    include "conection.php";
        try
        {
            $Comando = $conexao->prepare("SELECT * from escolas WHERE cnpj = 12345");
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