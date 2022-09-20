<?php
    include "conection.php";
    $search = $_POST['busca'];
    try
    {
        if($search != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE ?");
            $Comando->execute(array('%' . $search. '%'));
            $Comando->execute();
            
            if($Comando->rowCount()>0){
                $resultado = json_encode($Comando->fetchAll());
             }
            else{
                $resultado = "deu ruim";
            }
        }
        else{
            $resultado = "NULO";
        }
    echo $resultado;
    }
    catch(PDOException $erro){
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
    }
?>