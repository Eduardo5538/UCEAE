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