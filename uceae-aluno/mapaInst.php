<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
    include 'conection.php';
    $UF = $_GET['uf'];
    try{
        $Comando = $conexao->prepare("SELECT * from escolas WHERE uf_escola = ?");
        $Comando->bindParam(1, $UF);
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