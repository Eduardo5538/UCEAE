<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/consulta.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Instituições de Ensino</title>
</head>
<body style='font-family:calibri'>

    <center>
        <br><br><br><br>
            <form method="post" id='busca' action='consultaInstBackEnd.php'>
                <label for="search">Nome</label>
                <input type="text" name="searchNome" id="searchNome" style='width:400px;'><br>
                <label for="search">Cidade</label>
                <input type="text" name="searchCidade" id="searchNome" style='width:290px;'>
                <label for="search">UF</label>
                <input type="text" name="searchUF" id="searchUF" style='width:100px;'><br>
                <label for="search">Acessibilidade</label>
                <select name="acessibilidade" id="acessibilidade">
                    <option value="_true">Sim</option>
                    <option value="_false">Não</option>
                </select>
                <input type="button" value="Pesquisar" onclick='consulta()'>
                <input type="submit" value="pesq">
            </form>
            <div id='tab_inst'></div>
    </center>
</body>
</html>