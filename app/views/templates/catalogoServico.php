<section class="catalogoServico">
    <div class="servico">

        <div class="container-Servico">
            <div class="titulo-Catalogo">
                <h2><span>Catálogo</span> de Serviços</h2>
            </div>
            <?php foreach ($listarServico as $listarServicos): ?>
                <div class="card">
                    <div class="card-Servico">
                        <?php
                        $caminhoArquivo = BASE_URL_SITE . "uploads/" . $listarServicos['foto_servico'];
                        $img = BASE_URL_SITE . "uploads/servico/sem-foto-servico.png";
                        $alt_foto = "imagem sem foto";
                        if (!empty($listarServicos['foto_servico'])) {
                            $headers = @get_headers($caminhoArquivo);
                            if ($headers && strpos($headers[0], '200') !== false) {
                                $img = $caminhoArquivo;
                                $alt_foto = htmlspecialchars($listarServicos['alt_foto_servico'], ENT_QUOTES, 'UTF-8');
                            }
                        }
                        ?>
                        <img src="<?= $img ?>" alt="<?= $alt_foto ?>">
                        <div class="nome-Servico">
                            <h3><?= htmlspecialchars($listarServicos['nome_servico']) ?></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- <div class="card">
                <div class="card-Servico">
                    <img src="<?= BASE_URL ?>public/assets/img/pintura.png" alt="Corte Visagista">
                    <div class="nome-Servico">
                        <h3>Pintura</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-Servico">
                    <img src="<?= BASE_URL ?>public/assets/img/alisamento.png" alt="Corte Visagista">
                    <div class="nome-Servico">
                        <h3>Alisamento de cabelo</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-Servico">
                    <img src="<?= BASE_URL ?>public/assets/img/alongamento.png" alt="Corte Visagista">
                    <div class="nome-Servico">
                        <h3>Alongamento</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-Servico">
                    <img src="<?= BASE_URL ?>public/assets/img/depilacao.png" alt="Corte Visagista">
                    <div class="nome-Servico">
                        <h3>Depilação</h3>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>