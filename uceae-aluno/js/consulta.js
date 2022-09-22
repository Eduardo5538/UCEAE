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
        document.getElementById('cards').scrollIntoView();
        if(msg == 'NULO'){
            alert('Preencha o formulário');
        }
        else if(msg == 'deu ruim'){
            alert('Não foi encontrado!');
        }
        else{
            $('#cards').empty();
            for(var i = 0; i <= desempacotado.length; i++)
            {
              bloco = "<div class='card mb-3' id='card' data-aos='fade-up' data-aos-once='true'>";
              bloco += "<img class='card-img-top' id='img-card' src='" + desempacotado[i].foto_banner + "' alt='Card image cap'> ";
              bloco += "<div class='card-body'>";
              bloco += "<h5 class='card-title'>"+ desempacotado[i].nome_escola +"</h5>";
              bloco += "<p class='card-text'>" + desempacotado[i].uf_escola +"</p>";
              bloco += "<p class='card-text'><small class='text-muted'>"+ desempacotado[i].email_escola +" ------------------ "+ desempacotado[i].cidade_escola +"</small></p>";
              bloco += "<a href='showInst.php?cnpj="+ desempacotado[i].CNPJ +"' class='btn btn-dark' tabindex='-1' style='margin-right: 10px;' role='button' aria-disabled='true'>Quero ver!</a>";
              bloco += "</div>";
              bloco += "</div>";
              bloco += "<br>";

              $('#cards').append(bloco);
            }
        }
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}

function trocacidade(){
    var dados = $('#estado').val();
    $('#cidade').removeAttr('disabled');
    $.ajax({
        method: 'GET',
        url: 'consultaEstado.php?estado=' + dados
    })
    .done(function(msg){
        var desempacotado = JSON.parse(msg);
        $('#cidade option').remove();
        for(var i = 0; i <= desempacotado.length; i++){
            $('#cidade').append('<option>' + desempacotado[i].nome + '</option>');
        }
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}

$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 10000,
      values: [ 0, 10000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "R$" + ui.values[ 0 ] + " - R$" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "R$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - R$" + $( "#slider-range" ).slider( "values", 1 ) );
  } );