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
<body onload="passar()">
    <form action="insertAluno.php" method="POST" class="form" id="frm_aluno" enctype="multipart/form-data">
        <h1 class="text-center">Formulário de Cadastro</h1>
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div
             class="progress-step progress-step-active" data-title="Nome"></div>
            <div class="progress-step" data-title="Contato"></div>
            <div class="progress-step" data-title="Info"></div>
            <div class="progress-step" data-title="Local"></div>
            <div class="progress-step" data-title="Senha"></div>
        </div>
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" required name="nome" id="txt_nomeAluno">
            </div>
            <div class="input-group">
                <label for="Sobrenome">Sobrenome</label>
                <input type="text" required  name="sobrenome" id="txt_sobrenomeAluno">
            </div>
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Próximo</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="tel">Telefone</label>
                <input type="text" required name="tel" id="txt_telAluno" class="tel" maxlength="14">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" required  name="email" id="txt_emailAluno">
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <a href="#" class="btn btn-next">Próximo</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="nasc">Data de Nascimento</label>
                <input type="date" name="nasc" id="txt_nascAluno">
            </div>
            <div class="input-group">
                <label for="cpf">CPF</label>
                <input type="text" autocomplete="off" maxlength="14" name="cpf" id="txt_cpfAluno" class="cpf" onchange="cpfVerify()">
                <div id='validacao'></div>
            </div>
            <div class="input-group">
                <label for="def" required>Possui Deficiência?</label>
                <div class="linha-form linha-radio">
                    <label for="html">Sim</label>
                    <input type="radio" id="sim" name="op_def" value="S" onclick="mostraDef()" class="btn-radioSim">                
                    <label for="css">Não</label>
                    <input type="radio" id="nao" name="op_def" value="N" onclick="mostraDef()" class="btn-radioNao">
                </div>
                <br>
                <br>
            </div>
            <div class="input-group def-aluno" >
                <label for="nomeDefAluno" >Nome da Deficiência</label>
                <br>
                <input type="text" name="nomeDefAluno" id="txt_nomeDefAluno" >
            </div>
            <div class="input-group def-aluno">
                <label for="descDefAluno">Descrição da Deficiência</label><br>
                <textarea name="descDefAluno" id="txt_descDefAluno" class='descDefAluno'></textarea>
            </div>
            <div class="input-group">
                <label for="foto">Foto de Perfil</label>
                <input type="file" required name="icon" id="icon">
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <a href="#" class="btn btn-next">Próximo</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="cep">CEP</label>
                <input type="text" required name="cep" id="txt_cepAluno" class="cep" maxlength="9">
            </div>
            <div class="input-group">
                <label for="rua">Rua</label>
                <input type="text" required name="rua" id="txt_ruaAluno">
            </div>
            <div class="input-group">
                <label for="bairro">Bairro</label>
                <input type="text" required name="bairro" id="txt_bairroAluno">
            </div>
            <div class="input-group">
                <label for="cidade">Cidade</label>
                <input type="text" required name="cidade" id="txt_cidadeAluno">
            </div>
            <div class="input-group">
                <label for="uf">Unidade Federativa</label>
                <select class="estado" name='UF' id="txt_ufAluno" required>
                  <option value="AC" id="AC">AC</option><option value="AL" id="AL">AL</option>
                  <option value="AP" id="AP">AP</option><option value="AM" id="AM">AM</option>
                  <option value="BA" id="BA">BA</option><option value="CE" id="CE">CE</option>
                  <option value="DF" id="DF">DF</option><option value="ES" id="ES">ES</option>
                  <option value="GO" id="GO">GO</option><option value="MA" id="MA">MA</option>
                  <option value="MT" id="MT">MT</option><option value="MS" id="MS">MS</option>
                  <option value="MG" id="MG">MG</option><option value="PA" id="PA">PA</option>
                  <option value="PB" id="PB">PB</option><option value="PR" id="PR">PR</option>
                  <option value="PE" id="PE">PE</option><option value="PI" id="PI">PI</option>
                  <option value="RJ" id="RJ">RJ</option><option value="RN" id="RN">RN</option>
                  <option value="RS" id="RS">RS</option><option value="RO" id="RO">RO</option>
                  <option value="RR" id="RR">RR</option><option value="SC" id="SC">SC</option>
                  <option value="SP" id="SP">SP</option><option value="SE" id="SE">SE</option>
                  <option value="TO" id="TO">TO</option>
                </select>
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <a href="#" class="btn btn-next">Próximo</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="txt_senhaAluno"  onchange="verificaSenha()" required>
                <h5 class="txtSenha"></h5>
            </div>
            <div class="input-group">
                <label for="confSenha">Confirmar Senha</label>
                <input type="password" name="confSenha" onchange="verificaSenha()" id="txt_confSenhaAluno" required>
                <h5 class="txtConfSenha"></h5>
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <input type="submit" value="Confirmar" class="btn" >
            </div>
        </div>
    </form>
</body>
</html>