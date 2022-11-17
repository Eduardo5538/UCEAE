<?php
include 'conection.php';
    session_start();
    $origem = $_POST['origem'];
    $descricao = $_POST['descricao'];
    $extra = $_POST['extra'];
    $link = $_POST['link'];
    $obj1 = $_POST['obj1'];
    $obj2 = $_POST['obj2'];
    $obj3 = $_POST['obj3'];
    $obj = $_POST['obj'];

    try
    {
        $inserir = $conexao->prepare("UPDATE escolas SET origem = ?, descAcess = ?, informacoes = ?, link = ? WHERE CNPJ = ?");
        $inserir->bindParam(1,$origem);
        $inserir->bindParam(2,$descricao);
        $inserir->bindParam(3,$extra);
        $inserir->bindParam(4,$link);
        $inserir->bindParam(5, $_SESSION['CNPJ']);


        $inserir->execute();


        $inserir = $conexao->prepare("INSERT INTO objetivos (obj1, obj2, obj3, obj4, cnpj) value (?,?,?,?,?)");
        $inserir->bindParam(1,$obj);
        $inserir->bindParam(2,$obj1);
        $inserir->bindParam(3,$obj2);
        $inserir->bindParam(4,$obj3);
        $inserir->bindParam(5, $_SESSION['CNPJ']);

        $inserir->execute();

        if($inserir->rowCount() > 0)
        {
            $descricao = "";
            $extra = "";
            $desc = "";
            $link = "";
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
        echo  "$erro: ".$erro->getMessage();
    }


?>