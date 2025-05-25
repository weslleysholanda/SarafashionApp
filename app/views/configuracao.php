<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app config">
        <?php
        require_once('templates/background-box.php');
        ?>

        <?php
        require_once('templates/settings-container.php')
        ?>

        <?php
        require_once('templates/menuNav.php');
        ?>
    </main>

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