<section class="perfil-user">
    <div class="avatar-container">
        <?php
        $caminhoArquivo = BASE_URL_SITE . "uploads/" . $cliente['foto_cliente'];
        $img = BASE_URL_SITE . "uploads/cliente/sem-foto-cliente.png";
        $alt_foto = "imagem sem foto";

        // var_dump($cliente['foto_cliente']);

        if (!empty($cliente['foto_cliente'])) {
            $headers = @get_headers($caminhoArquivo);
            if ($headers && strpos($headers[0], '200') !== false) {
                $img = $caminhoArquivo;
                $alt_foto = htmlspecialchars($cliente['alt_foto_cliente'], ENT_QUOTES, 'UTF-8');
            }
        }
        ?>
        <img src="<?= $img ?>" alt="<?= $alt_foto ?>" />
    </div>
    <p>
        <?php
        $data = new DateTime($cliente['membro_desde']);

        $fmt = new IntlDateFormatter(
            'pt_BR', //Localidade
            IntlDateFormatter::NONE, // Ignora a da data
            IntlDateFormatter::NONE, //Ignora a hora
            'UTC', //Timezone
            IntlDateFormatter::GREGORIAN,
            "dd MMMM yyyy"  // Formato de texto exemplo: 00-00-0000
        );


        $dataFormatada = $fmt->format($data); //Formata o objeto DateTime
        $dataFormatada = mb_convert_case($dataFormatada, MB_CASE_TITLE, "UTF-8"); //Transforma a string ou seja capitaliza a primeira letra do mês.

        echo htmlspecialchars('Membro desde: ' . $dataFormatada, ENT_QUOTES, 'UTF-8');
        ?>
    </p>

    <?php
    if (!empty($_SESSION['msg_sucesso'])) {
        echo '
        <div class="custom-alert-container">
            <div class="custom-alert success">
                ' . $_SESSION['msg_sucesso'] . '
                <span class="close-btn" onclick="closeAlert(this);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </span>
            </div>        
        </div>';
        unset($_SESSION['msg_sucesso']);
    }

    if (!empty($_SESSION['msg_erro'])) {
        echo '
    <div class="custom-alert error">
        ' . $_SESSION['msg_erro'] . '
        <span class="close-btn" onclick="closeAlert(this);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
            </svg>
        </span>
    </div>';
        unset($_SESSION['msg_erro']);
    }
    ?>

</section>