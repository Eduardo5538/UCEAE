function consulta(){

    $.ajax({
        url: 'consultaInstBackEnd.php',
    })
    .done(function(msg){
        var Res = JSON.parse(msg);
        alert(Res[2].email_escola);
        var bloco = "";
        h = Res.length;
        for(var j=0; j < h; j++){
            document.writeln(Res[j].nome_escola + " ")
            document.writeln(Res[j].imagem + " ")
            document.writeln(Res[j].email_escola + " ")
            document.writeln( Res[j].uf_escola + "" )
            document.writeln(Res[j].cidade_escola + "<br>")
        }
        $("tab_inst").append(bloco);

    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}