function charIsLetter(char) 
{
    if (typeof char !== 'string') {
      return false;
    }
  
    return /^[a-zA-Z]+$/.test(char);
}

function consulta()
{
    $.ajax({
        url: 'consultaInstBackEnd2.php',
    })
    .done(function(msg){
        var Res = JSON.parse(msg);
        h = Res.length;
        for(var j=0; j < h; j++)
        {
            document.getElementById("txt_nomeInst").placeholder = (Res[0].nome_escola)
            document.getElementById("txt_cnpj").placeholder = (Res[0].cnpj)
            document.getElementById("txt_cep").placeholder = (Res[0].cep_escola)
            document.getElementById("txt_mensalidade").placeholder = (Res[0].mensalidade)
            document.getElementById("txt_email").placeholder = (Res[0].email_escola)
            document.getElementById("txt_telefone").placeholder = (Res[0].telefone_escola)
            document.getElementById("txt_rua").placeholder = (Res[0].rua_escola)
            document.getElementById("txt_bairro").placeholder = (Res[0].bairro_escola)
            document.getElementById("txt_cidade").placeholder = (Res[0].cidade_escola)
            document.getElementById("txt_uf").placeholder = (Res[0].uf_escola)
        }
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false; 
}

function ativaMascaras()
{
// --------------------- Máscaras ------------------------

    // mascara de cnpj

    const cnpj = document.querySelector('#txt_cnpj');
    cnpj.addEventListener('keypress', () =>{
        try 
        {
            let cnpjlength = cnpj.value.length;
            if (cnpjlength === 2 || cnpjlength === 6)
            {
                cnpj.value += '.';
            }
            else if(cnpjlength === 10)
            {
                cnpj.value += '/';
            }
            else if(cnpjlength === 15)
            {
                cnpj.value += '-';
            } 
        }
        catch (error)
        {
            alert('Insira os valores corretamente')
        }
      
    })

    // mascara de cep

    const cep = document.querySelector('#txt_cep');
    cep.addEventListener('keypress', () => {
        let ceplength = cep.value.length;

        if(ceplength === 5)
        {
            cep.value += '-'
        }
    })

    // mascara de telefone

    const tel = document.querySelector('#txt_telefone');
    tel.addEventListener('keypress', () => {
        let tellength = tel.value.length;
        if (tellength === 0)
        {
            tel.value += '('
        }
        else if(tellength === 3)
        {
            tel.value += ') '
        }
        else if(tellength === 9)
        {
            tel.value += '-'
        }
    })  
}

function alterar(){
    let form = $("#form_alt").serialize();
    $.ajax({
        url: 'alterarInst.php',
        data: form,
        method: 'POST',
    })
    .done(function(msg){
        alert('alterado com sucesso')
    })
    .fail(function(){
        alert("Falha na busca")
    })
    return false;
}

function insertImg(){
    let formImg = $("#frm_cadImg")[0];
    let formData = new FormData(formImg);
    $.ajax({
        url: 'inserirImg.php',
        data: formData,
        method: 'POST',
        processData: false,
        contentType: false,
    })
    .done(function(msg){
        alert("imagem inserida");
        location.reload()
    })
    .fail(function(){
        alert("Falha ao inserir imagem")
    })
    return false;
}

function consultaImg(){
    $.ajax({
        url: 'consultImg.php',
    })
    .done(function(msg){
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

function validarCNPJ() {
    var penis = true;
    document.getElementById('txt_cnpj').innerHTML = ""
    var bloco = "";
    var cnpj = document.getElementById('txt_cnpj').value;
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == ''){ penis = false;}


    if (cnpj.length != 14){
        return false
        penis = false;

    }
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999"){
        bloco = "CNPJ INVÁLIDO"
        penis = false;
        }

         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)){
        bloco = "CNPJ INVÁLIDO";
        penis = false   
    }
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)){
          bloco = "CNPJ INVÁLIDO";
          penis = false;
    }
    if(penis == true){
        bloco = "CNPJ VÁLIDO";
    }   
    else{
        bloco = "CNPJ INVÁLIDO";
        document.getElementById('txt_cnpj').value = "";
    }
    $("#div_cnpj").append(bloco)
}