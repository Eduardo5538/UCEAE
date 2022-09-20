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
}