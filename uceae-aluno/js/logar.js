function logar(){
    var dados = $('#loginform').serialize();
    $.ajax({
        method:'POST',
        url:'../uceae-login/login.php',
        data: dados,
    })
    .done(function(msg){
       	alert("logado com sucesso!")
        window.location.href = "../../uceae/uceae-instituicao/paginaInst.php"
    })
    .fail(function(){
        alert("Falha ao logar-se.")
    })
   	return false;
}