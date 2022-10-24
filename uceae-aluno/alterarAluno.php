<?php
    session_start();
    include "../conection.php";
    $nome = $_POST['Nome'];
    $nasc = $_POST['nasc'];
    $def = $_POST['def'];
    $nomeDef = $_POST['nomeDef'];
    $descDef = $_POST['descDef'];

    $deficiencia = $def . " " . $nomeDef . " " . $descDef;

    try{
        echo $_SESSION['CPF'];
        $Comando = $conexao->prepare("UPDATE tab_alunos SET nome_aluno = ?, datanasc_aluno = ?, deficiencia = ? WHERE cpf_aluno = ?");
        $Comando->bindParam(1, $nome);
        $Comando->bindParam(2, $nasc);
        $Comando->bindParam(3, $deficiencia);
        $Comando->bindParam(4, $_SESSION['CPF']);

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