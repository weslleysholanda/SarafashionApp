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
</body>

</html>