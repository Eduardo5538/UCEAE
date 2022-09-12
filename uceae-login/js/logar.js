function logar(){
    var dados = $('#loginform').serialize();
    $.ajax({
        method:'POST',
        url:'uceae-login/login.php',
        data: dados,
    })
    .done(function(msg){
        if(msg != "Registro Não Encontrado"){
            alert("logado com sucesso!")
        }
        else{
            alert("erro ao efetuar o login")
        }
       	
        window.location.href = "../uceae/uceae-instituicao/paginaInst.php"
    })
    .fail(function(){
        alert("Falha ao logar-se.")
    })
   	return false;
}