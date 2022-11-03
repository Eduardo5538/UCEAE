<?php
    session_start();
    include "../conection.php";

    try
    {
        $Comando = $conexao->prepare("SELECT * FROM tab_alunos WHERE cpf_aluno = ?");

        $Comando->bindParam(1, $_SESSION['CPF']);

        $Comando->execute();
        $Res = $Comando->fetchAll();

        $nome = $Res[0]['nome_aluno'];
        $nasc = $Res[0]['datanasc_aluno'];
        $deficiencia = $Res[0]['deficiencia'];
        $email = $Res[0]['email'];
        $telefone = $Res[0]['telefone_aluno'];
        $cpf = $Res[0]["CPF_aluno"];
        $cep = $Res[0]['cep_aluno'];
        $rua = $Res[0]['rua_aluno'];
        $bairro = $Res[0]['bairro_aluno'];
        $cidade = $Res[0]['cidade_aluno'];
        $uf = $Res[0]['uf_aluno'];


        $Comando = $conexao->prepare("SELECT * FROM login WHERE cpf = ?");

        $Comando->bindParam(1, $_SESSION['CPF']);

        $Comando->execute();
        $Res1 = $Comando->fetchAll();

        $senha = $Res1[0]['senha'];
        
    }
    catch(PDOException $PDO){
        echo $PDO;
    }

    if(isset($_POST['Nome']) != false){
        $nome = $_POST['Nome'];
    }
    if(isset($_POST['nasc'])!= false){
        $nasc = $_POST['nasc'];
    }

    if(isset($_POST['nomeDef'])!= false){
        $deficiencia = $_POST['nomeDef'];
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
            echo $_SESSION['CPF'];
        }
    }
    catch(PDOException $penis){
        echo $penis;
    }



?>