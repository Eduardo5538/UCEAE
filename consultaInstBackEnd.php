<?php
    include "conection.php";
    $searchNome = $_POST['searchNome'];
    $searchCidade = $_POST['searchCidade'];
    $searchUF = $_POST['searchUF'];
    $acessibilidade = $_POST['acessibilidade'];

        try
        {
            if($searchNome != "" && $searchCidade != "" && $searchUF != ""){
                $Comando = $conexao->prepare("SELECT escolas.nome_escola, escolas.imagem_escola, escolas.email_escola, escolas.uf_escola, escolas.cidade_escola from escolas WHERE nome_escola LIKE '%?%' AND cidade_escola LIKE '%?%' AND uf_escola LIKE '%?%'");
                $Comando->bindParam(1, $searchNome);
                $Comando->bindParam(2, $searchCidade);
                $Comando->bindParam(3, $searchUF);
                $Comando->execute();
                $Res = $Comando->fetchAll();
                $RetornoJSON = json_encode($Res);
                echo $RetornoJSON;
            }
            elseif($searchNome != "" && $searchCidade != "" && $searchUF == ""){
                $Comando = $conexao->prepare("SELECT escolas.nome_escola, escolas.imagem_escola, escolas.email_escola, escolas.uf_escola, escolas.cidade_escola from escolas WHERE nome_escola LIKE '%?%' AND cidade_escola LIKE '%?%'");
                $Comando->bindParam(1, $searchNome);
                $Comando->bindParam(2, $searchCidade);
                $Comando->execute();
                $Res = $Comando->fetchAll();
                $RetornoJSON = json_encode($Res);
                echo $RetornoJSON;
            }
            elseif($searchNome != "" && $searchCidade == "" && $searchUF == ""){
                $Comando = $conexao->prepare("SELECT escolas.nome_escola, escolas.imagem_escola, escolas.email_escola, escolas.uf_escola, escolas.cidade_escola from escolas WHERE nome_escola LIKE '%?%'");
                $Comando->bindParam(1, $searchNome);
                $Comando->execute();
                $Res = $Comando->fetchAll();
                $RetornoJSON = json_encode($Res);
                echo $RetornoJSON;
            }
            elseif($searchNome == "" && $searchCidade == "" && $searchUF == ""){
                exit;
            }
            else{
                if($acessibilidade == "_true"){
                    $Comando = $conexao->prepare("SELECT escolas.nome_escola, escolas.imagem_escola, escolas.email_escola, escolas.uf_escola, escolas.cidade_escola from escolas WHERE acessibilidade = true");
                    $Comando->execute();
                    $Res = $Comando->fetchAll();
                    $RetornoJSON = json_encode($Res);
                    echo $RetornoJSON;
                }
                elseif($acessibilidade == "_false"){
                    $Comando = $conexao->prepare("SELECT escolas.nome_escola, escolas.imagem_escola, escolas.email_escola, escolas.uf_escola, escolas.cidade_escola from escolas WHERE acessibilidade = ");
                    $Comando->execute();
                    $Res = $Comando->fetchAll();
                    $RetornoJSON = json_encode($Res);
                    echo $RetornoJSON;
                }
            }

        }

        catch(PDOException $erro){
            $RetornoJSON = "Erro: " . $erro->getMessage();
            echo $RetornoJSON;
        }
?>