<section class="campo-info">
    <div id="mensagem-retorno"></div>
    <form id="form-editar-senha">
        <div class="campo-input">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20">
                <path id="Caminho_8" data-name="Caminho 8"
                    d="M68.079,7.826V5.217a5.641,5.641,0,0,0-11.25,0V7.826a1.811,1.811,0,0,0-1.875,1.739v8.7A1.811,1.811,0,0,0,56.829,20h11.25a1.811,1.811,0,0,0,1.875-1.739v-8.7A1.811,1.811,0,0,0,68.079,7.826ZM58.7,5.217a3.761,3.761,0,0,1,7.5,0V7.826H58.7Zm9.375,13.043H56.829v-8.7h11.25Zm-6.563-3.719v1.111a.94.94,0,0,0,1.875,0V14.541a1.716,1.716,0,0,0,.938-1.5,1.88,1.88,0,0,0-3.75,0A1.715,1.715,0,0,0,61.517,14.541Z"
                    transform="translate(-54.954)" fill="#888" />
            </svg>

            <input type="password" name="nova_senha" id="nova-senha" placeholder="Nova Senha: " />
        </div>

        <div class="container_password">
            <div class="forca-senha">
                <span></span><span></span><span></span><span></span>
            </div>

            <div class="erro-senha" id="erro-senha"></div>
        </div>


        <div class="campo-input">
            <svg xmlns="http://www.w3.org/2000/svg" width="15.703" height="14.257" viewBox="0 0 15.703 14.257">
                <path id="check"
                    d="M17.347,5.218a1.32,1.32,0,0,1,2.008.017,1.819,1.819,0,0,1,.053,2.291L11.723,18.493a1.372,1.372,0,0,1-1.032.527,1.357,1.357,0,0,1-1.048-.483l-5.1-5.816a1.8,1.8,0,0,1-.415-1.614A1.56,1.56,0,0,1,5.173,9.918a1.334,1.334,0,0,1,1.414.473l4.034,4.6,6.69-9.726Z"
                    transform="translate(-4.085 -4.763)" fill="#888" />
            </svg>


            <input type="password" name="confirmar_senha" id="confirmar-senha" placeholder="Confirmar senha" />
        </div>

        <div class="erro-senha" id="erro-confirmacao"></div>

        <div class="input-post">
            <button type="submit" id="btn-submit" disabled>Alterar</button>
        </div>

    </form>

</section>