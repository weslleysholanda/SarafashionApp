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

    <script src="<?= BASE_URL ?>public/assets/js/tema.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iconLinks = document.querySelectorAll(".nav-icon a");

            // Obtém o valor do parâmetro "url" da URL atual
            const currentParams = new URLSearchParams(window.location.search);
            const currentUrl = currentParams.get("url");

            iconLinks.forEach(link => {
                const linkHref = link.getAttribute("href"); // Pega o href inteiro
                const linkParams = new URLSearchParams(linkHref.split("?")[1]); // Só a parte dos parâmetros
                const linkUrl = linkParams.get("url");

                // Remove a classe antes
                link.classList.remove("icon-ativo");

                // Compara só o valor do parâmetro "url"
                if (linkUrl === currentUrl || (!currentUrl && linkUrl === "home")) {
                    link.classList.add("icon-ativo");
                }
            });
        });
    </script>
</body>

</html>