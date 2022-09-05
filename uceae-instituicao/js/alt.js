function alterar_foto(){
    var dados = $('#alter_banner').serialize();
    $.ajax({
        method:'POST',
        url:'alterarImg.php',
        data: dados,
    })
    .done(function(msg){
       	alert(msg)
        window.location.reload();
    })
    .fail(function(){
        alert("Falha ao mudar a foto.")
    })
   	return false;
}