<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once('templates/head.php')
?>

<body>
    <main class="app">
        <section class="selecionar">
            <header class="voltar">
                <a href="<?= BASE_URL ?>index.php?url=registrar/sair">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>
            <div class="background_selecionar">
                <img src="<?= BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>
            <div class="container-selecionar">
                <div class="header-selecionar">
                    <h1>Selecione o modo <br>de verificação</h1>
                </div>

                <div class="container-box">
                    <a href="<?= BASE_URL ?>index.php?url=verificarEmail">
                        <div class="box-selecionar">
                            <div class="box-img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="60" fill="#555" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>


                            </div>
                            <div class="box-conteudo">
                                <h2>Verificar via Email</h2>
                                <p>Um código será enviado <br>
                                    por e-mail</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>
</body>

</html>