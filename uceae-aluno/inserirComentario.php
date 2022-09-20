<?php
    session_start();
    include '../conection.php';

    if(isset($_POST['comentario']) && isset($_POST['titulo']))
    {
        $comentario = $_POST['comentario'];
        $titulo = $_POST['titulo'];
        $cnpj = $_POST['cnpj'];
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
    }
    else{
        echo 'Digite os Valores!';
    }
 


    










?>