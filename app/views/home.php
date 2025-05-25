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
    <script src="<?= BASE_URL ?>public/assets/js/script.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iconLinks = document.querySelectorAll(".nav-icon a");

            // Pega o parâmetro "url" atual da URL
            const currentParams = new URLSearchParams(window.location.search);
            const currentUrl = currentParams.get("url");

            iconLinks.forEach(link => {
                const linkParams = new URLSearchParams(link.search);
                const linkUrl = linkParams.get("url");

                if (linkUrl === currentUrl) {
                    link.classList.add("icon-ativo");
                }
            });
        });
    </script>
</body>

</html>