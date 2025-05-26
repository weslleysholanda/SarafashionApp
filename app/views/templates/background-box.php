<section class="background-box">
    <div class="container-header">
        <div class="card-header">
            <?php
            $caminhoArquivo = BASE_URL_SITE . "uploads/" . $cliente['foto_cliente'];
            $img = BASE_URL_SITE . "uploads/cliente/sem-foto-cliente.png";
            $alt_foto = "imagem sem foto";

            // var_dump($cliente['foto_cliente']);

            if (!empty($cliente['foto_cliente'])) {
                $headers = @get_headers($caminhoArquivo);
                if ($headers && strpos($headers[0], '200') !== false) {
                    $img = $caminhoArquivo;
                    $alt_foto = htmlspecialchars($cliente['alt_cliente'], ENT_QUOTES, 'UTF-8');
                }
            }
            ?>
            <img src="<?= $img ?>" alt="<?= $alt_foto ?>" />
            <div class="notification-alarm">
                <div class="box-alarm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path id="bell"
                            d="M11,20a2.7,2.7,0,0,0,2.857-2.5H8.143A2.7,2.7,0,0,0,11,20M11,2.4l-1.139.2A5.216,5.216,0,0,0,5.286,7.5a23.894,23.894,0,0,1-.656,4.677A14.674,14.674,0,0,1,3.683,15H18.317a14.744,14.744,0,0,1-.947-2.822A23.894,23.894,0,0,1,16.714,7.5a5.217,5.217,0,0,0-4.576-4.9ZM19.886,15A3.291,3.291,0,0,0,21,16.249H1A3.291,3.291,0,0,0,2.114,15C3.4,12.75,3.857,8.6,3.857,7.5c0-3.025,2.457-5.55,5.721-6.126A1.207,1.207,0,0,1,10.245.188a1.6,1.6,0,0,1,1.51,0,1.207,1.207,0,0,1,.666,1.186c3.33.592,5.722,3.153,5.721,6.126,0,1.1.457,5.25,1.743,7.5"
                            transform="translate(-1 0.001)" />
                    </svg>
                    <div class="notification">
                        <h2>1</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h2><?= htmlspecialchars($cliente['nome_cliente'], ENT_QUOTES, "UTF-8") ?></h2>
            <p>
                <?php
                    $data = new DateTime($cliente['membro_desde']);

                    $fmt = new IntlDateFormatter(
                        'pt_BR', //Localidade
                        IntlDateFormatter::NONE, // Ignora a da data
                        IntlDateFormatter::NONE, //Ignora a hora
                        'UTC', //Timezone
                        IntlDateFormatter::GREGORIAN,
                        "dd MMM yyyy"  // Formato de texto exemplo: 00-00-0000
                    );


                    $dataFormatada = $fmt->format($data); //Formata o objeto DateTime
                    $dataFormatada = mb_convert_case($dataFormatada, MB_CASE_TITLE, "UTF-8"); //Transforma a string ou seja capitaliza a primeira letra do mês.

                    echo htmlspecialchars('Membro desde: ' . $dataFormatada, ENT_QUOTES, 'UTF-8');
                ?>
            </p>
        </div>
    </div>
</section>