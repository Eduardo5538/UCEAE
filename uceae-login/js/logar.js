function logar(){
    var dados = $('#loginform').serialize();
    $.ajax({
        method:'POST',
        url:'uceae-login/login.php',
        data: dados,
    })
    .done(function(msg){
        if(msg != "Registro Não Encontrado"){
            alert(msg)
            window.location.href = "../uceae/uceae-instituicao/paginaInst.php" 
        }
        else{
            alert("Email ou senha inválidos, verifique seus dados!")
        }
       	
       
    })
    .fail(function(){
        alert("Falha ao logar-se.")
    })
   	return false;
}