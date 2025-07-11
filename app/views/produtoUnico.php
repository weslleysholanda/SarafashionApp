<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>

    <main class="app perfil produtoInfo">
        <section class="header-perfil">
            <div class="header-nav">
                <header class="voltar">
                    <a href="<?= BASE_URL ?>index.php?url=loja">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                            <path id="Caminho_6" data-name="Caminho 6"
                                d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                                transform="translate(-0.025 -31.925)" />
                        </svg>
                    </a>

                </header>
            </div>

        </section>
        <section class="productBox">
            <div class="swiper destaqueProduto">
                <div class="swiper-wrapper">
                    <?php if (!empty($produto['imagens'])): ?>
                        <?php foreach ($produto['imagens'] as $imagem): ?>
                            <div class="swiper-slide">
                                <img src="<?= BASE_FOTO . $imagem ?>" alt="<?= htmlspecialchars($produto['nome_produto']) ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="swiper-slide">
                            <img src="<?= BASE_FOTO ?>produto/sem-foto-produto.png" alt="Sem imagem">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </section>


        <div class="of-height-60"></div>
        <section class="primaryContent">
            <div class="productDetails">
                <div class="details">
                    <h2><?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, "UTF-8") ?></h2>
                    <div class="heart <?= !empty($produto['favoritado']) ? 'favoritado' : '' ?>" data-id="<?= $produto['id_produto'] ?>" onclick="toggleFavorito(<?= $produto['id_produto'] ?>, this)">

                        <svg xmlns="http://www.w3.org/2000/svg" width="23.543" height="21.717"
                            viewBox="0 0 23.543 21.717">
                            <path id="Caminho_179" data-name="Caminho 179"
                                d="M12.273,4.079l0,0,0,0,0,0,0,0L11.048,2.8a5.707,5.707,0,0,0-8.325,0,6.358,6.358,0,0,0,0,8.705l9.548,9.986L21.82,11.5a6.358,6.358,0,0,0,0-8.705,5.707,5.707,0,0,0-8.325,0L12.27,4.079l0,0,0,0,0,0,0,0Z"
                                transform="translate(-0.5 -0.495)" fill="none" stroke="#c59d5f" stroke-miterlimit="10"
                                stroke-width="1" />
                        </svg>

                    </div>
                </div>
                <div class="productPrice">
                    <span class="old">R$<?= htmlspecialchars($produto['preco_anterior'], ENT_QUOTES, "UTF-8") ?></span>
                    <span class="new">R$<?= htmlspecialchars($produto['preco_produto'], ENT_QUOTES, "UTF-8") ?></span>
                </div>

                <!-- <div class="userFeedback">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.347" height="14.596"
                            viewBox="0 0 15.347 14.596">
                            <path id="star_77949"
                                d="M7.674,10.441l2.371,4.8,5.3.77-3.837,3.74.905,5.281L7.674,22.544,2.931,25.037l.906-5.281L0,16.016l5.3-.77Z"
                                transform="translate(0 -10.441)" fill="#fac917" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.347" height="14.596"
                            viewBox="0 0 15.347 14.596">
                            <path id="star_77949"
                                d="M7.674,10.441l2.371,4.8,5.3.77-3.837,3.74.905,5.281L7.674,22.544,2.931,25.037l.906-5.281L0,16.016l5.3-.77Z"
                                transform="translate(0 -10.441)" fill="#fac917" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.347" height="14.596"
                            viewBox="0 0 15.347 14.596">
                            <path id="star_77949"
                                d="M7.674,10.441l2.371,4.8,5.3.77-3.837,3.74.905,5.281L7.674,22.544,2.931,25.037l.906-5.281L0,16.016l5.3-.77Z"
                                transform="translate(0 -10.441)" fill="#fac917" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.347" height="14.596"
                            viewBox="0 0 15.347 14.596">
                            <path id="star_77949"
                                d="M7.674,10.441l2.371,4.8,5.3.77-3.837,3.74.905,5.281L7.674,22.544,2.931,25.037l.906-5.281L0,16.016l5.3-.77Z"
                                transform="translate(0 -10.441)" fill="#fac917" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.347" height="14.596"
                            viewBox="0 0 15.347 14.596">
                            <path id="star_77949"
                                d="M7.674,10.441l2.371,4.8,5.3.77-3.837,3.74.905,5.281L7.674,22.544,2.931,25.037l.906-5.281L0,16.016l5.3-.77Z"
                                transform="translate(0 -10.441)" fill="#fac917" />
                        </svg>

                    </div>
                    <span class="contagem-review">6</span>
                </div> -->
            </div>
        </section>

        <section class="secondaryContent">
            <div>
                <p class="productInfo">
                    <?= htmlspecialchars($produto['descricao_produto'], ENT_QUOTES, "UTF-8") ?>
                </p>

                <!-- <p class="dadosEnvio"><strong class="tituloEnv">Frete Grátis</strong><br>
                    To Bangladesh from seller via china. Shipping method online.
                </p> -->
            </div>
        </section>


        <div class="payment">
            <div class="paymentProtection">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.386" height="17.185" viewBox="0 0 15.386 17.185">
                        <g id="Grupo_357" data-name="Grupo 357" transform="translate(-15 -836)">
                            <path id="Caminho_255" data-name="Caminho 255"
                                d="M9.943,17.56a1.549,1.549,0,0,1-.812-.222L6.069,15.547A7.461,7.461,0,0,1,2.25,9.115V4.222A1.614,1.614,0,0,1,3.3,2.708L9.388.473a1.614,1.614,0,0,1,1.11,0l6.084,2.235a1.614,1.614,0,0,1,1.054,1.513V9.115a7.461,7.461,0,0,1-3.819,6.432l-3.062,1.791a1.549,1.549,0,0,1-.812.222Zm0-15.921a.338.338,0,0,0-.121,0L3.738,3.884a.348.348,0,0,0-.227.338V9.115A6.2,6.2,0,0,0,6.7,14.457l3.062,1.8a.368.368,0,0,0,.353,0l3.062-1.8h0a6.2,6.2,0,0,0,3.193-5.342V4.222a.348.348,0,0,0-.227-.328L10.064,1.659a.338.338,0,0,0-.121-.02Z"
                                transform="translate(12.75 835.625)" fill="#c59d5f" />
                            <path id="Caminho_256" data-name="Caminho 256"
                                d="M13.661,17.542a.656.656,0,0,1-.409-.146L11.1,15.579a.632.632,0,0,1,.812-.969l1.69,1.423,2.886-3.178a.632.632,0,0,1,.938.848l-3.269,3.632A.641.641,0,0,1,13.661,17.542Z"
                                transform="translate(8.478 829.544)" fill="#c59d5f" />
                        </g>
                    </svg>

                </span>
                <strong>Secure Payment Method.</strong>
            </div>
        </div>

        <section class="thirdContent">
            <div class="details">
                <h3>Especificação</h3>
                <p>
                    <?= htmlspecialchars($produto['informacao_produto'], ENT_QUOTES, "UTF-8") ?>
                </p>
            </div>
        </section>


        <div class="buttons">
            <button class="add-cart">ADD AO CARRINHO</button>
            <button class="buy">COMPRAR</button>
        </div>
        </div>
    </main>
    <script src="<?= BASE_URL ?>public/assets/js/tema.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.destaqueProduto', {
            effect: 'creative',
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            speed: 700,
            creativeEffect: {
                prev: {
                    translate: ['-100%', 0, -500],
                    opacity: 0
                },
                next: {
                    translate: ['100%', 0, -500],
                    opacity: 0
                },
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            //autoplay: {
            //    delay: 3000,
            //    disableOnInteraction: false,
            // },

        });

        function toggleFavorito(id_produto, el) {
            const token = "<?= $_SESSION['token'] ?>";

            fetch("<?= BASE_API ?>toggleFavorito", {
                    method: "POST",
                    headers: {
                        "Authorization": "Bearer " + token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id_produto=" + encodeURIComponent(id_produto)
                })
                .then(async response => {
                    const text = await response.text();
                    let data;
                    try {
                        data = JSON.parse(text);
                    } catch (e) {
                        console.error("Erro ao parsear JSON:", text);
                        return;
                    }

                    // Seleciona TODOS os corações que representam esse produto
                    const hearts = document.querySelectorAll(`.heart[data-id='${id_produto}']`);

                    if (data.status === 'adicionado') {
                        hearts.forEach(h => h.classList.add('favoritado'));
                    } else if (data.status === 'removido') {
                        hearts.forEach(h => h.classList.remove('favoritado'));

                        // Se estiver na página de favoritos, remove o card
                        if (document.body.classList.contains('pagina-favoritos')) {
                            hearts.forEach(h => {
                                const card = h.closest('.product-card');
                                if (card) card.remove();
                            });

                            if (document.querySelectorAll('.product-card').length === 0) {
                                document.querySelector('.product-list').innerHTML = `
                        <div class="sem-favoritos">
                            <p>Você ainda não favoritou nenhum produto.</p>
                        </div>
                    `;
                            }
                        }
                    }
                })
                .catch(() => {
                    console.error("Erro na requisição do toggleFavorito.");
                });
        }
    </script>
</body>

</html>