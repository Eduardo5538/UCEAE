<?php
    session_start();
    include "../conection.php";


    if(isset($_POST['Nome']) != false){
        $nome = $_POST['Nome'];
    }
    if(isset($_POST['nasc'])!= false){
        $nasc = $_POST['nasc'];
    }

    if(isset($_POST['desc'])!= false){
        $deficiencia = $_POST['desc'];
    }

    if(isset($_POST['Email'])!= false){
        $email = $_POST['Email'];
    }

    if(isset($_POST['Telefone'])!= false){
        $telefone = $_POST['Telefone'];
    }
    
    if(isset($_POST['CPF'])!= false){
        $cpf = $_POST['CPF'];
    }

    if(isset($_POST['Senha'])!= false){
        $senha  = $_POST['Senha'];
    }

    if(isset($_POST['CEP'])!= false){
        $cep = $_POST['CEP'];
    }

    if(isset($_POST['UF'])!= false){
        $uf = $_POST['UF'];
    }

    if(isset($_POST['Rua'])!= false){
        $rua = $_POST['Rua'];
    }

    if(isset($_POST['Bairro'])!= false){
        $bairro = $_POST['Bairro'];
    }

    if(isset($_POST['Cidade'])!= false){
        $cidade = $_POST['Cidade'];
    }



    try{
        $Comando = $conexao->prepare("UPDATE tab_alunos SET nome_aluno = ?, datanasc_aluno = ?, deficiencia = ?,Email = ?, telefone_Aluno = ?, CPF_aluno = ?, cep_aluno = ?, UF_Aluno = ?, Rua_aluno = ?, bairro_aluno = ?, cidade_aluno = ?  WHERE cpf_aluno = ?");
        $Comando->bindParam(1, $nome);
        $Comando->bindParam(2, $nasc);
        $Comando->bindParam(3, $deficiencia);
        $Comando->bindParam(4, $email);
        $Comando->bindParam(5, $telefone);
        $Comando->bindParam(6, $cpf);
        $Comando->bindParam(7, $cep);
        $Comando->bindParam(8, $UF);
        $Comando->bindParam(9, $rua);
        $Comando->bindParam(10, $bairro);
        $Comando->bindParam(11, $cidade);
        $Comando->bindParam(12, $_SESSION['CPF']);


        $Comando->execute();


        $Comando = $conexao->prepare("UPDATE login SET login = ?, senha = ?, CPF = ? WHERE CPF = ?");
        $Comando->bindParam(1, $email);
        $Comando->bindParam(2, $senha);
        $Comando->bindParam(3, $cpf);
        $Comando->bindParam(4, $_SESSION['CPF']);

        $Comando->execute();


        
        $_SESSION['CPF'] = $cpf;


        

        if($Comando->rowCount() > 0){
            header("location: paginaAluno.php");
        }
    }
    catch(PDOException $penis){
        echo $penis;
    }



?>