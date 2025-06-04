<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('templates/head.php'); ?>

<body>
    <main class="app verificar">
        <section class="verificarNumero">
            <header class="voltar">
                <a href="<?= BASE_URL ?>index.php?url=selecionarVerificacao">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>

            <div class="background_Numero">
                <img src="<?= BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>

            <div class="container-Numero">
                <div class="header-Numero">
                    <h1>Digite seu número <br> de telefone</h1>
                </div>

                <form onsubmit="enviarSMS(event)">
                    <div class="input-controls">
                        <select class="select-pais" id="pais" onchange="atualizarPrefixo()">
                            <option disabled selected>Escolha o País</option>
                            <option value="+55">Brasil</option>
                            <option value="+1">Estados Unidos</option>
                            <option value="+351">Portugal</option>
                        </select>

                        <div class="input-telefone">
                            <span class="prefixo" id="prefixo">+00</span>
                            <input type="tel" id="telefone" placeholder="Número de celular" required>
                        </div>

                        <small class="mensagem-codigo">Enviaremos um código para o seu número</small>
                    </div>

                    <!-- Recaptcha invisível -->
                    <div id="recaptcha-container"></div>

                    <div class="input-post">
                        <button type="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <?php 
        require_once('script/firebaseSendSMS.php');
    ?>
</body>

</html>