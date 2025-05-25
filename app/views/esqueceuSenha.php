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
                <img src="<?= BASE_URL?>public/assets/img/login-light.png" alt="">
                <div class="logo">
                    <img src="<?= BASE_URL?>public/assets/img/logo_sarafashion.svg" alt="">
                </div>
            </div>
            <div class="container-login">
                <div class="header-login">
                    <h1>Esqueceu a senha? </h1>
                    <p>Não se preocupe, enviaremos instruções de redefinição.</p>
                </div>
                <div class="campo-info">
                    <form action="">
                        <div class="campo-input">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 13">
                                <path id="Caminho_9" data-name="Caminho 9"
                                    d="M15.75,64H2.25A2.21,2.21,0,0,0,0,66.167v8.667A2.21,2.21,0,0,0,2.25,77h13.5A2.21,2.21,0,0,0,18,74.833V66.167A2.21,2.21,0,0,0,15.75,64Zm-3.7,5.782,4.763-3.93a1.01,1.01,0,0,1,.066.315v8.667a.992.992,0,0,1-.045.213Zm3.7-4.7a1.076,1.076,0,0,1,.211.041L9,70.87,2.039,65.125a1.076,1.076,0,0,1,.211-.041ZM1.17,75.045a.98.98,0,0,1-.045-.212V66.167a1.011,1.011,0,0,1,.066-.315l4.761,3.929Zm1.08.872a1.118,1.118,0,0,1-.321-.062l4.878-5.368,1.827,1.508a.576.576,0,0,0,.732,0l1.827-1.508,4.878,5.368a1.112,1.112,0,0,1-.321.062Z"
                                    transform="translate(0 -64)" fill="#888" />
                            </svg>

                            <input type="email" placeholder="Email:" />
                        </div>

                        <div class="input-post">
                            <button>Enviar</button>
                            <a href="<?= BASE_URL?>index.php?url=login">lembrou a senha? <span>voltar ao login</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>