function consulta(){
    $.ajax({
        url: 'consultaInstBackEnd2.php',
    })
    .done(function(msg){
        var Res = JSON.parse(msg);
        h = Res.length;
        for(var j=0; j < h; j++){
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