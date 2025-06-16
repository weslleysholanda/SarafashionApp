<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
  <main class="app perfil">
    <?php
    require_once('templates/header-perfil-list.php');
    ?>

    <div class="of-height-10"></div>

    <?php
    require_once('templates/perfilUserEditar.php');
    ?>

    <?php
    require_once('templates/campoInfoList.php');
    ?>
  </main>
  <script src="<?= BASE_URL ?>public/assets/js/tema.js"></script>
  <script>
    function closeAlert(el) {
      const alertBox = el.closest('.custom-alert-container');
      alertBox.style.opacity = '0';
      alertBox.style.transform = 'translateY(-10px)';
      setTimeout(() => alertBox.remove(), 300);
    }
  </script>
</body>

</html>