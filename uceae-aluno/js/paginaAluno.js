function carregaPagina()
{
    // --------------------- Máscaras ------------------------

// mascara de cpf

const cpf = document.querySelector('.CPF');

cpf.addEventListener('keypress', () => {
    let cpflength = cpf.value.length;

    if (cpflength === 3 || cpflength === 7)
    {
        cpf.value += '.'
    }
    else if(cpflength === 11)
    {
        cpf.value += '-'
    }
    const cpfCompleto = cpf.value;
})

// mascara de cep

const cep = document.querySelector('.input-cep');
cep.addEventListener('keypress', () => {
    let ceplength = cep.value.length;

    if(ceplength === 5)
    {
        cep.value += '-'
    }
})

// mascara de telefone

const tel = document.querySelector('.tel');
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
    else if(tellength === 10)
    {
        tel.value += '-'
    }
})
}

function cpfVerify(){
    cpf = document.getElementById('txt_cpfAluno').value
    cpf = cpf.replace(/\D/g, '');
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        
        if(r != cpf.substring(j, j+1)) result = false;
    });
    document.getElementById('validacao').innerHTML = "";
    if(result == false){
        $("#validacao").append("Cpf invalido");
        document.getElementById('txt_cpfAluno').value = "";
    }
    else{
        $("#validacao").append("CPF válido");
    }

    
}


function atualizarCampos(){
    var dados =document.getElementById('CEP').value;
    document.getElementById('Rua').value = "";
    document.getElementById('Bairro').value = "";
    document.getElementById('Cidade').value = "";
    document.getElementById('UF').value = "";
    const selectElement = document.querySelector("#UF");
    coisaimportante = dados.replace('"','');
    $.ajax({
        url: 'https://viacep.com.br/ws/'+ coisaimportante + '/json/' 
    })
    .done(function(msg){
        var desempacotado = JSON.parse(JSON.stringify(msg));
            document.getElementById('Rua').value = desempacotado.logradouro;
            document.getElementById('Bairro').value = desempacotado.bairro;
            document.getElementById('Cidade').value = desempacotado.localidade;
            selectElement.value = desempacotado.uf;
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}
function alterar_foto(){
    var bloco = "<input type='submit' value='Salvar'>";
    let input = document.createElement("button")
    input.innerHTML = "Alterar banner";
    var div = document.getElementById("resp1")
    document.getElementById('resp1').innerHTML = "";
    div.append(input);
}