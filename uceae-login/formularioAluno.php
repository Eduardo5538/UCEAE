<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" type="text/css" href="css/formularioAluno.css">
    <script src='js/formularioAluno.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <form action="" method="POST" class="form" id="frm_aluno">
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="txt_nomeAluno">
            </div>
            <div class="input-group">
                <label for="Sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="txt_sobrenomeAluno">
            </div>
            <div class="">
                <a href="#" class="btn btn-next">Próximo</a>
            </div>
        </div>
    </form>
</body>
</html>