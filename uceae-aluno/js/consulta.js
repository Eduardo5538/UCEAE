function consulta(){
    var dados = new FormData($('#formBusca')[0]);
    $.ajax({
        method: 'POST',
        url: 'consultaInstBackEnd.php',
        data: dados,
        processData: false,
        contentType: false
    })
    .done(function(msg){
        var desempacotado = JSON.parse(msg);
        alert(desempacotado);
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}