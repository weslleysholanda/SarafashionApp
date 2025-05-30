<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app">
        <section class="codigoEmail">
            <header class="voltar">
                <a href="<?= BASE_URL ?>index.php?url=verificarEmail">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>
            <div class="background_Email">
                <img src="<?= BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>

            <?php
            require_once('templates/container-emailFa.php')
            ?>
        </section>
    </main>

    <script>
        // Função para mudar o foco para o próximo input
        //current - o input atual aonde o usuário está digitando
        //nextId - o id do próximo input a receber o foco

        // Função para avançar automaticamente para o próximo input
        function nextInput(current, nextId) {
            if (current.value.length === 1) {
                const next = document.getElementById(nextId);
                if (next) {
                    next.focus();
                }
            }
            updateHiddenInput();
        }

        // Permite colar todos os números de uma vez no primeiro input
        function handlePaste(event) {
            event.preventDefault();
            const pastedData = (event.clipboardData || window.clipboardData).getData('text');
            const cleanData = pastedData.replace(/\D/g, ''); // Remove caracteres não numéricos

            const inputs = document.querySelectorAll('.codigo-input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = cleanData[i] || '';
            }

            // Foca no próximo campo vazio
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value === '') {
                    inputs[i].focus();
                    break;
                }
            }

            updateHiddenInput();
        }

        // Atualiza o campo hidden com o código completo
        function updateHiddenInput() {
            const inputs = document.querySelectorAll('.codigo-input');
            let codigo = '';
            inputs.forEach(input => {
                codigo += input.value;
            });
            document.getElementById('codigo_verificacao').value = codigo;
        }

        // Atualiza o código escondido toda vez que qualquer input mudar
        document.querySelectorAll('.codigo-input').forEach(input => {
            input.addEventListener('input', updateHiddenInput);
        });

        // Também garante que o código vai com o form se colar direto e apertar submit rápido
        document.getElementById('form-codigo').addEventListener('submit', updateHiddenInput);


        // Define o tempo inicial: 10 minutos (em segundos)
        let tempoRestante = 10 * 60;

        const timerElemento = document.getElementById('timer');

        const atualizarTimer = () => {
            let minutos = Math.floor(tempoRestante / 60);
            let segundos = tempoRestante % 60;

            // Adiciona zero à esquerda se for menor que 10
            minutos = minutos < 10 ? '0' + minutos : minutos;
            segundos = segundos < 10 ? '0' + segundos : segundos;

            if (tempoRestante > 0) {
                timerElemento.textContent = `Código expira em: ${minutos}:${segundos}`;
                tempoRestante--;
            } else {
                clearInterval(contador);
                timerElemento.textContent = 'Código expirado';
                timerElemento.style.color = 'red'; // Deixa o texto vermelho quando expira
            }
        };

        // Atualiza o timer a cada 1 segundo
        const contador = setInterval(atualizarTimer, 1000);

        // Executa a primeira vez imediatamente
        atualizarTimer();


    </script>
</body>

</html>