<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app home-login perfil editar-perfil esqueceuSenha">
        <section class="login">
            <header class="voltar">
                <a href="<?php echo BASE_URL; ?>index.php?url=login">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>
            <div class="background_login">
                <img src="<?= BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>
            <div class="container-login">
                <?php
                require_once('templates/containerEsqueceuSenha.php')
                ?>
            </div>
        </section>
    </main>

    <script>
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

        document.getElementById('formRecuperacaoSenha').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email_cliente').value.trim();

            if (!email) {
                showErrorMessage('Por favor, insira um e-mail válido.');
                return;
            }

            fetch('<?= BASE_URL ?>index.php?url=esqueceuSenha/enviarCodigoRecuperacao', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        email_cliente: email
                    })
                })
                .then(async response => {
                    const data = await response.json();

                    if (response.status === 200 && data.sucesso) {
                        window.location.href = '<?=  BASE_URL ?>index.php?url=confirmarCodigoRecuperacao';
                    } else {
                        showErrorMessage(data.erro || 'Erro inesperado. Tente novamente.');
                    }
                })
                .catch((error) => {
                    // console.error('Erro na comunicação:', error);
                    showErrorMessage('Erro na comunicação com o servidor.');
                });

        });
    </script>
</body>

</html>