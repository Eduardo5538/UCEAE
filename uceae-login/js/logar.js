function logar(){
    var dados = $('#loginform').serialize();
    $.ajax({
        method:'POST',
        url:'uceae-login/login.php',
        data: dados,
    })
    .done(function(msg){
        alert(msg);
        var json = JSON.parse(msg);
       	alert("logado com sucesso!")
        localStorage.setItem("cnpj", json[0].cnpj);

        alert(localStorage.getItem('cnpj'));
    })
    .fail(function(){
        alert("Falha ao logar-se.")
    })
   	return false;
}