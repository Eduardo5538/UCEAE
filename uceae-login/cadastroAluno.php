<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" type="text/css" href="css/cadastroAluno.css">
    <script src='js/cadastro.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function aparece_form(){
            var email = document.getElementById("email").value;
            var senha = document.getElementById("senha").value;
            var nome = document.getElementById("nome").value;
            var cpf = document.getElementById("cpf").value;

        
            if(email != "" && senha != "" && nome != "" && cpf != "")
            {
                document.getElementById("aparecer").style.display = "contents";
            }


        }
        function cadastroAlunos12(){
            var dados = $('#frm_cadastroAluno').serialize();
            $.ajax({
                method:'POST',
                url:'insertAluno.php',
                data: dados,
            })
            .done(function(msg){
                alert("Registro inserido!")
            })
            .fail(function(){
                alert("Falha ao inserir registro!")
        })
    return false;
}
    </script>
</head>
<body>
    <h1>Informe-nos seus dados!</h1> 
    <form name="cadastroAluno" id='frm_cadastroAluno' method='post' action="insertAluno.php">
        <input type="email" name="email" id="email" placeholder="    E-mail" onchange="aparece_form()"><br>
        <br>
        <input type="password" name="senha" id="senha" placeholder="    Senha" onchange="aparece_form()"><br>
        <br>
        <input type="text" name="nome" id="nome" placeholder="    Nome" onchange="aparece_form()"><br>
        <br>
        <input type="number" name="cpf" id="cpf" step='00000000000' placeholder="   CPF" onchange="aparece_form()"><br>
        <br>

        <div id="aparecer" style="display: none;">
            <label for="sexo" >Sexo:</label>
            <input type="radio" id="masc" name="sexo" value="30" >
            <label for="masc" >Masculino</label>
            <input type="radio" id="fem" name="sexo" value="60" >
            <label for="fem" >Feminino</label><br><br>
            <h2 >Data de Nascimento</h2>
            <input type="date" name="nasc" id="nasc" placeholder="123"><br>
            <br>
            <input type="number" name="cep" id="cep" step='00000000000' placeholder="    CEP" ><br>
            <br>
            <input type="text" name="rua" id="rua" placeholder="    Rua" ><br>
            <br>
            <input type="text" name="bairro" id="bairro" placeholder="    Bairro" ><br>
            <br>
            <input type="text" name="cidade" id="cidade" placeholder="    Cidade" ><br>
            <br>
            <input type="text" name="UF" id="UF" placeholder="    Unidade Federativa" ><br>
            <br><br>
            <input type="submit">
            <!--<input type='button' id='cadastrar' value='Cadastrar' name='cadastrar' onclick='cadastroAlunos12()' > -->
        </div>
    </form>
    <br><br>
</body>
</html>