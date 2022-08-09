<?php
    include 'conection.php';

    $email_aluno = $_POST['email'];
    $senha_aluno = $_POST['senha'];
    $nome_aluno = $_POST['nome'];
    $cpf_aluno = $_POST['cpf'];
    $sexo_aluno = $_POST['sexo'];
    $data_nasc_aluno = $_POST['nasc'];
    $cep_aluno = $_POST['cep'];
    $rua_aluno = $_POST['rua'];
    $bairro_aluno = $_POST['bairro'];
    $cidade_aluno = $_POST['cidade'];
    $uf_aluno = $_POST['UF'];

    try
    {
        $inserir = $conexao->prepare("insert into tab_alunos (cpf_aluno, nome_aluno, sexo_aluno, email, datanasc_aluno, cep_aluno, rua_aluno, bairro_aluno, cidade_aluno, uf_aluno) values (?,?,?,?,?,?,?,?,?,?)");
        $inserir->bindParam(1,$cpf_aluno);
        $inserir->bindParam(2,$nome_aluno);
        $inserir->bindParam(3,$sexo_aluno);
        $inserir->bindParam(4,$email_aluno);
        $inserir->bindParam(5,$data_nasc_aluno);
        $inserir->bindParam(6,$cep_aluno);
        $inserir->bindParam(7,$rua_aluno);
        $inserir->bindParam(8,$bairro_aluno);
        $inserir->bindParam(9,$cidade_aluno);
        $inserir->bindParam(10,$uf_aluno);


        $inserir->execute();
        if($inserir->rowCount() > 0)
        {
            $nome_aluno = "";
            $email_aluno = "";
            $cpf_aluno = "";
            $sexo_aluno = "";
            $data_nasc_aluno = "";
            $uf_aluno = "";
            $cep_aluno = "";
            $cidade_aluno = "";
            $bairro_aluno = "";
            $rua_aluno = "";

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