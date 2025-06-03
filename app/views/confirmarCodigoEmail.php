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
        function nextInput(current, nextId) {
            setTimeout(() => {
                if (current.value.length === 1) {
                    const next = document.getElementById(nextId);
                    if (next) {
                        next.focus();
                    }
                }
                updateHiddenInput();
            }, 0);
        }

        function handlePaste(event) {
            event.preventDefault();
            const pastedData = (event.clipboardData || window.clipboardData).getData('text');
            const cleanData = pastedData.replace(/\D/g, '');

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

        function updateHiddenInput() {
            const inputs = document.querySelectorAll('.codigo-input');
            let codigo = '';
            inputs.forEach(input => {
                codigo += input.value;
            });

            const hidden = document.getElementById('codigo_verificacao');
            if (hidden) {
                hidden.value = codigo;
                console.log('[DEBUG] Código final:', codigo);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('.codigo-input');
            inputs.forEach(input => {
                input.addEventListener('input', updateHiddenInput);
            });

            const form = document.getElementById('form-codigo');
            form.addEventListener('submit', function(e) {
                updateHiddenInput();
                // Espera o hidden atualizar antes de enviar
                setTimeout(() => this.submit(), 10);
                e.preventDefault();
            });

            iniciarTimer();
        });

        let tempoRestante = 10 * 60;
        const timerElemento = document.getElementById('timer');
        let contador;

        function atualizarTimer() {
            let minutos = Math.floor(tempoRestante / 60);
            let segundos = tempoRestante % 60;

            minutos = minutos < 10 ? '0' + minutos : minutos;
            segundos = segundos < 10 ? '0' + segundos : segundos;

            if (tempoRestante > 0) {
                timerElemento.textContent = `Código expira em: ${minutos}:${segundos}`;
                tempoRestante--;
            } else {
                clearInterval(contador);
                timerElemento.textContent = 'Código expirado';
                timerElemento.style.color = 'red';
            }
        }

        function iniciarTimer() {
            atualizarTimer();
            contador = setInterval(atualizarTimer, 1000);
        }
    </script>






</body>

</html>