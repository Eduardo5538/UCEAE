<?php
    include "conection.php";
    $txt_nomeInst = $_POST['txt_nomeInst'];
    $txt_cnpj = $_POST['txt_cnpj'];
    $txt_cep = $_POST['txt_cep'];
    $txt_mensalidade = $_POST['txt_mensalidade'];
    $txt_email = $_POST['txt_email'];
    $txt_telefone = $_POST['txt_telefone'];
    $txt_rua = $_POST['txt_rua'];
    $txt_bairro = $_POST['txt_bairro'];
    $txt_cidade = $_POST['txt_cidade'];
    $txt_uf = $_POST['txt_uf'];
    
    try{
        $alterar = $conexao->prepare("UPDATE escolas SET nome_escola =  ?, cnpj = ?, cep_escola = ?,email_escola = ?,telefone_escola = ?, rua_escola = ?,bairro_escola = ?, cidade_escola = ?,uf_escola = ? WHERE cod_escola = 4;");
        $alterar->bindParam(1,$txt_nomeInst);
        $alterar->bindParam(2,$txt_cnpj);
        $alterar->bindParam(3,$txt_cep);
        $alterar->bindParam(4,$txt_email);
        $alterar->bindParam(5,$txt_telefone);
        $alterar->bindParam(6,$txt_rua);
        $alterar->bindParam(7,$txt_bairro);
        $alterar->bindParam(8,$txt_cidade);
        $alterar->bindParam(9,$uf_escola);


        $alterar->execute();
        if($alterar->rowCount() > 0)
        {
            $txt_nomeInst = "";
            $txt_cnpj = "";
            $txt_cep = "";
            $txt_mensalidade = "";
            $txt_email = "";
            $txt_telefone = "";
            $txt_rua = "";
            $txt_bairro = "";
            $txt_cidade = "";
            $txt_uf = "";
            $retorno = "Alterado com sucesso";
        }
// capturando um possível erro durando a realização do código
        else
        {
            $retorno = "Erro ao efetuar a alteração da sua escola!";
        }
    }
// capturando uma possível excessão no código
    catch(PDOException $erro)
    {
        $retorno = "$erro: ".$erro->getMessage();
    }
    echo $retorno;

?>


