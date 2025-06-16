<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app tema">

        <?php
        require_once('templates/background-tema.php');
        ?>

        <?php
        require_once('templates/alterarTema.php');
        ?>

        <?php
        require_once('templates/picTemas.php');
        ?>

        <?php
        require_once('templates/darkAbsoluto.php')
        ?>
    </main>

    <script src="<?= BASE_URL ?>public/assets/js/tema.js"></script>

</body>

</html>