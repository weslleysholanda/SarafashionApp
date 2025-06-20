<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app home-registrar">
        <section class="registrar">
            <header class="voltar">
                <a href="<?php echo BASE_URL; ?>index.php?url=login">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>

            <div class="background">
                <img src="<?= BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>

            <?php
                require_once('templates/container-registra.php');
            ?>
        </section>
    </main>

    <script>
        const senhaInput = document.getElementById('senha');
        const confirmarSenhaInput = document.getElementById('confirmarSenha');
        const forcaSpans = document.querySelectorAll('.forca-senha span');
        const erroSenha = document.getElementById('erro-senha');
        const erroConfirmacao = document.getElementById('erro-confirmacao');
        const btnSubmit = document.getElementById('btn-submit');

        function verificarForca(senha) {
            let forca = 0;
            if (senha.length >= 8) forca++;
            if (/[A-Z]/.test(senha)) forca++;
            if (/[0-9]/.test(senha)) forca++;
            if (/[\W_]/.test(senha)) forca++;
            return forca;
        }

        function atualizarIndicadores(forca) {
            let mensagem = '';
            let corMensagem = '';

            forcaSpans.forEach((span, index) => {
                if (index < forca) {
                    if (forca <= 1) {
                        span.style.backgroundColor = '#ff0000';
                        mensagem = 'Senha muito fraca. Use mais caracteres.';
                        corMensagem = '#ff0000';
                    } else if (forca <= 3) {
                        span.style.backgroundColor = '#ffa500';
                        mensagem = 'Senha fraca. Use letras maiúsculas, números e símbolos.';
                        corMensagem = '#ffa500';
                    } else {
                        span.style.backgroundColor = '#008000';
                        mensagem = 'Boa senha!';
                        corMensagem = '#008000';
                    }
                } else {
                    span.style.backgroundColor = '#ccc';
                }
            });

            if (senhaInput.value) {
                erroSenha.textContent = mensagem;
                erroSenha.style.color = corMensagem;
            } else {
                erroSenha.textContent = '';
            }
        }

        function validar() {
            const senha = senhaInput.value;
            const confirmacao = confirmarSenhaInput.value;
            const forca = verificarForca(senha);
            atualizarIndicadores(forca);

            if (!senha) {
                erroSenha.textContent = '';
            }

            if (!confirmacao) {
                erroConfirmacao.textContent = '';
            } else if (senha !== confirmacao) {
                erroConfirmacao.textContent = 'As senhas não coincidem.';
            } else {
                erroConfirmacao.textContent = '';
            }

            btnSubmit.disabled = !(forca >= 3 && senha === confirmacao);
        }

        senhaInput.addEventListener('input', validar);
        confirmarSenhaInput.addEventListener('input', validar);

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

        const form = document.getElementById('formPreRegistro');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const botao = form.querySelector('button[type="submit"]');
            botao.disabled = true;
            botao.textContent = 'Registrando...';

            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const senha = document.getElementById('senha').value.trim();
            const confirmarSenha = document.getElementById('confirmarSenha').value.trim();

            if (!nome || !email || !senha || !confirmarSenha) {
                showErrorMessage('Preencha todos os campos.');
                botao.disabled = false;
                botao.textContent = 'Pré-Registrar';
                return;
            }

            if (senha !== confirmarSenha) {
                showErrorMessage('As senhas não coincidem.');
                botao.disabled = false;
                botao.textContent = 'Pré-Registrar';
                return;
            }

            const BASE_URL = '<?= BASE_URL ?>';

            fetch(`${BASE_URL}index.php?url=registrar/preRegistro`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        nome: nome,
                        email: email,
                        senha: senha,
                        confirmar_senha: confirmarSenha
                    })
                })
                .then(async response => {
                    const data = await response.json();

                    if (response.ok && data.sucesso) {
                        window.location.href = '<?= BASE_URL ?>index.php?url=selecionarVerificacao';
                    } else {
                        showErrorMessage(data.erro || 'Erro inesperado. Tente novamente.');
                    }
                })
                .catch(error => {
                    showErrorMessage('Erro na comunicação com o servidor.');
                    console.error('Erro na comunicação:', error);
                })
                .finally(() => {
                    botao.disabled = false;
                    botao.textContent = 'Pré-Registrar';
                });
        });
    </script>
</body>

</html>