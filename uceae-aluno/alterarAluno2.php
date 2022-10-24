<?php
    session_start();
    include "../conection.php";
    $Email = $_POST['Email'];
    $Telefone = $_POST['Telefone'];
    $CPF = $_POST['CPF'];
    $Senha = $_POST['Senha'];

    try{
        echo $_SESSION['CPF'];
        $Comando = $conexao->prepare("UPDATE tab_alunos SET Email = ?, telefone_Aluno = ?, CPF_aluno = ? WHERE cpf_aluno = ?");
        $Comando->bindParam(1, $Email);
        $Comando->bindParam(2, $Telefone);
        $Comando->bindParam(3, $CPF);
        $Comando->bindParam(4, $_SESSION['CPF']);



        $Comando->execute();
    

        $_SESSION['CPF'] = $CPF; 


        if($Comando->rowCount() > 0){
            echo "<script> Alert('funfou')
            location.replace('paginaAluno.php')</script>";
        }
    }
    catch(PDOException $penis){
        echo $penis;
    }



?>