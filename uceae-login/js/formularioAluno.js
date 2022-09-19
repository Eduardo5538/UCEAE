function passar(){

const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressStep = document.querySelectorAll(".progress-step");

let formStepsNums = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () =>{
        formStepsNums++;
        updateFormSteps();
        updateProgressBar();
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () =>{
        formStepsNums--;
        updateFormSteps();
        updateProgressBar();
    });
});

function updateFormSteps(){

    formSteps.forEach(formStep => {
        formStep.classList.contains("form-step-active") &&
        formStep.classList.remove("form-step-active");
    });
    formSteps[formStepsNums].classList.add("form-step-active");
}

function updateProgressBar(){
    progressStep.forEach((progressStep,idx) => {
        if(idx < formStepsNums + 1){
            progressStep.classList.add('progress-step-active');
        }
        else{
            progressStep.classList.remove('progress-step-active');
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active"); 

    progress.style.width = ((progressActive.length - 1) / (progressStep.length - 1)) * 100 + "%"; 
}

// --------------------- Máscara de Cpf ------------------------

const cpf = document.querySelector('.cpf');

cpf.addEventListener('keypress', () => {
    let cpflength = cpf.value.length;

    if (cpflength === 3 || cpflength === 7)
    {
        cpf.value += '.'
    }
    else if(cpflength === 11)
    {
        cpf.value += '-'
    }
    const cpfCompleto = cpf.value;
})
}

function cpfVerify(){
    cpf = document.getElementById('txt_cpfAluno').value
    alert(cpf)
    cpf = cpf.replace(/\D/g, '');
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        
        if(r != cpf.substring(j, j+1)) result = false;
    });
    document.getElementById('penis').innerHTML = "";
    if(result == false){
        $("#penis").append("Cpf invalido");
    }
    else{
        $("#penis").append("CPF válido");
    }

    
}


