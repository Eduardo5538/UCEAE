function alterar_foto2(){
    var bloco = "<input type='submit' value='Salvar'>";
    let input = document.createElement("button")
    input.innerHTML = "Alterar foto";
    var div = document.getElementById("resp2")
    document.getElementById('resp2').innerHTML = "";
    div.append(input);
}