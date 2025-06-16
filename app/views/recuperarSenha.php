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
        const tokenInput = document.getElementById('token');
        const btnSubmit = document.getElementById('btn-submit');
        const mensagemRetorno = document.getElementById('mensagem-retorno');
        const forcaSpans = document.querySelectorAll('.forca-senha span');
        const erroSenha = document.getElementById('erro-senha');
        const erroConfirmacao = document.getElementById('erro-confirmacao');

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

        function validarCampos() {
            const senha = senhaInput.value;
            const confirmar = confirmarSenhaInput.value;
            const forca = verificarForca(senha);

            atualizarIndicadores(forca);

            erroConfirmacao.textContent = (!confirmar) ? '' :
                (senha !== confirmar) ? 'As senhas não coincidem.' : '';

            btnSubmit.disabled = !(forca >= 3 && senha === confirmar);
        }

        senhaInput.addEventListener('input', validarCampos);
        confirmarSenhaInput.addEventListener('input', validarCampos);

        document.getElementById('form-alterar-senha').addEventListener('submit', async (e) => {
            e.preventDefault();

            if (btnSubmit.disabled) return;

            btnSubmit.disabled = true;
            btnSubmit.textContent = 'Atualizando...';

            const formData = new FormData();
            formData.append('token', tokenInput.value);
            formData.append('nova_senha', senhaInput.value);
            formData.append('confirmar_senha', confirmarSenhaInput.value);

            try {
                const response = await fetch('<?= BASE_API ?>alterarSenha', {
                    method: 'POST',
                    body: formData,
                });

                const text = await response.text();
                let data;

                try {
                    data = JSON.parse(text);
                } catch {
                    throw new Error('Resposta não é JSON:\n' + text);
                }

                mensagemRetorno.innerHTML = '';

                if (data.sucesso) {
                    showCustomAlert('success', data.sucesso);
                    senhaInput.value = '';
                    confirmarSenhaInput.value = '';
                    btnSubmit.textContent = 'Voltar para o Login';
                    btnSubmit.disabled = false;
                    btnSubmit.onclick = () => {
                        window.location.href = '<?= BASE_URL ?>index.php?url=login';
                    };
                } else {
                    showCustomAlert('error', data.erro || 'Erro desconhecido.');
                    btnSubmit.disabled = false;
                    btnSubmit.textContent = 'Alterar';
                }

            } catch (err) {
                console.error(err);
                showCustomAlert('error', 'Erro na requisição. Verifique sua conexão.');
                btnSubmit.disabled = false;
                btnSubmit.textContent = 'Alterar';
            }
        });

        function showCustomAlert(tipo, mensagem) {
            const container = document.createElement('div');
            container.classList.add('custom-alert-container');

            const alert = document.createElement('div');
            alert.classList.add('custom-alert', tipo === 'success' ? 'success' : 'error');
            alert.innerHTML = `
            ${mensagem}
            <span class="close-btn" onclick="closeAlert(this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"></path>
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