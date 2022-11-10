function inserir() {
    var dados = $('#form_comentario').serialize();
    $.ajax({
            method: 'POST',
            url: 'inserirComentario.php',
            data: dados,
        })
        .done(function(msg) {
            alert(msg)
            location.reload()
        })
        .fail(function() {
            alert("Falha ao inserir registro!")
        })
    return false;
}
function consultaImg(){
    let penis = $('cnpj').serialize()
    $.ajax({
        url: 'consultImgClient.php',
        data: penis,
    })
    .done(function(msg){
        alert(msg)
        var Res = JSON.parse(msg);
        var bloco = "<div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel' style='height:20%'>"
        bloco += "<div class='carousel-inner'>"
        h = Res.length;
        for(var j=0; j < h; j++){
            if(j == 0){
                bloco += "<div class='carousel-item active'>"
            }
            else{
                bloco += "<div class='carousel-item'>"
            }
            bloco += "<img src='" + Res[j]['imagem'] + "' class='d-block w-100' alt='" + Res[j]['cod_imagem'] + "' id='img-carousel'>"
            bloco += '<div class="carousel-caption d-none d-md-block">'
            bloco += '<h5></h5>'
            bloco += "<p><a href='deletarImg.php?cod_imagem="+ Res[j]['cod_imagem'] +"' class='btn-apagaImg'>Apagar imagem</a><br></p>"
            bloco += ' </div>'
            bloco += "</div>"
        }
        bloco += "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>"
        bloco += "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"
        bloco += "<span class='visually-hidden'>Previous</span>"
        bloco += "</button>"
        bloco += "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>"
        bloco += "<span class='carousel-control-next-icon' aria-hidden='true'></span>"
        bloco += "<span class='visually-hidden'>Next</span>"
        bloco += "</button>"
        bloco += "</div>"
        $('#imagens_inst').append(bloco)

    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}

const allStars = document.querySelectorAll('.star');

function CarregaPagina() {

    const allStars = document.querySelectorAll('.star');
    allStars.forEach((star, i) => {
        star.onclick = function() {
            let current_star_level = i + 1;
            allStars.forEach((star, j) => {
                if (current_star_level >= j + 1) {
                    star.innerHTML = '&#9733';
                    document.getElementById("nota").value = j + 1
                } else {
                    star.innerHTML = '&#9734';
                }
            })
        }
    })
    
    const estrelas = document.querySelectorAll('.starComent');
    let nota = document.querySelector('.nota2').value;
    estrelas.forEach((estrela, e) => {
        if(nota >= e + 1)
        {
            estrela.innerHTML = '&#9733';
        }
        else
        {
            estrela.innerHTML = '&#9734';
        }
    })
}
