<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once('templates/head.php')
?>

<body>
    <main class="app favorito historico alterar-senha historico avaliar">
        <section class="background-favorito">
            <div class="background-box">
                <div class="header-nav">
                    <header class="voltar">
                        <a href="home.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                                <path id="Caminho_6" data-name="Caminho 6"
                                    d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                                    transform="translate(-0.025 -31.925)" />
                            </svg>
                        </a>

                    </header>
                </div>
                <div class="tema-title">
                    <h1>Avaliar Serviço</h1>
                </div>
            </div>
        </section>

        <?php
        require_once('templates/background-favorito.php');
        ?>

        <section class="title">
            <h2>AVALIAÇÃO:</h2>
        </section>

        <form action="" class="enviarAvaliacao">
            <section class="avaliarEstrelas">
                <div class="estrelas" id="avaliacao-estrelas">
                </div>
            </section>

            <section class="mensagemAvalicao">
                <div class="container-boxMsg">
                    <h3>DEIXE SEU COMENTÁRIO:</h3>
                    <textarea id="comentario" name="comentario" placeholder="feedback" rows="4" cols="50"></textarea>
                </div>
            </section>

            <section class="cardServico">
                <div class="card">
                    <img src="assets/img/corteserv.jpeg" alt="Corte Visagista">
                    <h3>CORTE VISAGISTA</h3>
                    <span class="tag">Corte Visagista</span>
                    <div class="end">
                        <span>Concluído <svg id="Grupo_349" data-name="Grupo 349" xmlns="http://www.w3.org/2000/svg"
                                width="18.952" height="16.046" viewBox="0 0 18.952 16.046">
                                <path id="Caminho_283" data-name="Caminho 283"
                                    d="M15.818,45.21a.3.3,0,0,0-.137-.034.359.359,0,0,0-.262.114l-.729.729a.342.342,0,0,0-.1.251v2.894a1.828,1.828,0,0,1-1.823,1.823H3.282a1.756,1.756,0,0,1-1.288-.536,1.756,1.756,0,0,1-.536-1.288V39.683A1.756,1.756,0,0,1,1.994,38.4a1.756,1.756,0,0,1,1.288-.536h9.482a2.025,2.025,0,0,1,.513.068.367.367,0,0,0,.1.023.36.36,0,0,0,.262-.114l.558-.558a.354.354,0,0,0,.1-.33.345.345,0,0,0-.205-.262,3.137,3.137,0,0,0-1.333-.285H3.282a3.161,3.161,0,0,0-2.319.963A3.162,3.162,0,0,0,0,39.683v9.482a3.161,3.161,0,0,0,.963,2.319,3.161,3.161,0,0,0,2.319.963h9.481a3.289,3.289,0,0,0,3.282-3.282V45.54A.331.331,0,0,0,15.818,45.21Z"
                                    transform="translate(0 -36.401)" />
                                <path id="Caminho_284" data-name="Caminho 284"
                                    d="M89.123,56.483,87.87,55.229a.908.908,0,0,0-1.3,0L79.2,62.6l-3-3a.908.908,0,0,0-1.3,0l-1.254,1.254a.908.908,0,0,0,0,1.3l4.9,4.9a.908.908,0,0,0,1.3,0l9.276-9.276a.908.908,0,0,0,0-1.3Z"
                                    transform="translate(-70.445 -54.215)" />
                            </svg>
                        </span>
                    </div>
                </div>
            </section>

            <section class="post">
                <div class="input-post">
                    <button>Enviar</button>
                </div>
            </section>
        </form>
    </main>

    <script>
        const estrelaSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.022 31.02">
            <path d="M6.771,30.386a1.014,1.014,0,0,1-1.4-1.184l1.556-9.46L.323,13.03a1.136,1.136,0,0,1,.531-1.9l9.184-1.392,4.095-8.654a.938.938,0,0,1,1.738,0l4.095,8.654,9.184,1.392a1.134,1.134,0,0,1,.529,1.9l-6.6,6.712,1.556,9.46a1.014,1.014,0,0,1-1.4,1.184L15,25.874,6.769,30.386Z" transform="translate(0.51 0.001)" fill="none" stroke="#000" stroke-width="1"/>
        </svg>`;

        const container = document.getElementById('avaliacao-estrelas');
        let nota = 0;

        for (let i = 1; i <= 5; i++) {
            const estrela = document.createElement('div');
            estrela.classList.add('estrela');
            estrela.innerHTML = estrelaSVG;
            estrela.dataset.valor = i;

            estrela.addEventListener('click', () => {
                nota = i;
                atualizarEstrelas();
            });

            container.appendChild(estrela);
        }

        function atualizarEstrelas() {
            const estrelas = document.querySelectorAll('.estrela');
            estrelas.forEach((estrela, index) => {
                if (index < nota) {
                    estrela.classList.add('selecionada');
                } else {
                    estrela.classList.remove('selecionada');
                }
            });
        }
    </script>
</body>

</html>