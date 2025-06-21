<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app tema favorito">
        <section class="background-favorito">
            <div class="background-box">
                <div class="header-nav">
                    <header class="voltar">
                        <a href="<?= BASE_URL ?>index.php?url=home">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                                <path id="Caminho_6" data-name="Caminho 6"
                                    d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                                    transform="translate(-0.025 -31.925)" />
                            </svg>
                        </a>

                    </header>
                </div>
                <div class="tema-title">
                    <h1>Favoritos</h1>
                </div>
            </div>
        </section>

        <section class="search-bar">
            <div class="search-wrapper">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="19.334"
                    viewBox="0 0 25 19.334">
                    <g transform="translate(640.118 128.549)">
                        <rect width="25" height="18.952" transform="translate(-640.118 -128.328)" fill="none" />
                        <g transform="translate(-637.09 -128.549)">
                            <path
                                d="M39.535,41.094c-1.366,1.011,2.881-3.332,1.673-1.681.03,0-.026.089-.214.319,0,0,3.227,3.206,4.812,4.837.55.595-.442,1.782-1.117,1.162-1.435-1.392-4.829-4.851-4.835-4.857Z"
                                transform="translate(-26.68 -26.571)" fill="#bcbcbc" fill-rule="evenodd" />
                            <path
                                d="M16.173,24.27a8.1,8.1,0,0,0,7.955-9.094,7.984,7.984,0,0,0-8.006-7.05A8.285,8.285,0,0,0,8.808,12.8a8.1,8.1,0,0,0,0,6.8A8.279,8.279,0,0,0,16.07,24.27Zm-.1-1.346a6.93,6.93,0,0,1-6.57-5.5,6.734,6.734,0,0,1,9.178-7.434,6.9,6.9,0,0,1,4.108,5.361,6.758,6.758,0,0,1-6.629,7.577Z"
                                transform="translate(-8.061 -8.126)" fill="#bcbcbc" />
                        </g>
                    </g>
                </svg>
                <input type="text" class="search-bar" placeholder="Buscar um produto...">
            </div>
        </section>

        <div id="mensagem"></div>

        <section class="produtoFavoritado">
            <div class="product-list">
                <?php if (!empty($favoritos)): ?>
                    <?php foreach ($favoritos as $produto): ?>
                        <div class="product-card">
                            <div class="heart" onclick="toggleFavorito(<?= $produto['id_produto'] ?>, this)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                                    <g transform="translate(-0.5 -0.495)">
                                        <path d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z" fill="none" stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                                    </g>
                                </svg>
                            </div>
                            <div class="card-img">
                                <img src="<?= BASE_FOTO ?><?= $produto['foto_galeria'] ?>" alt="<?= htmlspecialchars($produto['alt_foto_galeria']) ?>">
                            </div>

                            <h3><?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?> </h3>
                            <p class="category"><?= htmlspecialchars($produto['categoria_produto'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="price">
                                <span class="old-price"><?= htmlspecialchars($produto['preco_anterior'], ENT_QUOTES, 'UTF-8') ?></span>
                                <span class="new-price"><?= htmlspecialchars($produto['preco_produto'], ENT_QUOTES, 'UTF-8') ?></span>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="sem-favoritos">
                        <p>Você ainda não favoritou nenhum produto.</p>
                    </div>
                <?php endif; ?>
            </div>

        </section>
    </main>
</body>

<script>
    function toggleFavorito(idProduto, el) {
        const heart = el;
        const token = "<?= $_SESSION['token'] ?>";

        fetch("<?= BASE_API ?>toggleFavorito", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer " + token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id_produto=" + encodeURIComponent(idProduto)
            })
            .then(async response => {
                const texto = await response.text();
                let data;

                try {
                    data = JSON.parse(texto);
                } catch (e) {
                    console.error("Erro ao parsear JSON da resposta:", texto);
                    showMessage("Erro interno ao processar favorito.", 'error');
                    return;
                }

                if (response.ok && data.status === 'adicionado') {
                    heart.classList.add('favoritado');
                    showMessage("Produto adicionado aos favoritos.", 'success');
                } else if (response.ok && data.status === 'removido') {
                    heart.closest('.product-card').remove();
                    showMessage("Produto removido dos favoritos.", 'success');

                    // Se todos foram removidos, exibir mensagem
                    if (document.querySelectorAll('.product-card').length === 0) {
                        document.querySelector('.product-list').innerHTML = `
                    <div class="sem-favoritos">
                        <p>Você ainda não favoritou nenhum produto.</p>
                    </div>
                `;
                    }
                } else {
                    showMessage(data.erro || "Ação não concluída.", 'error');
                }
            })
            .catch(error => {
                console.error("Erro ao fazer requisição:", error);
                showMessage("Erro ao conectar com o servidor.", 'error');
            });
    }

    function showMessage(msg, tipo = 'success') {
        const mensagemDiv = document.getElementById('mensagem');

        mensagemDiv.innerHTML = `
        <div class="custom-alert-container">
            <div class="custom-alert ${tipo}">
                ${msg}
                <span class="close-btn" onclick="closeAlert(this);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </span>
            </div>
        </div>
    `;
    }

    function closeAlert(el) {
        const alertBox = el.closest('.custom-alert-container');
        alertBox.style.opacity = '0';
        alertBox.style.transform = 'translateY(-10px)';
        setTimeout(() => alertBox.remove(), 300);
    }
</script>



</html>