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
                $alt_foto = htmlspecialchars($cliente['alt_cliente'], ENT_QUOTES, 'UTF-8');
            }
        }
        ?>
        <img src="<?= $img ?>" alt="<?= $alt_foto ?>" />
        <div class="icon-pic">
            <svg xmlns="http://www.w3.org/2000/svg" width="23.515" height="18.33" viewBox="0 0 23.515 18.33">
                <g id="Grupo_328" data-name="Grupo 328" transform="translate(-258.242 -242.835)">
                    <path id="Caminho_276" data-name="Caminho 276"
                        d="M22.045,17.275a1.5,1.5,0,0,1-1.47,1.528H2.939a1.5,1.5,0,0,1-1.47-1.528V8.11a1.5,1.5,0,0,1,1.47-1.528H4.662A4.326,4.326,0,0,0,7.778,5.24L9,3.975a1.442,1.442,0,0,1,1.036-.448h3.445a1.442,1.442,0,0,1,1.039.447L15.735,5.24a4.326,4.326,0,0,0,3.119,1.343h1.722a1.5,1.5,0,0,1,1.47,1.528ZM2.939,5.055A3,3,0,0,0,0,8.11v9.165A3,3,0,0,0,2.939,20.33H20.576a3,3,0,0,0,2.939-3.055V8.11a3,3,0,0,0-2.939-3.055H18.853a2.884,2.884,0,0,1-2.078-.895L15.558,2.9A2.884,2.884,0,0,0,13.48,2H10.035a2.884,2.884,0,0,0-2.078.895L6.74,4.16a2.884,2.884,0,0,1-2.078.9Z"
                        transform="translate(258.242 240.835)" fill="#fff" />
                    <path id="Caminho_277" data-name="Caminho 277"
                        d="M11.165,14.165a3.819,3.819,0,1,1,3.819-3.819,3.819,3.819,0,0,1-3.819,3.819m0,1.528a5.346,5.346,0,1,0-5.346-5.346,5.346,5.346,0,0,0,5.346,5.346m-7.638-8.4a.764.764,0,1,1-.764-.764.764.764,0,0,1,.764.764"
                        transform="translate(259.297 242.417)" fill="#fff" />
                </g>
            </svg>

        </div>
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
                "dd MMM yyyy"  // Formato de texto exemplo: 00-00-0000
            );
        
        
            $dataFormatada = $fmt->format($data); //Formata o objeto DateTime
            $dataFormatada = mb_convert_case($dataFormatada, MB_CASE_TITLE, "UTF-8"); //Transforma a string ou seja capitaliza a primeira letra do mês.
        
            echo htmlspecialchars('Membro desde: ' . $dataFormatada, ENT_QUOTES, 'UTF-8');
        ?>
    </p>
</section>