<?php
    session_start();
    include "../conection.php";

    $nome = $_POST[''];
    $rua = $_POST[''];
    $mensalidade = $_POST[''];
    $email = $_POST[''];
    $bairro = $_POST[''];
    $CNPJ = $_POST[''];
    $telefone = $_POST[''];
    $cidade = $_POST['']; 
    $uf = $_POST[''];
    $cep = $_POST[''];



    try{
        $Comando = $conexao->prepare("UPDATE escolas SET nome_escola = ?, rua_escola = ?, mensalidade = ?,Email = ?, bairro_escola = ?, CNPJ = ?, telefone_escola = ?, cidade_escola = ?, uf_escola = ?, cep_escola = ?  WHERE CNPJ = ?");
        $Comando->bindParam(1, $nome);
        $Comando->bindParam(2, $rua);
        $Comando->bindParam(3, $mensalidade);
        $Comando->bindParam(4, $email);
        $Comando->bindParam(5, $bairro);
        $Comando->bindParam(6, $CNPJ);
        $Comando->bindParam(7, $telefone);
        $Comando->bindParam(8, $cidade);
        $Comando->bindParam(9, $uf);
        $Comando->bindParam(10, $cep);
        $Comando->bindParam(11, $_SESSION['CNPJ']);


        $Comando->execute();


        $Comando = $conexao->prepare("UPDATE login SET login = ?, CNPJ = ? WHERE CNPJ = ?");
        $Comando->bindParam(1, $email);
        $Comando->bindParam(3, $CNPJ);
        $Comando->bindParam(4, $_SESSION['CNPJ']);

        $_SESSION['CNPJ'] = $CNPJ;

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