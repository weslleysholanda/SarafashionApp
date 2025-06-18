<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>


<body>
    <main class="app favorito historico minhasCompras avaliar carrinho">
        <section class="background-favorito">
            <div class="background-box">
                <div class="header-nav">
                    <header class="voltar">
                        <a href="home.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                                <path id="Caminho_6" data-name="Caminho 6"
                                    d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                                    transform="translate(-0.025 -31.925)" />
                            </svg>
                        </a>

                    </header>
                </div>
                <div class="tema-title">
                    <h1>Carrinho</h1>
                </div>
            </div>
        </section>
        <section class="comprasList">
            <div class="containerListCompras">
                <div class="card">
                    <div class="imgCompras">
                        <img src="assets/img/joico_Defy_Damage.png" alt="KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE">
                    </div>
                    <div class="infoCompras">
                        <h2>KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE</h2>
                        <h3>Hair Care</h3>
                        <div class="valorCompra">
                            <span class="old-price">R$00,00</span>
                            <span class="new-price">R$79,00</span>
                        </div>
                    </div>

                    <div class="counter">
                        <button class="btn minus">−</button>
                        <span class="value">1</span>
                        <button class="btn plus">+</button>
                    </div>
                </div>
                <div class="card">
                    <div class="imgCompras">
                        <img src="assets/img/joico_Defy_Damage.png" alt="KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE">
                    </div>
                    <div class="infoCompras">
                        <h2>KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE</h2>
                        <h3>Hair Care</h3>
                        <div class="valorCompra">
                            <span class="old-price">R$00,00</span>
                            <span class="new-price">R$79,00</span>
                        </div>
                    </div>

                    <div class="counter">
                        <button class="btn minus">−</button>
                        <span class="value">1</span>
                        <button class="btn plus">+</button>
                    </div>
                </div>
                <div class="card">
                    <div class="imgCompras">
                        <img src="assets/img/joico_Defy_Damage.png" alt="KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE">
                    </div>
                    <div class="infoCompras">
                        <h2>KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE</h2>
                        <h3>Hair Care</h3>
                        <div class="valorCompra">
                            <span class="old-price">R$00,00</span>
                            <span class="new-price">R$79,00</span>
                        </div>
                    </div>

                    <div class="counter">
                        <button class="btn minus">−</button>
                        <span class="value">1</span>
                        <button class="btn plus">+</button>
                    </div>
                </div>
                <div class="card">
                    <div class="imgCompras">
                        <img src="assets/img/joico_Defy_Damage.png" alt="KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE">
                    </div>
                    <div class="infoCompras">
                        <h2>KIT TRIPLO PROTETOR E NUTRITIVO DEFY DAMAGE</h2>
                        <h3>Hair Care</h3>
                        <div class="valorCompra">
                            <span class="old-price">R$00,00</span>
                            <span class="new-price">R$79,00</span>
                        </div>
                    </div>

                    <div class="counter">
                        <button class="btn minus">−</button>
                        <span class="value">1</span>
                        <button class="btn plus">+</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="totalCompra">
            <div class="title">
                <h3>Total Carrinho</h3>
            </div>
            <div class="subtotal">
                <h3>Valor Total </h3>
                <h3>R$ 316,00</h3>
            </div>
        </section>
        <section class="post">
            <div class="input-post">
                <button>Comprar</button>
            </div>
        </section>
    </main>
    <script>
        document.querySelectorAll('.counter').forEach(counter => {
            const minusBtn = counter.querySelector('.minus');
            const plusBtn = counter.querySelector('.plus');
            const valueSpan = counter.querySelector('.value');
            let value = parseInt(valueSpan.textContent);

            minusBtn.addEventListener('click', () => {
                if (value > 1) {
                    value--;
                    valueSpan.textContent = value;
                }
            });

            plusBtn.addEventListener('click', () => {
                value++;
                valueSpan.textContent = value;
            });
        });
    </script>
</body>

</html>