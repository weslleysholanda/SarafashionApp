<section class="home-background">
    <div class="background-box">
        <header class="navbar-box">
            <div class="container-header">
                <div class="perfil-user">
                    <div class="usuario-conteudo">
                        <div class="usuario-img">
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
                            <img src="<?= $img ?>" alt="<?= $alt_foto ?>">
                        </div>
                        <div class="usuario-info">
                            <h2><?= htmlspecialchars($cliente['nome_cliente'], ENT_QUOTES, "UTF-8") ?></h2>
                            <small>
                                <?php
                                $data = new DateTime($data['membro_desde']);

                                $fmt = new IntlDateFormatter(
                                    'pt_BR', //Localidade
                                    IntlDateFormatter::NONE, // Ignora a da data
                                    IntlDateFormatter::NONE, //Ignora a hora
                                    date_default_timezone_get(), //Timezone
                                    IntlDateFormatter::GREGORIAN,
                                    "dd MMMM yyyy"  // Formato de texto exemplo: 00-00-0000
                                );

                                $dataFormatada = $fmt->format($data); //Formata o objeto DateTime
                                $dataFormatada = mb_convert_case($dataFormatada, MB_CASE_TITLE, "UTF-8"); //Transforma a string ou seja capitaliza a primeira letra do mês.

                                echo htmlspecialchars('Membro desde: ' . $dataFormatada, ENT_QUOTES, 'UTF-8');
                                ?>
                            </small>
                        </div>
                    </div>
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
            </div>
            <div class="fidelidade-box">
                <div class="topo">
                    <p class="titulo">Pontos Fidelidade:</p>
                    <p class="pontos"><?= $pontos_acumulados ?>  Pontos</p>
                </div>

                <div class="icones-box">
                    <div class="item">
                        <a href="meusAgendamentos.html">
                            <div class="icone">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 44.9 47.6">
                                    <path
                                        d="M38.2,4.7h-4.8v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-8.6v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-4.8C3.1,4.7,0,7.7,0,11.5v29.3c0,3.7,3,6.8,6.8,6.8h31.3c3.7,0,6.8-3,6.8-6.8V11.5c0-3.7-3-6.8-6.8-6.8h.1ZM28.3,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM13.2,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM1.6,11.5c0-2.9,2.4-5.3,5.3-5.3h4.8v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h8.6v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h4.8c2.9,0,5.3,2.4,5.3,5.3v2.5H1.6v-2.5ZM43.4,40.8c0,2.9-2.4,5.3-5.3,5.3H6.8c-2.9,0-5.3-2.4-5.3-5.3V15.5h41.9v25.3Z" />
                                    <path
                                        d="M7.3,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z" />
                                    <path
                                        d="M7.3,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z" />
                                    <path
                                        d="M19.8,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z" />
                                    <path
                                        d="M19.8,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z" />
                                    <path
                                        d="M32.2,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM31,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z" />
                                    <path
                                        d="M37.7,32.3l-4.6,5.4-2.3-2c-.3-.3-.8-.2-1.1,0-.3.3-.2.8,0,1.1l2.9,2.5c.1.1.3.2.5.2s0,0,0,0c.2,0,.4-.1.5-.3l5.1-6c.3-.3.2-.8,0-1.1-.3-.3-.8-.2-1.1,0l.1.2Z" />
                                </svg>
                            </div>
                            <div class="texto">Meus Agendamentos</div>
                        </a>
                    </div>

                    <div class="item">
                        <a href="favoritos.html">
                            <div class="icone">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 42.447">
                                    <path id="Caminho_179" data-name="Caminho 179"
                                        d="M23,7.015l0,0,0,0,0,0,0,0-2.392-2.5a11.138,11.138,0,0,0-16.248,0,12.41,12.41,0,0,0,0,16.991L23,40.995,41.637,21.5a12.41,12.41,0,0,0,0-16.991,11.138,11.138,0,0,0-16.248,0L23,7.015l0,0,0,0,0,0,0,0H23Z"
                                        fill="none" stroke="#c59d5f" stroke-miterlimit="10" stroke-width="2" />
                                </svg>
                            </div>
                            <div class="texto">Meus Favoritos</div>
                        </a>
                    </div>

                    <div class="item">
                        <a href="historicoServico.html">
                            <div class="icone">
                                <svg xmlns="http://www.w3.org/2000/svg" width="58" height="41"
                                    viewBox="0 0 58 41">
                                    <g id="Grupo_319" data-name="Grupo 319"
                                        transform="translate(-312.5 -223.5)">
                                        <rect id="Retângulo_41" data-name="Retângulo 41" width="57" height="40"
                                            rx="10" transform="translate(313 224)" fill="rgba(34,34,34,0)"
                                            stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                                        <circle id="Elipse_14" data-name="Elipse 14" cx="11.5" cy="11.5"
                                            r="11.5" transform="translate(330 233)" fill="#c59d5f" />
                                        <path id="Caminho_83" data-name="Caminho 83"
                                            d="M2.6,7.468,2.653.576C2.537.2,1.866-.053,1.155.009.6.061.165.292.071.587L.014,7.716h0a.279.279,0,0,0,0,.163.133.133,0,0,0,0,.111v.09l.173.128h0L7.831,11.82a1.913,1.913,0,0,0,.861.18C9.4,12,9.98,11.706,10,11.334c.012-.2-.149-.4-.435-.522L2.6,7.472Z"
                                            transform="matrix(1, -0.017, 0.017, 1, 338.792, 238.174)"
                                            fill="#fff" />
                                    </g>
                                </svg>
                            </div>
                            <div class="texto">Histórico de Serviços</div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>
</section>