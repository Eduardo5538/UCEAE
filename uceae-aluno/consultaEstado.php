<?php
    include "conection.php";
    $estado = $_GET['estado'];
    try{
        $json = file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" . $estado . "/municipios");
        echo $json;
    }
    catch(PDOException $erro){
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
    }
?>