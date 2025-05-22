<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app home-login">
        <?php
        require_once('templates/login.php');
        ?>
    </main>
</body>

<script>
    const senhaInput = document.getElementById('senha');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    eyeClosed.addEventListener('click', () => {
        senhaInput.type = 'text';
        eyeClosed.style.display = 'none';
        eyeOpen.style.display = 'inline';
    });

    eyeOpen.addEventListener('click', () => {
        senhaInput.type = 'password';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'inline';
    });
</script>


</html>