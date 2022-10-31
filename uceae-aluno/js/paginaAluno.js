function carregaPagina()
{
    // --------------------- Máscaras ------------------------

// mascara de cpf

const cpf = document.querySelector('.cpf');

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