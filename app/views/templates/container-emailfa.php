<div class="container-EmailFa">
    <div class="header-Email_Codigo">
        <h1>Um código de verificação foi enviado
            para o e-mail <?= $email ?></h1>
    </div>
    <form action="">
        <div class="codigo-container">
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input2')" id="input1" onpaste="handlePaste(event)">
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input3')" id="input2">
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input4')" id="input3">
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input5')" id="input4">
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input6')" id="input5">
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " id="input6">
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
        <button>Enviar</button>
    </div>
</div>