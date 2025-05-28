<div class="container-EmailFa">
    <div class="header-Email_Codigo">
        <h1>Um código de verificação foi enviado para o e-mail <?= htmlspecialchars($email) ?></h1>
    </div>
    <form action="<?= BASE_URL ?>index.php?url=confirmarCodigoEmail/validarCodigo" method="POST" id="form-codigo">
        <div class="codigo-container">
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input2')" id="input1" onpaste="handlePaste(event)" autocomplete="off" />
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input3')" id="input2" autocomplete="off" />
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input4')" id="input3" autocomplete="off" />
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input5')" id="input4" autocomplete="off" />
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " oninput="nextInput(this, 'input6')" id="input5" autocomplete="off" />
                <div class="linha-baixo"></div>
            </div>
            <div class="codigo-wrapper">
                <input type="text" maxlength="1" class="codigo-input" placeholder=" " id="input6" autocomplete="off" />
                <div class="linha-baixo"></div>
            </div>
        </div>

        <!-- Input hidden para enviar o código completo -->
        <input type="hidden" name="codigo_verificacao" id="codigo_verificacao" />

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

<script>
    // Função para avançar automaticamente para o próximo input
    function nextInput(atual, proximoId) {
        if (atual.value.length === 1) {
            const proximo = document.getElementById(proximoId);
            if (proximo) {
                proximo.focus();
            }
        }
    }

    // Função para permitir colar o código inteiro no primeiro input
    function handlePaste(e) {
        e.preventDefault();
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        const inputs = document.querySelectorAll('.codigo-input');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = paste[i] || '';
        }
        // Foca no último input preenchido
        inputs[Math.min(paste.length, inputs.length) - 1].focus();
    }

    // Timer de 10 minutos
    const timerEl = document.getElementById("timer");
    let totalSegundos = 600; // 10 minutos

    const formatarTempo = (segundos) => {
        const min = Math.floor(segundos / 60);
        const sec = segundos % 60;
        return `${min}:${sec.toString().padStart(2, '0')}`;
    };

    const atualizarTimer = () => {
        if (totalSegundos > 0) {
            timerEl.textContent = "Código expira em: " + formatarTempo(totalSegundos);
            totalSegundos--;
        } else {
            clearInterval(timerInterval);
            timerEl.textContent = "Código expirado";
            timerEl.style.color = "red";
        }
    };

    const timerInterval = setInterval(atualizarTimer, 1000);

    // Juntar os inputs em um campo hidden antes de enviar o form
    const form = document.getElementById('form-codigo');
    form.addEventListener('submit', (e) => {
        const inputs = document.querySelectorAll('.codigo-input');
        let codigoCompleto = '';
        inputs.forEach(input => {
            codigoCompleto += input.value.trim();
        });

        if (codigoCompleto.length !== 6) {
            e.preventDefault();
            alert('Por favor, preencha o código de 6 dígitos completo.');
            return false;
        }

        document.getElementById('codigo_verificacao').value = codigoCompleto;
    });
</script>
