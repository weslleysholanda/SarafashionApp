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

    <script>
        const options = document.querySelectorAll('.mode-toggle .option');

        const celulares = {
            sistema: document.querySelector('.celular-system'),
            claro: document.querySelector('.celular-light'),
            escuro: document.querySelector('.celular-dark')
        };

        function clearActives() {
            // Remove active das opções
            options.forEach(o => o.classList.remove('active'));

            // Remove active dos celulares
            Object.values(celulares).forEach(cel => cel.classList.remove('active'));
        }

        function activateMode(mode) {
            const opt = document.querySelector(`.mode-toggle .option[data-mode="${mode}"]`);
            const cel = celulares[mode];

            if (opt && cel) {
                opt.classList.add('active');
                cel.classList.add('active');
            }
        }

        // Adicionar eventos de clique
        options.forEach(opt => {
            opt.addEventListener('click', () => {
                const mode = opt.getAttribute('data-mode');
                clearActives();
                activateMode(mode);
            });
        });

        // Quando carregar a página, ativa o modo que já tem .active na opção
        window.addEventListener('DOMContentLoaded', () => {
            const activeOpt = document.querySelector('.mode-toggle .option.active');
            const mode = activeOpt ? activeOpt.getAttribute('data-mode') : 'sistema';
            clearActives();
            activateMode(mode);
        });

        function toggleDarkMode() {
            const checkbox = document.getElementById('darkToggle');
            checkbox.checked = !checkbox.checked;
        }
    </script>
</body>

</html>