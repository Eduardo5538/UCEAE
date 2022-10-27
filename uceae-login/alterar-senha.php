<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="css/alterar-senha.css">
</head>
<body>
<form action="https://api.staticforms.xyz/submit" method="POST" class="form" id="frm_aluno">
        <h1 class="text-center">Alterar Senha</h1>
        <div class="form-step form-step-active">
            <div class="input-group">
            <input type="hidden" name="accessKey" value="439ca4fb-1e0c-4d39-b935-872c7323e422">
                <label for="email">Email Usado</label>
                <input type="text" required name="email" id="txt_email">
            </div>
            <div class="input-group">
                <label for="message">Nova Senha</label>
                <input type="text" required  name="message" id="txt_novasenha">
                <input type="text" name="subject" value="Nova Senha" class="inv">
            </div>
            <div class="">
                <input type="hidden" name="redirectTo" value="http://localhost/git/uceae/uceae-login/confirma-envio.html">
                <input type="submit" value="Confirmar" class="btn" >
            </div>
        </div>
    </form>    
</body>
</html>