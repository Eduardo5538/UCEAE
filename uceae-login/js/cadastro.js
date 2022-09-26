function radio(){
    if($('input[name=acessibilidade]:checked')){
        if(document.getElementById('SIM').checked){
            $(".none").show('slow');
        }
        else if(document.getElementById('NAO').checked){
            $(".none").hide('slow');
        }
    }
}
function mostraFormAluno(){
	location.href="cadastroAluno.php";
}
function mostraFormInst(){
	location.href="formularioInst.php";
}
function cadastroAluno(){
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
function cadastroInst(){
	var dados = $('#form_inst').serialize();
    $.ajax({
        method:'POST',
        url:'insertInstituicao2.php',
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

function mostrar()
{
// --------------------- Máscara de Cnpj ------------------------

const cnpj = document.querySelector('#cnpj');

cnpj.addEventListener('keypress', () => {
    let cnpjlength = cnpj.value.length;

    if (cnpjlength === 2 || cnpjlength === 6)
    {
        cnpj.value += '.'
    }
    else if(cnpjlength === 10)
    {
        cnpj.value += '/'
    }
    else if(cnpjlength === 15)
    {
        cnpj.value += '-'
    }
    const cnpjCompleto = cnpj.value;
})
}