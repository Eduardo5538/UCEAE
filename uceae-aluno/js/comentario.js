function inserir(){
    var dados = $('#form_comentario').serialize();
    $.ajax({
        method:'POST',
        url:'inserirComentario.php',
        data: dados,
    })
    .done(function(msg){
       	alert(msg)
    })
    .fail(function(){
        alert("Falha ao inserir registro!")
    })
   	return false;
}