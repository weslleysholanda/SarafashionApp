<div class="container-Email">
    <div class="header-Email">
        <h1>Digite seu endereço <br> de E-MAIL</h1>
    </div>
    <form action="<?=  BASE_URL ?>index.php?url=verificarEmail/enviarCodigo" method="POST">
        <div class="input-controls">
            <div class="input_password">
                <span class="icone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                </span>
                <input type="email" name="email" placeholder="Digite seu email" required>
            </div>

            <small>Enviaremos um código para o seu e-mail</small>

            <div class="input-post">
                <button>Enviar</button>
            </div>
        </div>
    </form>
</div>