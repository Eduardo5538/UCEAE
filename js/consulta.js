function consulta(){

    $.ajax({
        url: 'consultaInstBackEnd.php',
    })
    .done(function(msg){
        var Res = JSON.parse(msg);
        alert(Res[2].email_escola);
        var element = document.createElement("div");
        var bloco = "";
        h = Res.length;
        for(var j=0; j < h; j++){
            element.innerHTML += "<h1> " + Res[j].nome_escola + "</h1> ";
            element.innerHTML += "<img src=" + Res[j].imagem + "> ";
            
            

            element.innerHTML += "<h3> " + Res[j].email_escola + "</h3>"
            element.innerHTML += "<h4>" + Res[j].uf_escola + "</h4>"
            element.innerHTML += "<h4>" + Res[j].cidade_escola + "</h4><br><br>"
        }
        document.body.appendChild(element);
        
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}