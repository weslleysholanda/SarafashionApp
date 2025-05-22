<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app checkout">
        <?php
        require_once('templates/head.php');
        ?>

        <?php
        require_once('templates/header-title-AreaPagamento.php');
        ?>

        <?php
        require_once('templates/metodoPagamento.php');
        ?>

        <?php
        require_once('templates/formDados.php');
        ?>

        <?php
        require_once('templates/footerCheckout.php');
        ?>
    </main>
</body>

</html>

<script>
    const radioPix = document.getElementById('radio-pix');
    const radioCard = document.getElementById('radio-card');
    const contentPix = document.getElementById('content-pix');
    const contentCard = document.getElementById('content-card');

    function toggle() {
        if (radioPix.checked) {
            contentPix.classList.add('ativo');
            contentCard.classList.remove('ativo');
        } else if (radioCard.checked) {
            contentCard.classList.add('ativo');
            contentPix.classList.remove('ativo');
        } else {
            contentPix.classList.remove('ativo');
            contentCard.classList.remove('ativo');
        }
    }

    radioPix.addEventListener('change', toggle);
    radioCard.addEventListener('change', toggle);
</script>