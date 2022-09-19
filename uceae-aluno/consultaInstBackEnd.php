<?php
    include "conection.php";
    $search = $_POST['busca'];

    try
    {
        $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE '%" . '?' . "%'");
        $Comando->bindParam(1,$search);
        $Comando->execute();
        
        if($select->rowCount()>0){
            $resultado = json_encode($Comando->fetchAll());
         }
        else{
            $resultado = "deu ruim";
        }

    }
    catch(PDOException $erro){
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
    }
?>