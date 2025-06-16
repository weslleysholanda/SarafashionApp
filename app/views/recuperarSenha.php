<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app home-registrar resetarSenha">
        <section class="registrar">
            <div class="background">
                <img src="<?= BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>

            <?php
            require_once('templates/container-alterarSenha.php');
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
        const mensagemRetorno = document.getElementById('mensagem-retorno');

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

            erroSenha.textContent = senhaInput.value ? mensagem : '';
            erroSenha.style.color = corMensagem;
        }

        function validar() {
            const senha = senhaInput.value;
            const confirmacao = confirmarSenhaInput.value;
            const forca = verificarForca(senha);
            atualizarIndicadores(forca);

            erroConfirmacao.textContent = (!confirmacao) ? '' :
                (senha !== confirmacao) ? 'As senhas não coincidem.' : '';

            btnSubmit.disabled = !(forca >= 3 && senha === confirmacao);
        }

        senhaInput.addEventListener('input', validar);
        confirmarSenhaInput.addEventListener('input', validar);

        document.getElementById('form-alterar-senha').addEventListener('submit', e => {
            e.preventDefault();

            if (btnSubmit.disabled) return;

            const formData = new FormData(e.target);
            btnSubmit.disabled = true;
            btnSubmit.textContent = 'Atualizando...';

            fetch(e.target.action, {
                    method: 'POST',
                    body: formData
                })
                .then(r => r.json())
                .then(d => {
                    mensagemRetorno.innerHTML = ''; 
                    console.log('URL da requisição:', e.target.action);

                    if (d.sucesso) {
                        showCustomAlert('success', d.sucesso);

                        e.target.reset();
                        btnSubmit.textContent = 'Voltar para o Login';
                        btnSubmit.disabled = false;
                        btnSubmit.onclick = () => {
                            window.location.href = '<?= BASE_URL ?>login';
                        };
                    } else {
                        showCustomAlert('error', d.erro || 'Erro desconhecido.');
                        btnSubmit.disabled = false;
                        btnSubmit.textContent = 'Alterar';
                    }
                })
                .catch(err => {
                    showCustomAlert('error', 'Falha de rede, tente novamente.');
                    btnSubmit.disabled = false;
                    btnSubmit.textContent = 'Alterar';
                    console.error(err);
                });

        });

        // Função para exibir alertas personalizados
        function showCustomAlert(tipo, mensagem) {
            const container = document.createElement('div');
            container.classList.add('custom-alert-container');

            const alert = document.createElement('div');
            alert.classList.add('custom-alert', tipo === 'success' ? 'success' : 'error');
            alert.innerHTML = `
            ${mensagem}
            <span class="close-btn" onclick="closeAlert(this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </span>
        `;
            container.appendChild(alert);
            mensagemRetorno.appendChild(container);
        }

        function closeAlert(el) {
            const alertBox = el.closest('.custom-alert-container');
            alertBox.style.opacity = '0';
            alertBox.style.transform = 'translateY(-10px)';
            setTimeout(() => alertBox.remove(), 300);
        }
    </script>



</body>