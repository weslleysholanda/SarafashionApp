<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app perfil editar-perfil alterar-senha">
        <?php
        require_once('templates/header-perfil.php');
        ?>

        <?php
        require_once('templates/perfil-user.php');
        ?>

        <?php
        require_once('templates/campo-info.php');
        ?>
    </main>
    <script>
        const senhaInput = document.getElementById('nova-senha');
        const confirmarSenhaInput = document.getElementById('confirmar-senha');
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

        function exibirMensagem(mensagem, tipo) {
            const msgDiv = document.getElementById('mensagem-retorno');
            msgDiv.innerHTML = `
                <div class="custom-alert-container">
                    <div class="custom-alert ${tipo}">
                        ${mensagem}
                        <span class="close-btn" onclick="closeAlert(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg>
                        </span>
                    </div>
                </div>
            `;
        }

        function resetarValidacoes() {
            // Resetar os indicadores de força
            forcaSpans.forEach(span => {
                span.style.backgroundColor = '#ccc';
            });

            // Limpar mensagens de erro
            erroSenha.textContent = '';
            erroConfirmacao.textContent = '';

            // Desabilitar o botão (opcional, se quiser resetar também)
            btnSubmit.disabled = true;
        }

        function closeAlert(el) {
            const alertBox = el.closest('.custom-alert-container');
            alertBox.style.opacity = '0';
            alertBox.style.transform = 'translateY(-10px)';
            setTimeout(() => alertBox.remove(), 300);
        }

        document.getElementById('form-editar-senha').addEventListener('submit', function(e) {
            e.preventDefault();

            const senha = document.getElementById('nova-senha').value;
            const confirmar = document.getElementById('confirmar-senha').value;

            if (senha.length < 6) {
                exibirMensagem("A senha deve ter no mínimo 6 caracteres.", "error");
                return;
            }

            if (senha !== confirmar) {
                exibirMensagem("As senhas não coincidem.", "error");
                return;
            }

            fetch("<?= BASE_URL ?>index.php?url=editarSenha/alterarSenha", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: new URLSearchParams({
                        _method: "PATCH",
                        nova_senha: senha
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.mensagem) {
                        exibirMensagem(data.mensagem, "success");
                        document.getElementById('form-editar-senha').reset();
                        resetarValidacoes();
                    } else {
                        exibirMensagem(data.erro || "Erro ao alterar a senha.", "error");
                    }
                })
                .catch(() => {
                    exibirMensagem("Erro de comunicação com o servidor.", "error");
                });

        });
    </script>
</body>

</html>