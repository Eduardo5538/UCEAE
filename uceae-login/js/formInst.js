function validarCNPJ() {
    var real = true;
    document.getElementById('validacao_cnpj').innerHTML = ""
    var bloco = "";
    var cnpj = document.getElementById('cnpj').value;
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == ''){ real = false;}


    if (cnpj.length != 14){
        return false
        real = false;

    }
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999"){
        bloco = "CNPJ INVÁLIDO"
        real = false;
        }

         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)){
        bloco = "CNPJ INVÁLIDO";
        real = false   
    }
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)){
          bloco = "CNPJ INVÁLIDO";
          real = false;
    }
    if(real == true){
        bloco = "CNPJ VÁLIDO";
    }   
    else{
        bloco = "CNPJ INVÁLIDO";
        document.getElementById('cnpj').value = "";
    }
    $("#validacao_cnpj").append(bloco)
}

function mostrar()
{
// --------------------- Máscaras ------------------------

// mascara de cnpj

const cnpj = document.querySelector('#cnpj');
cnpj.addEventListener('keypress', () =>{
    let cnpjlength = cnpj.value.length;

    if (cnpjlength === 2 || cnpjlength === 6)
    {
        cnpj.value += '.';
    }
    else if(cnpjlength === 10)
    {
        cnpj.value += '/';
    }
    else if(cnpjlength === 15)
    {
        cnpj.value += '-';
    }
})

// mascara de cep

const cep = document.querySelector('#cep');
cep.addEventListener('keypress', () => {
    let ceplength = cep.value.length;

    if(ceplength === 5)
    {
        cep.value += '-'
    }
})

// mascara de telefone

const tel = document.querySelector('#tel');
tel.addEventListener('keypress', () => {
    let tellength = tel.value.length;
    if (tellength === 0)
    {
        tel.value += '('
    }
    else if(tellength === 3)
    {
        tel.value += ') '
    }
    else if(tellength === 9)
    {
        tel.value += '-'
    }
})  
}

function verificaSenha()
{
    senha = document.querySelector('#senha');
    confirmaSenha = document.querySelector('#confirm_senha');
    txtSenha = document.querySelector('.txtSenha');
    txtConfSenha = document.querySelector('.txtConfSenha');

    if(senha.value == '')
    {
        txtConfSenha.innerHTML = "Digite a senha"
    }
    else if(confirmaSenha.value == '')
    {
        txtSenha.innerHTML = "Confirme a senha"
    }
    else
    {
        if(senha.value != confirmaSenha.value)
        {
            txtSenha.innerHTML = "Senhas Diferentes"
            document.getElementById('senha').value = "";
        }
        else
        {
            txtSenha.innerHTML = "Senhas Iguais"
            txtConfSenha.innerHTML = "Senhas Iguais"
        }
    }
}

function atualizarCampos(){
    var dados =document.getElementById('cep').value;
    document.getElementById('rua').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
    document.getElementById('unid_fed').value = "";
    const selectElement = document.querySelector("#unid_fed");
    coisaimportante = dados.replace('"','');
    $.ajax({
        url: 'https://viacep.com.br/ws/'+ coisaimportante + '/json/' 
    })
    .done(function(msg){
        var desempacotado = JSON.parse(JSON.stringify(msg));
        if(desempacotado.logradouro != null && desempacotado.bairro != null != desempacotado.localidade != null){
            document.getElementById('rua').value = desempacotado.logradouro;
            document.getElementById('bairro').value = desempacotado.bairro;
            document.getElementById('cidade').value = desempacotado.localidade;
            selectElement.value = desempacotado.uf;
        }
        else{
            alert("CEP INVÁLIDO");
            document.getElementById('cep').value = "";
        }
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}