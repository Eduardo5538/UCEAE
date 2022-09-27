function validarCNPJ() {
    var penis = true;
    document.getElementById('cnpj_peniano').innerHTML = ""
    var bloco = "";
    var cnpj = document.getElementById('cnpj').value;
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == ''){ penis = false;}


    if (cnpj.length != 14){
        return false
        penis = false;

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
        penis = false;
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
        penis = false   
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
          penis = false;
    }
    if(penis == true){
        bloco = "CNPJ VÁLIDO";
    }   
    else{
        bloco = "CNPJ INVÁLIDO";
        document.getElementById('cnpj').value = "";
    }
    $("#cnpj_peniano").append(bloco)
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