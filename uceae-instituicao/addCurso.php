<?php
    include 'conection.php';
    include "classInst.php";
    session_start();
    $titulo = $_POST['Titulo-curso'];
    $modalidade = $_POST['Modalidade-curso'];
    $periodo = $_POST['Periodo-Curso'];
    $desc = $_POST['Desc-curso'];
    $preco = $_POST['Valor-curso'];
    $acessibilidade = $_POST['Acessibilidade-curso'];

    $classe = new clsInsert();
    $classe->setValues($titulo, $modalidade, $periodo, $desc, $preco, $acessibilidade);

    echo $classe->Inserir();
    




?>