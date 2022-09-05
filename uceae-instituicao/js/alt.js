function alterar_foto(result){
    var dados = result.value;
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