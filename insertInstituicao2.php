<?php
    include 'conection.php';

    $nome = $_POST['nome_inst'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];
    $senha= $_POST['senha'];
    $cep_inst = $_POST['cep'];
    $rua_inst = $_POST['rua'];
    $bairro_inst = $_POST['bairro'];
    $cidade_inst = $_POST['cidade'];
    $uf = $_POST['unid_fed'];
    $cnpj = $_POST['cnpj'];


    try
    {
        $inserir = $conexao->prepare("insert into escolas (nome_escola, cnpj, rua_escola, email_escola, cep_escola, cidade_escola, bairro_escola, uf_escola) values (?,?,?,?,?,?,?,?)");
        $inserir->bindParam(1,$nome);
        $inserir->bindParam(2,$cnpj);
        $inserir->bindParam(3,$rua_inst);
        $inserir->bindParam(4,$email);
        $inserir->bindParam(5,$cep_inst);
        $inserir->bindParam(6,$cidade_inst);
        $inserir->bindParam(7,$bairro_inst);
        $inserir->bindParam(8,$uf);



        $inserir->execute();
        if($inserir->rowCount() > 0)
        {
            $primeiro = "";
            $segundo = "";
            $email = "";
            $senha= "";
            $nascimento = "";
            $cep_inst = "";
            $rua_inst = "";
            $bairro_inst = "";
            $cidade_inst = "";
            $uf = "";

            $retorno = "passou";

        }
// capturando um possível erro durando a realização do código
        else
        {
            $retorno = "falhou";
        }
    }
// capturando uma possível excessão no código
    catch(PDOException $erro)
    {
        $retorno = "$erro: ".$erro->getMessage();
    }
    echo $retorno;

?>