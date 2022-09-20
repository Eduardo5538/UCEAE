<?php
    session_start();
    include '../conection.php';

    $comentario = $_POST['comentario'];
    $cnpj = $_POST['cnpj'];
    $titulo = $_POST['titulo'];
    $nota = $_POST['nota'];
    $horario = date("Y-m-d");


    try{
        $comando = $conexao->prepare("INSERT INTO comentarios(titulo, nome, conteudo, cnpj, nota, data) VALUES (?,?,?,?,?,?)");
        $comando->bindParam(1, $titulo);
        $comando->bindParam(2, $_SESSION['Nome']);
        $comando->bindParam(3, $comentario);
        $comando->bindParam(4, $cnpj);
        $comando->bindParam(5, $nota);
        $comando->bindParam(6, $horario);

        $comando->execute();

        if($comando->rowCount() > 0){
            echo "Comentário inserido";
        }
        else{
            echo "Erro ao inserir o comentário";
        }
    }
    catch(PDOException $pdo){
        echo $pdo;
    }










?>