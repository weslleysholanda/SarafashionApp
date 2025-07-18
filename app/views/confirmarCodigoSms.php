<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once('templates/head.php')
?>
<body>
    <main class="app authSms">
        <section class="codigoSms">
            <header class="voltar">
                <a href="login.html">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>
            <div class="background_SmsNumero">
                <img src="<?=  BASE_URL ?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?=  BASE_URL ?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>
            <div class="container-SMS">
                <div class="header-Numero_Codigo">
                    <h1>Um código de verificação é enviado <br>
                        para o número fornecido lorem ipsum</h1>
                </div>
                <form action="">
                    <div class="codigo-container">
                        <div class="codigo-wrapper">
                            <input type="text" maxlength="1" class="codigo-input" placeholder=" ">
                            <div class="linha-baixo"></div>
                        </div>
                        <div class="codigo-wrapper">
                            <input type="text" maxlength="1" class="codigo-input" placeholder=" ">
                            <div class="linha-baixo"></div>
                        </div>
                        <div class="codigo-wrapper">
                            <input type="text" maxlength="1" class="codigo-input" placeholder=" ">
                            <div class="linha-baixo"></div>
                        </div>
                        <div class="codigo-wrapper">
                            <input type="text" maxlength="1" class="codigo-input" placeholder=" ">
                            <div class="linha-baixo"></div>
                        </div>
                        <div class="codigo-wrapper">
                            <input type="text" maxlength="1" class="codigo-input" placeholder=" ">
                            <div class="linha-baixo"></div>
                        </div>
                    </div>
                </form>
                <div class="informacao">
                    <p><span>Ao assinar você concorda</span> com seus termos de <span>uso</span> e <br>
                        <span>política de privacidade</span>.
                    </p>
                </div>
                <div class="input-post">
                    <button>Entrar</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>