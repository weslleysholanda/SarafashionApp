<script>
    $(document).ready(function() {
        $('#telefone').mask('(00)00000-0000');
    });

    // Configuração do Firebase
    const firebaseConfig = {
        apiKey: "AIzaSyDjefY5HuBD1M4rToQHcPWjGqM6grLrsP8",
        authDomain: "sarafashion-f0913.firebaseapp.com",
        projectId: "sarafashion-f0913",
        storageBucket: "sarafashion-f0913.firebasestorage.app",
        messagingSenderId: "1033840793739",
        appId: "1:1033840793739:web:e45e1b5938c9990fdc1c8e"
    };
    firebase.initializeApp(firebaseConfig);

    // Inicializar reCAPTCHA invisível
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        size: 'invisible',
        callback: function(response) {
            // Executado automaticamente
        }
    });

    // Atualiza o prefixo ao selecionar o país
    function atualizarPrefixo() {
        const pais = document.getElementById("pais");
        const prefixo = document.getElementById("prefixo");
        prefixo.textContent = pais.value;
    }

    // Enviar SMS
    function enviarSMS(event) {
        event.preventDefault();

        const prefixo = document.getElementById("prefixo").textContent;
        const numero = document.getElementById("telefone").value;
        const telefoneCompleto = prefixo + numero;

        firebase.auth().signInWithPhoneNumber(telefoneCompleto, window.recaptchaVerifier)
            .then((confirmationResult) => {
                localStorage.setItem('verificacao', JSON.stringify(confirmationResult));
                localStorage.setItem('numero', telefoneCompleto);
                window.location.href = "<?= BASE_URL ?>index.php?url=register";
            })
            .catch((error) => {
                alert("Erro ao enviar SMS: " + error.message);
            });
    }
</script>