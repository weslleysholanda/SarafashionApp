<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app home-login">
        <?php
        require_once('templates/login.php');
        ?>
    </main>
</body>

<script>
    const senhaInput = document.getElementById('senha');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    eyeClosed.addEventListener('click', () => {
        senhaInput.type = 'text';
        eyeClosed.style.display = 'none';
        eyeOpen.style.display = 'inline';
    });

    eyeOpen.addEventListener('click', () => {
        senhaInput.type = 'password';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'inline';
    });

    const form = document.getElementById('formLogin');
    const mensagemDiv = document.getElementById('mensagem');

    function showErrorMessage(msg) {
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

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const botao = form.querySelector('button');
        botao.disabled = true;
        botao.textContent = 'Logando...';

        const email = form.querySelector('input[name="email"]').value.trim();
        const senha = form.querySelector('input[name="senha"]').value.trim();

        if (!email || !senha) {
            showErrorMessage('Preencha todos os campos.');
            botao.disabled = false;
            botao.textContent = 'Entrar';
            return;
        }

        fetch('<?= BASE_URL ?>index.php?url=login/autenticar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                email: email,
                senha: senha
            })
        })
        .then(async response => {
            const text = await response.text();
            try {
                const data = JSON.parse(text);

                if (response.ok && data.sucesso) {
                    window.location.href = '<?= BASE_URL ?>index.php?url=home';
                } else {
                    showErrorMessage(data.erro || 'Login ou senha inválidos.');
                }
            } catch (error) {
                console.error('Erro na resposta:', text);
                showErrorMessage('Erro na comunicação com o servidor.');
            }
        })
        .catch(error => {
            console.error('Erro na comunicação:', error);
            showErrorMessage('Erro na comunicação com o servidor.');
        })
        .finally(() => {
            botao.disabled = false;
            botao.textContent = 'Entrar';
        });
    });
</script>


</html>