<?php
    session_start();
    include '../conection.php';

    $comentario = $_POST['comentario'];
    $cnpj = $_POST['cnpj'];
    $titulo = $_POST['titulo'];


    try{
        $comando = $conexao->prepare("INSERT INTO comentarios(titulo, nome, conteudo, cnpj) VALUES (?,?,?,?)");
        $comando->bindParam(1, $titulo);
        $comando->bindParam(2, $_SESSION['Nome']);
        $comando->bindParam(3, $comentario);
        $comando->bindParam(4, $cnpj);

        $comando->execute();

        if($comando->rowCount() > 0){
            echo "funfou";
        }
        else{
            echo "fomos de berço";
        }
    }
    catch(PDOException $pdo){
        echo $pdo;
    }










?>