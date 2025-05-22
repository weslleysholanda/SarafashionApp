<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app home-app">
        <?php
            require_once('templates/home-background.php');
        ?>

        <div class="of-height-100"></div>
        <?php 
            require_once('templates/promocoes-slider.php');
        ?>


        <div class="of-height-50"></div>
        <?php 
            require_once('templates/menuNav.php');
        ?>

        <?php 
            require_once('templates/catalogoServico.php');
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>