<div class="content-info">
    <div class="header-login">
        <h1>Esqueceu a senha? </h1>
        <p>Não se preocupe, enviaremos instruções de redefinição.</p>
    </div>
    <div id="mensagem"></div>
    <div class="campo-info">
        <form id="formRecuperacaoSenha">
            <div class="campo-input">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 13">
                    <path id="Caminho_9" data-name="Caminho 9"
                        d="M15.75,64H2.25A2.21,2.21,0,0,0,0,66.167v8.667A2.21,2.21,0,0,0,2.25,77h13.5A2.21,2.21,0,0,0,18,74.833V66.167A2.21,2.21,0,0,0,15.75,64Zm-3.7,5.782,4.763-3.93a1.01,1.01,0,0,1,.066.315v8.667a.992.992,0,0,1-.045.213Zm3.7-4.7a1.076,1.076,0,0,1,.211.041L9,70.87,2.039,65.125a1.076,1.076,0,0,1,.211-.041ZM1.17,75.045a.98.98,0,0,1-.045-.212V66.167a1.011,1.011,0,0,1,.066-.315l4.761,3.929Zm1.08.872a1.118,1.118,0,0,1-.321-.062l4.878-5.368,1.827,1.508a.576.576,0,0,0,.732,0l1.827-1.508,4.878,5.368a1.112,1.112,0,0,1-.321.062Z"
                        transform="translate(0 -64)" fill="#888" />
                </svg>

                <input type="email" id="email_cliente" placeholder="Digite seu e-mail" required />
            </div>

            <div class="input-post">
                <button type="submit">Enviar</button>
                <a href="<?= BASE_URL ?>index.php?url=login">lembrou a senha? <span>voltar ao login</span></a>
            </div>
        </form>

    </div>
</div>