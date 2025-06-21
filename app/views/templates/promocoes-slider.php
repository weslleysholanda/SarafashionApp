<section class="promocoes-slider">
    <div class="home-promocoes swiper">
        <div class="swiper-wrapper">
            <?php foreach ($servPromocoes as $promo): ?>
            <div class="card swiper-slide">
                <div class="card-image">
                    <img src="<?= BASE_FOTO . "promocao/" . basename($promo['foto_promocao']) ?>" alt="<?= $promo['alt_foto_promocao'] ?>">
                    <div class="footer-img">
                        <h3><?= htmlspecialchars($promo['descricao_promocao'], ENT_QUOTES, 'UTF-8')?></h3>
                        <div class="footer-button">
                            <button>Reserve</button>
                        </div>
                    </div>
                </div>
                <div class="card-text">
                    <div class="container-text">
                        <h2><?= intval($promo['desconto_promocao'])?></h2>
                        <div class="text-enfase">
                            <h2>% OFF</h2>
                            <h3><?= htmlspecialchars($promo['tipo_servico'], ENT_QUOTES, 'UTF-8')?></h3>
                        </div>
                    </div>
                    <span></span>

                </div>
            </div>
            <?php endforeach; ?>
            <!-- <div class="card swiper-slide">
                <div class="card-image">
                    <img src="<?= BASE_URL ?>public/assets/img/futuraProm.png" alt="Promoção de corte de cabelo">
                    <div class="footer-img">
                        <h3>06 - 09 Mar - Somente para membros vip</h3>
                        <div class="footer-button">
                            <button>Reserve</button>
                        </div>
                    </div>
                </div>
                <div class="card-text">
                    <div class="container-text">
                        <h2>50</h2>
                        <div class="text-enfase">
                            <h2>% OFF</h2>
                            <h3>Todos os cortes</h3>
                        </div>
                    </div>
                    <span></span>

                </div>
            </div> -->
        </div>
    </div>
</section>