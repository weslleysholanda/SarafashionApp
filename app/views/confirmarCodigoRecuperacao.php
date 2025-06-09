<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app">
        <section class="codigoEmail">
            <header class="voltar">
                <a href="<?= BASE_URL ?>index.php?url=esqueceuSenha/sair">
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
            require_once('templates/container_recuperacaoFa.php')
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

        function showErrorMessage(msg) {
            const mensagemDiv = document.getElementById('mensagem');
            mensagemDiv.innerHTML = `
                <div class="custom-alert-container">
                    <div class="custom-alert error">
                        ${msg}
                        <span class="close-btn" onclick="closeAlert(this);">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg>
                        </span>
                    </div>
                </div>
            `;
        }

        function closeAlert(el) {
            const alertBox = el.closest('.custom-alert-container');
            alertBox.style.opacity = '0';
            alertBox.style.transform = 'translateY(-10px)';
            setTimeout(() => alertBox.remove(), 300);
        }



        const form = document.getElementById('form-codigo');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Junta os dígitos no campo hidden
            updateHiddenInput();

            const formData = new FormData(form);

            // Desabilita o botão enquanto envia
            const botao = form.querySelector('button[type="submit"]');
            botao.disabled = true;
            botao.textContent = 'Verificando...';

            fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.sucesso) {
                        // Redireciona se o código for válido
                        window.location.href = "<?= BASE_URL ?>index.php?url=alterarSenha";
                    } else {
                        // Exibe erro na tela
                        showErrorMessage(data.erro || "Código incorreto ou expirado.");
                    }
                })
                .catch(err => {
                    showErrorMessage("Erro de conexão. Tente novamente.");
                    console.error('[AJAX erro]', err);
                })
                .finally(() => {
                    // Reativa o botão
                    botao.disabled = false;
                    botao.textContent = 'Verificar Código';
                });
        });
    </script>

</body>

</html>