<?php
include 'conection.php';
    session_start();
    $titulo = $_POST['Titulo-curso'];
    $modalidade = $_POST['Modalidade-curso'];
    $periodo = $_POST['Periodo-Curso'];
    $desc = $_POST['Desc-curso'];
    $preco = $_POST['Valor-curso'];
    $acessibilidade = $_POST['Acessibilidade-curso'];

    try
    {
        $inserir = $conexao->prepare("insert into cursos (titulo, modalidade, periodo, descr, preco, acessibilidade, CNPJ) values (?,?,?,?,?,?,?)");
        $inserir->bindParam(1,$titulo);
        $inserir->bindParam(2,$modalidade);
        $inserir->bindParam(3,$periodo);
        $inserir->bindParam(4,$desc);
        $inserir->bindParam(5,$preco);
        $inserir->bindParam(6,$acessibilidade);
        $inserir->bindParam(7, $_SESSION['CNPJ']);


        $inserir->execute();
        if($inserir->rowCount() > 0)
        {
            $modalidade = "";
            $periodo = "";
            $desc = "";
            $preco = "";
            $acessibilidade = "";   
            $retorno = "funfou";
        }
// capturando um possível erro durando a realização do código
        else
        {
            $retorno = "Erro ao efetuar o cadastro dos cursos!";
        }
    }
// capturando uma possível excessão no código
    catch(PDOException $erro)
    {
        $retorno = "$erro: ".$erro->getMessage();
    }
    header("location:paginaInst.php")

?>