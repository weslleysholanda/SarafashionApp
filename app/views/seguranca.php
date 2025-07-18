<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app config seguranca">
        <section class="background-box">
            <header class="voltar">
                <a href="index.php?url=configuracao">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                        <path id="Caminho_6" data-name="Caminho 6"
                            d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                            transform="translate(-0.025 -31.925)" fill="#c59d5f" />
                    </svg>
                </a>
            </header>
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
                            $alt_foto = htmlspecialchars($cliente['alt_foto_cliente'], ENT_QUOTES, 'UTF-8');
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
                            "dd MMMM yyyy"  // Formato de texto exemplo: 00-00-0000
                        );


                        $dataFormatada = $fmt->format($data); //Formata o objeto DateTime
                        $dataFormatada = mb_convert_case($dataFormatada, MB_CASE_TITLE, "UTF-8"); //Transforma a string ou seja capitaliza a primeira letra do mês.

                        echo htmlspecialchars('Membro desde: ' . $dataFormatada, ENT_QUOTES, 'UTF-8');
                        ?>
                    </p>
                </div>
            </div>
        </section>

        <section class="seguranca-titulo">
            <div class="container-tittle">
                <h2>Configurações</h2>
                <h3>Segurança e Conta</h3>
            </div>
        </section>

        <section class="settings-container">
            <ul class="settings-list">
                <!-- Segurança -->
                <li class="setting-item">
                    <a href="index.php?url=editarSenha">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21.874" height="28.209"
                                viewBox="0 0 21.874 28.209">
                                <path
                                    d="M74.094,11.038V7.359c0-4.065-3.673-7.359-8.2-7.359s-8.2,3.294-8.2,7.359v3.679a2.605,2.605,0,0,0-2.734,2.453V25.756a2.605,2.605,0,0,0,2.734,2.453H74.094a2.6,2.6,0,0,0,2.734-2.453V13.491A2.6,2.6,0,0,0,74.094,11.038ZM60.423,7.359a5.5,5.5,0,0,1,10.937,0v3.679H60.423Zm13.672,18.4H57.688V13.491H74.094Zm-9.57-5.246v1.567a1.375,1.375,0,0,0,2.734,0V20.51A2.414,2.414,0,0,0,68.625,18.4a2.75,2.75,0,0,0-5.469,0A2.413,2.413,0,0,0,64.524,20.51Z"
                                    transform="translate(-54.954)" fill="#4e545c" />
                            </svg>
                        </div>
                        <div class="text">
                            <h3 class="title">Segurança</h3>
                            <p class="subtitle">Alterar senha</p>
                        </div>
                        <div class="chevron">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.952" height="10.206"
                                viewBox="0 0 5.952 10.206">
                                <path id="Caminho_96" data-name="Caminho 96"
                                    d="M10.1,60l-.511-.511a.322.322,0,0,0-.47,0L5.1,63.5,1.084,59.484a.322.322,0,0,0-.47,0L.1,60a.322.322,0,0,0,0,.47l4.766,4.766a.322.322,0,0,0,.47,0L10.1,60.466a.322.322,0,0,0,0-.471Z"
                                    transform="translate(-59.382 10.206) rotate(-90)" fill="#4e545c" />
                            </svg>
                        </div>
                    </a>
                </li>

                <!-- 2fa -->
                <!-- <li class="setting-item">
                    <a href="seguranca.html">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26.375" height="30.964"
                                viewBox="0 0 26.375 30.964">
                                <path id="verified_user_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24"
                                    d="M171.457-859.021l9.314-8.747-2.349-2.206-6.965,6.541L168-866.685l-2.349,2.206Zm1.731,9.986a16.47,16.47,0,0,1-9.458-6.174,17.068,17.068,0,0,1-3.73-10.7v-9.444L173.188-880l13.188,4.645v9.444a17.067,17.067,0,0,1-3.73,10.7A16.47,16.47,0,0,1,173.188-849.035Zm0-3.251a13.349,13.349,0,0,0,7.088-5.109,14.088,14.088,0,0,0,2.8-8.515v-7.315l-9.891-3.484-9.891,3.484v7.315a14.089,14.089,0,0,0,2.8,8.515A13.349,13.349,0,0,0,173.188-852.287ZM173.188-864.518Z"
                                    transform="translate(-160 880)" fill="#4e545c" />
                            </svg>

                        </div>
                        <div class="text">
                            <h3 class="title">Autenticação de 2 fatores</h3>
                            <div class="container-subtitle">
                                <p class="subtitle">Ativar ou Desativar</p>
                                <span>Inativo</span>
                            </div>

                        </div>
                        <div class="chevron">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.952" height="10.206"
                                viewBox="0 0 5.952 10.206">
                                <path id="Caminho_96" data-name="Caminho 96"
                                    d="M10.1,60l-.511-.511a.322.322,0,0,0-.47,0L5.1,63.5,1.084,59.484a.322.322,0,0,0-.47,0L.1,60a.322.322,0,0,0,0,.47l4.766,4.766a.322.322,0,0,0,.47,0L10.1,60.466a.322.322,0,0,0,0-.471Z"
                                    transform="translate(-59.382 10.206) rotate(-90)" fill="#4e545c" />
                            </svg>
                        </div>
                    </a>
                </li> -->
            </ul>
        </section>
    </main>
</body>

</html>