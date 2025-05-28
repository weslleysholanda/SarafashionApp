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

        function nextInput(current, nextId) {
            if (current.value.length === current.maxLength) {
                const next = document.getElementById(nextId);
                if (next) next.focus();
            }
        }

        function handlePaste(event) {
            event.preventDefault();
            const pastedData = (event.clipboardData || window.clipboardData).getData('text');
            const cleanData = pastedData.replace(/\D/g, ''); // Remove tudo que não for número

            const inputs = document.querySelectorAll('.codigo-input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = cleanData[i] || '';
            }

            // Move o foco para o próximo vazio (opcional)
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value === '') {
                    inputs[i].focus();
                    break;
                }
            }
        }

       
    </script>
</body>

</html>