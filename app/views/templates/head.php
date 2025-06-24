<head>
    <meta charset="UTF-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>vendors/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="manifest" href="<?= BASE_URL ?>public/manifest.json">
    <script>
        // Aplica o tema salvo no localStorage antes de carregar o conteúdo
        (function() {
            const savedMode = localStorage.getItem('modoSelecionado') || 'sistema';
            document.documentElement.setAttribute('data-mode', savedMode);
        })();
    </script>
    <title><?= $titulo; ?></title>
</head>