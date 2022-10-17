<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sobreNos.css">
    
</head>
<body class="bg">
    <div class="centralizado">
        <div class="bloco-logo">
            <img src="img/UCEAE1.png" alt="">
        </div>
        <div class="bloco-nome">
            <h1 class="nome-uceae">Um Curso Especial para Alguém Excepcional</h1>
            <br>
            <button class="btn btn-manual">Manual Do Usuário</button>
            <button class="btn btn-doc">Documentação</button>
        </div>
    </div>
    <br><br>
    <br><br>
    <div class="div-titulo">
        <div id="container">
            <span id="text1"></span>
            <span id="text2"></span>
        </div>

        <svg id="filters">
            <defs>
                <filter id="threshold">
                    <feColorMatrix in="SourceGraphic" type="matrix" values="1 0 0 0 0
                        0 1 0 0 0
                        0 0 1 0 0
                        0 0 0 255 -140" />
                </filter>
            </defs>
        </svg>
    <br><br>
    <br><br>
    <br><br>
    <h1 class="titulo-equipe">------- Nossa Equipe -------</h1>
    <br><br>
    <div class="box">
      <div class="card">
        <div class="imgBx">
            <img src="https://images.unsplash.com/photo-1532123675048-773bd75df1b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="images">
        </div>
        <div class="details">
            <h2>Davi Alexandre<br><span>Programador</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="https://images.unsplash.com/photo-1532123675048-773bd75df1b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="images">
        </div>
        <div class="details">
            <h2>Eduardo Correa<br><span>Programador</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="https://images.unsplash.com/photo-1532123675048-773bd75df1b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="images">
        </div>
        <div class="details">
            <h2>Gabriel Rangel<br><span>Programador</span></h2>
        </div>
      </div>
    </div>
    <br><br>
    <div class="box">
      <div class="card">
        <div class="imgBx">
            <img src="https://images.unsplash.com/photo-1532123675048-773bd75df1b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="images">
        </div>
        <div class="details">
            <h2>Arthur Destro<br><span>Documentação</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="https://images.unsplash.com/photo-1532123675048-773bd75df1b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="images">
        </div>
        <div class="details">
            <h2>Gabriel Volpiani<br><span>Documentação</span></h2>
        </div>
      </div>
      <div class="card">
        <div class="imgBx">
            <img src="https://images.unsplash.com/photo-1532123675048-773bd75df1b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="images">
        </div>
        <div class="details">
            <h2>Guilherme Mussi<br><span>Documentação</span></h2>
        </div>
      </div>
    </div>
</body>
<script>
        const elts = {
            text1: document.getElementById("text1"),
            text2: document.getElementById("text2")
        };

        const texts = [
            "UCEAE",
            "Abrindo Caminho para o Aprendizado",
            "Busca por instituições Inclusivas",
            "Em busca da acessibilidade"
        ];

        const morphTime = 2;
        const cooldownTime = 1.5;

        let textIndex = texts.length - 1;
        let time = new Date();
        let morph = 0;
        let cooldown = cooldownTime;

        elts.text1.textContent = texts[textIndex % texts.length];
        elts.text2.textContent = texts[(textIndex + 1) % texts.length];

        function doMorph() {
            morph -= cooldown;
            cooldown = 0;

            let fraction = morph / morphTime;

            if (fraction > 1) {
                cooldown = cooldownTime;
                fraction = 1;
            }

            setMorph(fraction);
        }

        function setMorph(fraction) {
            elts.text2.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            elts.text2.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            fraction = 1 - fraction;
            elts.text1.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            elts.text1.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            elts.text1.textContent = texts[textIndex % texts.length];
            elts.text2.textContent = texts[(textIndex + 1) % texts.length];
        }

        function doCooldown() {
            morph = 0;

            elts.text2.style.filter = "";
            elts.text2.style.opacity = "100%";

            elts.text1.style.filter = "";
            elts.text1.style.opacity = "0%";
        }

        function animate() {
            requestAnimationFrame(animate);

            let newTime = new Date();
            let shouldIncrementIndex = cooldown > 0;
            let dt = (newTime - time) / 1000;
            time = newTime;

            cooldown -= dt;

            if (cooldown <= 0) {
                if (shouldIncrementIndex) {
                    textIndex++;
                }

                doMorph();
            } else {
                doCooldown();
            }
        }

        animate();
    </script>


</html>