<?php
    include "conection.php";
    $searchNome = $_POST['searchNome'];
    $searchCidade = $_POST['searchCidade'];
    $searchUF = $_POST['searchUF'];
    $acessibilidade = $_POST['acessibilidade'];

        try
        {
                $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE '%" . $searchNome . "%'");
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