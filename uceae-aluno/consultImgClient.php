<?php
    session_start();
    include "conection.php";
    $CNPJ = $_POST['cnpj'];
        try
        {
            $Comando = $conexao->prepare("SELECT * from imagens_instituicao WHERE cnpj = ?");
            $Comando->bindParam(1, $CNPJ);
            $Comando->execute();
            $Res = $Comando->fetchAll();
            $RetornoJSON = json_encode($Res);
            echo $CNPJ;

        }

        catch(PDOException $erro){
            $RetornoJSON = "Erro: " . $erro->getMessage();
            echo $RetornoJSON;
        }
?>