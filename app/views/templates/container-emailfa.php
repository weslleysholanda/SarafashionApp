<div class="container-EmailFa">
    <div class="header-Email_Codigo">
        <h1>Um código de verificação foi enviado para o e-mail <?= htmlspecialchars($email) ?></h1>
    </div>
    <form action="<?= BASE_URL ?>index.php?url=confirmarCodigoEmail/validarCodigo" method="POST" id="form-codigo">
        <div class="codigo-container">
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input2')" id="input1" onpaste="handlePaste(event)" autocomplete="one-time-code" />
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input3')" id="input2" autocomplete="one-time-code"/>
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input4')" id="input3" autocomplete="one-time-code"/>
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input5')" id="input4" autocomplete="one-time-code"/>
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input6')" id="input5" autocomplete="one-time-code"/>
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " id="input6" autocomplete="one-time-code"/>
                <div class="linha-baixo"></div>
            </div>
        </div>

        <!-- Input hidden para enviar o código completo -->
        <input type="text" name="codigo_verificacao" id="codigo_verificacao" style="display:none;"/>

        <div class="timer" id="timer-container">
            <span id="timer">Código expira em: 10:00</span>
        </div>
        <div class="informacao">
            <p><span>Ao assinar você concorda</span> com seus termos de <span>uso</span> e <br>
                <span>política de privacidade</span>.
            </p>
        </div>

        <div class="input-post">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div>