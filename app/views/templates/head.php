<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>vendors/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script>
        // Aplica o tema salvo no localStorage antes de carregar o conteúdo
        (function() {
            const savedMode = localStorage.getItem('modoSelecionado') || 'sistema';
            document.documentElement.setAttribute('data-mode', savedMode);
        })();
    </script>
    <title><?= $titulo; ?></title>
</head>