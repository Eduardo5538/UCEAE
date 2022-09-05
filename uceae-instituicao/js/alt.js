function alterar_foto(){
    var dados = $("#alter-foto");
    $.ajax({
        method:'POST',
        url:'../uceae-instituicao/alterarImg.php',
        data: dados,
    })
    .done(function(msg){
       	alert(msg)

    })
    .fail(function(){
        alert("Falha ao mudar a foto.")
    })
   	return false;
}