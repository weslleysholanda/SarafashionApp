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

        document.getElementById('form-alterar-senha').addEventListener('submit', e => {
            e.preventDefault();

            if (btnSubmit.disabled) return;

            const formData = new FormData(e.target);
            btnSubmit.disabled = true;
            btnSubmit.textContent = 'Atualizando';

            fetch(e.target.action, {
                    method: 'POST',
                    body: formData
                })
                .then(r => r.json())
                .then(d => {
                    if (d.sucesso) {
                        if (typeof showMsg === 'function') {
                            showMsg('success', d.sucesso);
                        } else {
                            alert(d.sucesso); // fallback
                        }

                        e.target.reset();
                        setTimeout(() => {
                            location.href = '<?= BASE_URL ?>index.php?url=login';
                        }, 3000);
                    } else {
                        if (typeof showMsg === 'function') {
                            showMsg('error', d.erro || 'Erro desconhecido.');
                        } else {
                            alert(d.erro || 'Erro desconhecido.'); // fallback
                        }

                        btnSubmit.disabled = false;
                        btnSubmit.textContent = 'Alterar';
                    }
                })
                .catch(err => {
                    if (typeof showMsg === 'function') {
                        showMsg('error', 'Falha de rede, tente novamente.');
                    } else {
                        alert('Falha de rede, tente novamente.');
                    }

                    btnSubmit.disabled = false;
                    btnSubmit.textContent = 'Alterar';
                    console.error(err);
                });
        });
    </script>

</body>