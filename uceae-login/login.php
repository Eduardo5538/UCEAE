<?php
    session_start();
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
            echo $Res[0]['CNPJ'];
            if($Res[0]['CNPJ'] != null){
                $_SESSION['CNPJ'] = $Res[0]['CNPJ'];
                echo (string) $_SESSION['CNPJ'];
            }
            else{
                $_SESSION['CPF'] = $Res[0]['CPF'];
                echo (string) $_SESSION['CPF'];
            }
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