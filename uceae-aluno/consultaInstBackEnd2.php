<?php
    include "conection.php";
    $search = $_POST['busca'];
    $estado = $_POST['estado'];
    if(isset($_POST['cidade'])){
        $cidade = $_POST['cidade'];
    }
    else{
        $cidade = null;
    }
    if(isset($_POST['modalidade'])){
        $modalidade = $_POST['modalidade'];
    }
    else{
        $modalidade = null;
    }
    if(isset($_POST['acessibilidade'])){
        $acessibilidade = $_POST['acessibilidade'];
    }
    else{
        $acessibilidade = null;
    }
    $preco = explode(",", $_POST['preco']);

    try
    {
        $Retorno = "";

        //vazio
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade == null
        && $acessibilidade == null && $preco[0] == 0 && $preco[1] == 10000){
            $Retorno = 'vazio';
        }

        //só a barra de busca com a mensalidade
        if($search != null && $estado == 'AC' && $cidade == null && $modalidade == null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
        }

        //busca com barra de busca, cidade, estado e mensalidade
        if($search != null && $estado != null && $cidade != null && $modalidade == null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
             AND cidade_escola LIKE :cidade AND uf_escola = :uf AND mensalidade BETWEEN :valor1 AND :valor2");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
        }

        //busca com barra de busca, cidade, estado, modalidade e mensalidade
        if($search != null && $estado != null && $cidade != null && $modalidade != null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2 AND cidade_escola LIKE :cidade AND uf_escola = :uf
            AND modalidade = :modalidade");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':modalidade', $modalidade);
        }

        //busca com barra de busca, cidade, estado, modalidade, acessibilidade e mensalidade
        if($search != null && $estado != null && $cidade != null && $modalidade != null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2 AND cidade_escola LIKE :cidade AND uf_escola = :uf
            AND modalidade = :modalidade AND acessibilidade = :acessibilidade");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':modalidade', $modalidade);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //só cidade e estado
        if($search == null && $estado != null && $cidade != null && $modalidade == null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2
            AND cidade_escola LIKE :cidade AND uf_escola = :uf");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
        }

        //só modalidade
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade != null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2
            AND modalidade = :modalidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':modalidade', $modalidade);
        }

        //só acessibilidade
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade == null
        && $acessibilidade != null && $preco[0] == 0 && $preco[1] == 10000){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1
            AND :valor2 AND acessibilidade = :acessibilidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //só mensalidade
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade == null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1
            AND :valor2");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
        }

        //só estado e cidade com modalidade
        if($search == null && $estado != null && $cidade != null && $modalidade != null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 
            AND :valor2 AND cidade_escola LIKE :cidade AND uf_escola = :uf
            AND modalidade = :modalidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':modalidade', $modalidade);
        }

        //só estado e cidade com acessibilidade
        if($search == null && $estado != null && $cidade != null && $modalidade == null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 
            AND :valor2 AND cidade_escola LIKE :cidade AND uf_escola = :uf AND acessibilidade = :acessibilidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //só estado e cidade com mensalidade
        if($search == null && $estado != null && $cidade != null && $modalidade == null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 
            AND :valor2 AND cidade_escola LIKE :cidade AND uf_escola = :uf");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
        }

        //só modalidade com busca
        if($search != null && $estado == 'AC' && $cidade == null && $modalidade != null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2 AND modalidade = :modalidade");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':modalidade', $modalidade);
        }

        //só modalidade com acessibilidade
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade != null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2 
            AND modalidade = :modalidade AND acessibilidade = :acessibilidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':modalidade', $modalidade);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //só modalidade com mensalidade
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade != null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2 
            AND modalidade = :modalidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':modalidade', $modalidade);
        }

        //só acessibilidade com buscar
        if($search != null && $estado == 'AC' && $cidade == null && $modalidade == null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2 AND acessibilidade = :acessibilidade");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //só acessibilidade com mensalidade
        if($search == null && $estado == 'AC' && $cidade == null && $modalidade == null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2 
            AND acessibilidade = :acessibilidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //estado, cidade, modalidade, acessibilidade e mensalidade
        if($search == null && $estado != null && $cidade != null && $modalidade != null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2 
            AND cidade_escola LIKE :cidade AND uf_escola = :uf
            AND modalidade = :modalidade AND acessibilidade = :acessibilidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':modalidade', $modalidade);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //busca com cidade, estado, modalidade e mensalidade
        if($search == null && $estado != null && $cidade != null && $modalidade != null
        && $acessibilidade == null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2 
            AND cidade_escola LIKE :cidade AND uf_escola = :uf AND modalidade = :modalidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':modalidade', $modalidade);
        }

        //modalidade, acessibilidade e mensalidade
        if($search == null && $estado == "AC" && $cidade == null && $modalidade != null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE mensalidade BETWEEN :valor1 AND :valor2 
            AND modalidade = :modalidade AND acessibilidade = :acessibilidade");
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':modalidade', $modalidade);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //busca com barra de busca, modalidade, acessibilidade e mensalidade
        if($search != null && $estado == "AC" && $cidade == null && $modalidade != null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2 AND modalidade = :modalidade 
            AND acessibilidade = :acessibilidade");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindParam(':modalidade', $modalidade);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        //busca com barra de busca, cidade, estado, acessibilidade e mensalidade
        if($search != null && $estado != null && $cidade != null && $modalidade == null
        && $acessibilidade != null && $preco[0] != null && $preco[1] != null){
            $Comando = $conexao->prepare("SELECT * from escolas WHERE nome_escola LIKE :pesquisa
            AND mensalidade BETWEEN :valor1 AND :valor2 AND cidade_escola LIKE :cidade AND uf_escola = :uf
            AND acessibilidade = :acessibilidade");
            $Comando->bindValue(':pesquisa', '%' . $search . '%');
            $Comando->bindParam(':valor1', $preco[0]);
            $Comando->bindParam(':valor2', $preco[1]);
            $Comando->bindValue(':cidade', '%' . $cidade . '%');
            $Comando->bindParam(':uf', $estado);
            $Comando->bindParam(':acessibilidade', $acessibilidade);
        }

        if($Retorno != 'vazio'){
            $Comando->execute();

            if($Comando->rowCount() > 0){
                $resultado = json_encode($Comando->fetchAll());
                $Retorno = $resultado;
            }
            else{
                $Retorno = 'Não Foi encontrado';
            }
        }
        else{
            $Retorno = 'Não há filtros';
        }
        echo $Retorno;
}
    catch(PDOException $erro){
        $RetornoJSON = "Erro: " . $erro->getMessage();
        echo $RetornoJSON;
    }
?>