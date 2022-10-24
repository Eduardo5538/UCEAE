<?php
    session_start();
    include "../conection.php";
    $cep = $_POST['CEP'];
    $UF = $_POST['UF'];
    $Rua = $_POST['Rua'];
    $Bairro = $_POST['Bairro'];
    $Cidade = $_POST['Cidade'];

    try{
        $Comando = $conexao->prepare("UPDATE tab_alunos SET cep_aluno = ?, UF_Aluno = ?, Rua_aluno = ?, bairro_aluno = ?, cidade_aluno = ? WHERE CPF_aluno = ?");
        $Comando->bindParam(1, $cep);
        $Comando->bindParam(2, $UF);
        $Comando->bindParam(3, $Rua);
        $Comando->bindParam(4, $Bairro);
        $Comando->bindParam(5, $Cidade);

        $Comando->bindParam(6, $_SESSION['CPF']);



        $Comando->execute();
    


        if($Comando->rowCount() > 0){
            echo "<script> Alert('funfou')
            location.replace('paginaAluno.php')</script>";
        }
    }
    catch(PDOException $penis){
        echo $penis;
    }



?>