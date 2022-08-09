<?php
include 'conection.php';
    $CNPJ = $_POST['cnpj'];
    $nome_escola = $_POST['nome_escola'];
    $endereco_escola = $_POST['endereco_escola'];
    $acessibilidade = $_POST['acessibilidade'];
    $telefone_escola = $_POST['elefone_escola'];
    $imagem_escola = $_POST['imagem_escola'];
    $uf_escola = $_POST['uf_escola'];
    $cep_escola = $_POST['cep_escola'];
    $cidade_escola = $_POST['cidade_escola'];

    try
    {
        $inserir = $conexao->prepare("insert into escolas (CNPJ, nome_escola, endereco_escola, acessibilidade, telefone_escola, imagem_escola, uf_escola, cep_escola, cidade_escola) values (?,?,?,?,?,?,?,?,?)");
        $inserir->bindParam(1,$CNPJ);
        $inserir->bindParam(2,$nome_escola);
        $inserir->bindParam(3,$endereco_escola);
        $inserir->bindParam(4,$acessibilidade);
        $inserir->bindParam(5,$telefone_escola);
        $inserir->bindParam(6,$imagem_escola);
        $inserir->bindParam(7,$uf_escola);
        $inserir->bindParam(8,$cep_escola);
        $inserir->bindParam(9,$cidade_escola);


        $inserir->execute();
        if($inserir->rowCount() > 0)
        {
            $nome_escola = "";
            $endereco_escola = "";
            $acessibilidade = "";
            $telefone_escola = "";
            $imagem_escola = "";
            $uf_escola = "";
            $cep_escola = "";
            $cidade_escola = "";

        }
// capturando um possível erro durando a realização do código
        else
        {
            $retorno = "Erro ao efetuar o cadastro das escolas!";
        }
    }
// capturando uma possível excessão no código
    catch(PDOException $erro)
    {
        $retorno = "$erro: ".$erro->getMessage();
    }
    echo $retorno;

?>