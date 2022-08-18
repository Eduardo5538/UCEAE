function consulta(){
    var form = $("#busca").serialize();
    $.ajax({
        method: "POST",
        url: 'consultaInstBackEnd.php',
        data: form,
    })
    .done(function(msg){
        const Res = JSON.parse(msg);
        var bloco = ''
        h = Res.length;
        for(var j=0; j < h; j++){
            /*document.writeln(Res[j].nome_escola)
            document.writeln(Res[j].rua_escola)
            document.writeln(Res[j].cidade_escola)*/
            bloco += "<h1 id='nome'> " + Res[j].nome_escola + "</h1>"
            bloco += "<p id='cidade'> CIDADE: " + Res[j].cidade_escola + "</p>"
            bloco += "<p id='rua'> RUA: " + Res[j].rua_escola + "</p>"
            bloco += "<p id='cep'> CEP: " + Res[j].cep_escola + "</p>"

        }
        $("#tab_inst").append(bloco)

    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}