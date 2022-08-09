<?php
	$user = "root";
	$senha = "";
	$bd = "BD_UCEAE";
	try
    {
        $conexao = new PDO("mysql:host=localhost; dbname=$bd","$user","$senha");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");
    }
    catch(PDOException $Erro)
    {
        echo "Erro encontrado na conexão com o BD: " . $Erro->getMessage();
    }
	
?>