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

        <section class="produtoFavoritado">
            <div class="product-list">
                <div class="product-card">
                    <div class="heart">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                            <g transform="translate(-0.5 -0.495)">
                                <path
                                    d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                    fill="none" stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                            </g>
                        </svg>
                    </div>
                    <div class="card-img">
                        <img src="<?= BASE_URL ?>public/assets/img/shampoo_clear_restore_plus_ativare.png" alt="Shampoo Restore">
                    </div>

                    <h3>SHAMPOO Restore Plus Extra Liss Ativare </h3>
                    <p class="category">Hair Care</p>
                    <p class="price">
                        <span class="old-price">R$00,00</span>
                        <span class="new-price">R$79,00</span>
                    </p>
                </div>
                <div class="product-card">
                    <div class="heart">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                            <g transform="translate(-0.5 -0.495)">
                                <path
                                    d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                    fill="none" stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                            </g>
                        </svg>
                    </div>
                    <div class="card-img">
                        <img src="<?= BASE_URL ?>public/assets/img/joico_Defy_Damage.png" alt="Shampoo Restore">
                    </div>

                    <h3>KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE JOICO</h3>
                    <p class="category">Hair Care</p>
                    <p class="price">
                        <span class="old-price">R$00,00</span>
                        <span class="new-price">R$79,00</span>
                    </p>
                </div>
                <div class="product-card">
                    <div class="heart">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                            <g transform="translate(-0.5 -0.495)">
                                <path
                                    d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                    fill="none" stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                            </g>
                        </svg>
                    </div>
                    <div class="card-img">
                        <img src="<?= BASE_URL ?>public/assets/img/Kit Wella Professionals.png" alt="Shampoo Restore">
                    </div>

                    <h3>Kit Wella Professionals Invigo Nutri-Enrich Salon Trio (3 Produtos)</h3>
                    <p class="category">Hair Care</p>
                    <p class="price">
                        <span class="old-price">R$00,00</span>
                        <span class="new-price">R$79,00</span>
                    </p>
                </div>
                <div class="product-card">
                    <div class="heart">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                            <g transform="translate(-0.5 -0.495)">
                                <path
                                    d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                    fill="none" stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                            </g>
                        </svg>
                    </div>
                    <div class="card-img">
                        <img src="<?= BASE_URL ?>public/assets/img/agua_oxigenada_volumes_iluminata_.png" alt="Shampoo Restore">
                    </div>

                    <h3>Descolorante Iluminata AGU...</h3>
                    <p class="category">Hair Care</p>
                    <p class="price">
                        <span class="old-price">R$00,00</span>
                        <span class="new-price">R$79,00</span>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>