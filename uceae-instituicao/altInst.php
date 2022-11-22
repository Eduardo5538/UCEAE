<?php
    session_start();
    include "../conection.php";

    $nome = $_POST['txt_nomeInst'];
    $rua = $_POST['txt_rua'];
    $mensalidade = $_POST['txt_mensalidade'];
    $email = $_POST['txt_email'];
    $bairro = $_POST['txt_bairro'];
    $CNPJ = $_POST['txt_cnpj'];
    $telefone = $_POST['txt_telefone'];
    $cidade = $_POST['txt_cidade']; 
    $uf = $_POST['txt_uf'];
    $cep = $_POST['txt_cep'];



    try{
        $Comando = $conexao->prepare("UPDATE escolas SET nome_escola = ?, rua_escola = ?, mensalidade = ?,email_escola = ?, bairro_escola = ?, CNPJ = ?, telefone_escola = ?, cidade_escola = ?, uf_escola = ?, cep_escola = ?  WHERE CNPJ = ?");
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
        $Comando->bindParam(2, $CNPJ);
        $Comando->bindParam(3, $_SESSION['CNPJ']);

        $_SESSION['CNPJ'] = $CNPJ;

        $Comando->execute();


        

        if($Comando->rowCount() > 0){
            header('Location: paginaInst.php');
        }
    }
    catch(PDOException $pdo){
        echo $pdo;
    }



?>