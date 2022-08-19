<?php
     include 'conection.php';
     $login = $_POST['login'];
     $senha = $_POST['senha'];
     try{
         $Comando = $conexao->prepare("SELECT * from login WHERE login = ? and senha = ?");
         $Comando->bindParam(1, $login);
         $Comando->bindParam(2, $senha);
         $Comando->execute();
         $Res = $Comando->fetchAll();
         $RetornoJSON = json_encode($Res);
         if($Comando->rowCount() > 0){
            echo $RetornoJSON;
         }
         else{
            echo "Registro Não Encontrado";
         }
     }
     catch(PDOException $erro){
         $RetornoJSON = "Erro: " . $erro->getMessage();
         echo $RetornoJSON;
     }
     

?>