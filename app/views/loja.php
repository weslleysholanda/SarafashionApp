<!DOCTYPE html>
<html lang="pt-br">



<?php
require_once('templates/head.php');
?>


<body>
    <style>
        .limpar-filtro-wrapper {
            display: flex;
            justify-content: center;
            margin: 1rem 0;
        }

        #btn-limpar-filtros {
            padding: 10px 20px;
            background: #c59d5f;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <main class="app home-app favorito loja">
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
                                            $alt_foto = htmlspecialchars($cliente['alt_foto_cliente'], ENT_QUOTES, 'UTF-8');
                                        }
                                    }
                                    ?>
                                    <img src="<?= $img ?>" alt="<?= $alt_foto ?>">
                                </div>
                                <div class="usuario-info">
                                    <h2><?= $cliente['nome_cliente'] ?></h2>
                                    <small>
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

                                        // var_dump($fmt);
                                        // var_dump($data);

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
                    <!-- slide produtos -->

                    <div class="slider-produtos">
                        <div class="container-produto">
                            <div class="card swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($promocoes as $promo): ?>
                                        <div class="swiper-slide">
                                            <div class="produto-left">
                                                <div class="title">
                                                    <h2><?= $promo['descricao_promocao_produto'] ?></h2>
                                                </div>
                                                <div class="promo">
                                                    <h3>ATÉ <?= intval($promo['desconto_promocao_produto']) ?>% OFF</h3>
                                                </div>
                                            </div>
                                            <div class="produto-right">
                                                <div class="produto-boxPromocoes">
                                                    <img src="<?= BASE_FOTO . "produto/" . basename($promo['foto_promocao_produto']) ?>"
                                                        alt="<?= $promo['alt_foto_promocao_produto'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
            </div>
            </header>
            </div>
            <!-- categorias -->
            <div class="of-height-130"></div>
            <section class="categoria">
                <div class="container-categoria">
                    <div class="title">
                        <h2>Categorias</h2>
                    </div>

                    <div class="selecao-categoria">
                        <div class="cardCategoria">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34.823" height="28.178"
                                    viewBox="0 0 34.823 28.178">
                                    <g id="Layer_x0020_1" transform="translate(0 -163)">
                                        <g id="_470572656" transform="translate(0 163)">
                                            <g id="Grupo_163" data-name="Grupo 163" transform="translate(0 0)">
                                                <g id="Grupo_155" data-name="Grupo 155" transform="translate(0 14.732)">
                                                    <path id="Caminho_196" data-name="Caminho 196"
                                                        d="M13.671,895.916h-8.2A5.464,5.464,0,0,1,0,890.468v-5.06A.409.409,0,0,1,.408,885H18.731a.409.409,0,0,1,.408.408v5.06A5.464,5.464,0,0,1,13.671,895.916ZM.816,885.816v4.652A4.646,4.646,0,0,0,5.468,895.1h8.2a4.646,4.646,0,0,0,4.652-4.632v-4.652Z"
                                                        transform="translate(0 -885)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_156" data-name="Grupo 156"
                                                    transform="translate(3.958 24.714)">
                                                    <path id="Caminho_197" data-name="Caminho 197"
                                                        d="M204.814,1377.68H194.408a.4.4,0,0,1-.408-.408v-2.653a.343.343,0,0,1,.143-.306.365.365,0,0,1,.347-.082,5.584,5.584,0,0,0,1.02.1h8.2a5.583,5.583,0,0,0,1.02-.1.365.365,0,0,1,.347.082.343.343,0,0,1,.143.306v2.653A.409.409,0,0,1,204.814,1377.68Zm-10-.816h9.59v-1.755a3.849,3.849,0,0,1-.694.041h-8.2a3.848,3.848,0,0,1-.694-.041Z"
                                                        transform="translate(-194 -1374.215)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_157" data-name="Grupo 157"
                                                    transform="translate(21.982 9.529)">
                                                    <path id="Caminho_198" data-name="Caminho 198"
                                                        d="M1085.26,636.937a1.208,1.208,0,0,1-.592-.143l-6.754-3.9a1.213,1.213,0,0,1-.429-1.632l.388-.673a1.191,1.191,0,0,1,1.041-.592,1.23,1.23,0,0,1,.592.163l6.733,3.9a1.171,1.171,0,0,1,.429,1.612l-.388.673A1.158,1.158,0,0,1,1085.26,636.937Zm-6.346-6.121a.387.387,0,0,0-.327.184l-.388.673a.383.383,0,0,0,.122.51l6.754,3.9a.375.375,0,0,0,.51-.143l.388-.673a.375.375,0,0,0-.143-.51l-6.733-3.877A.329.329,0,0,0,1078.915,630.816Z"
                                                        transform="translate(-1077.33 -630)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_158" data-name="Grupo 158" transform="translate(24.06)">
                                                    <path id="Caminho_199" data-name="Caminho 199"
                                                        d="M1185.266,177.038a.6.6,0,0,1-.2-.041l-5.713-3.305a.4.4,0,0,1-.143-.551l.959-1.694a2.4,2.4,0,0,1,2.061-1.163,2.132,2.132,0,0,1,.857.163l4.264-6.774a1.428,1.428,0,0,1,1.2-.673,1.491,1.491,0,0,1,.673.163,1.389,1.389,0,0,1,.51,1.877l-3.714,7.1a2.4,2.4,0,0,1,.571,3.02l-.979,1.673A.4.4,0,0,1,1185.266,177.038ZM1180.1,173.2l5,2.877.775-1.326a1.535,1.535,0,0,0-.571-2.1l-.041-.02a.424.424,0,0,1-.143-.551l3.9-7.407a.6.6,0,0,0-.2-.8.6.6,0,0,0-.775.224l-4.469,7.08a.425.425,0,0,1-.551.143l-.041-.02a1.4,1.4,0,0,0-.755-.2,1.55,1.55,0,0,0-1.347.755Z"
                                                        transform="translate(-1179.147 -163)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_159" data-name="Grupo 159"
                                                    transform="translate(20.852 11.853)">
                                                    <path id="Caminho_200" data-name="Caminho 200"
                                                        d="M1027.084,751.942a2.107,2.107,0,0,1-1.122-.306l-2.877-1.653a2.149,2.149,0,0,1-1.041-1.367,2.2,2.2,0,0,1,.224-1.714l1.612-2.775a.38.38,0,0,1,.551-.143l6.06,3.489a.431.431,0,0,1,.163.571l-1.612,2.775A2.286,2.286,0,0,1,1027.084,751.942Zm-2.714-7.06-1.408,2.428a1.6,1.6,0,0,0-.143,1.1,1.521,1.521,0,0,0,.673.877l2.877,1.653a1.379,1.379,0,0,0,.714.184,1.414,1.414,0,0,0,1.245-.714l1.408-2.428Z"
                                                        transform="translate(-1021.962 -743.921)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_160" data-name="Grupo 160"
                                                    transform="translate(25.925 14.383)">
                                                    <path id="Caminho_201" data-name="Caminho 201"
                                                        d="M1270.987,870.759a.456.456,0,0,1-.2-.061.414.414,0,0,1-.143-.551l1.163-2.02a.406.406,0,0,1,.571-.143.4.4,0,0,1,.143.551l-1.163,2.02A.41.41,0,0,1,1270.987,870.759Z"
                                                        transform="translate(-1270.591 -867.921)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_161" data-name="Grupo 161"
                                                    transform="translate(24.57 13.602)">
                                                    <path id="Caminho_202" data-name="Caminho 202"
                                                        d="M1204.552,832.469a.411.411,0,0,1-.347-.612l1.163-2.02a.431.431,0,0,1,.571-.163.445.445,0,0,1,.143.571l-1.163,2.02A.456.456,0,0,1,1204.552,832.469Z"
                                                        transform="translate(-1204.147 -829.625)" fill-rule="evenodd" />
                                                </g>
                                                <g id="Grupo_162" data-name="Grupo 162"
                                                    transform="translate(23.223 12.827)">
                                                    <path id="Caminho_203" data-name="Caminho 203"
                                                        d="M1138.552,794.469a.394.394,0,0,1-.2-.061.4.4,0,0,1-.143-.551l1.163-2.02a.412.412,0,0,1,.551-.163.431.431,0,0,1,.163.571l-1.163,2.02A.456.456,0,0,1,1138.552,794.469Z"
                                                        transform="translate(-1138.147 -791.625)" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p>Coloração</p>
                        </div>
                        <div class="cardCategoria">
                            <div class="icon">
                                <svg id="Alongamento" xmlns="http://www.w3.org/2000/svg" width="27.998" height="38.001"
                                    viewBox="0 0 27.998 38.001">
                                    <path id="Caminho_209" data-name="Caminho 209"
                                        d="M3.857,32.4A1.192,1.192,0,0,1,3,32.13a2.571,2.571,0,0,1-.4-2.512c-.013-.011-.025-.02-.036-.031C2,29.11,1.517,28.7,1.543,28.17a1.087,1.087,0,0,1,.277-.654,1.507,1.507,0,0,1-.62-.634.591.591,0,0,1-.006-.416,4.116,4.116,0,0,0,.116-.97c-.067-.039-.148-.085-.23-.127-.468-.251-1.34-.717-1.007-1.613a2.728,2.728,0,0,1,.592-.913,7.691,7.691,0,0,0,1.375-2.258,1.883,1.883,0,0,0,.188-1.213,10.536,10.536,0,0,1,.608-7.077.277.277,0,0,1,.4-.124.35.35,0,0,1,.111.447A9.808,9.808,0,0,0,2.8,19.2a2.6,2.6,0,0,1-.228,1.674A8.209,8.209,0,0,1,1.086,23.3a2.141,2.141,0,0,0-.47.708c-.091.243.077.422.718.766a2.334,2.334,0,0,1,.456.286.349.349,0,0,1,.109.257,5.834,5.834,0,0,1-.141,1.337,2.316,2.316,0,0,0,.741.5.329.329,0,0,1,.183.3.333.333,0,0,1-.169.306c-.12.064-.374.26-.384.45s.487.6.785.855c.069.06.139.118.209.177a.354.354,0,0,1,.092.383c-.006.014-.5,1.415.151,1.991.125.111.728.4,3.244-.642.388-.16.8-.344,1.229-.545a.283.283,0,0,1,.385.176.343.343,0,0,1-.157.43c-.435.206-.857.392-1.254.556a8.468,8.468,0,0,1-2.954.807Z" />
                                    <path id="Caminho_210" data-name="Caminho 210"
                                        d="M20.714,38a.258.258,0,0,1-.125-.031.347.347,0,0,1-.141-.438,32.159,32.159,0,0,0,1.76-18.01.33.33,0,0,1,.228-.388.3.3,0,0,1,.346.256,32.9,32.9,0,0,1-1.8,18.423.294.294,0,0,1-.266.19Z" />
                                    <path id="Caminho_211" data-name="Caminho 211"
                                        d="M1.167,18.369a.3.3,0,0,1-.274-.212,10.147,10.147,0,0,1-.428-3.2,7.663,7.663,0,0,1,2.6-5.764,6.552,6.552,0,0,1,1.582-2.3,8.578,8.578,0,0,1,6.511-2.164,8.988,8.988,0,0,1,2.148.339.334.334,0,0,1,.211.4.292.292,0,0,1-.357.237,8.409,8.409,0,0,0-2.022-.319C5.048,5.166,3.6,9.467,3.581,9.511a.348.348,0,0,1-.1.152c-3.721,3.135-2.057,8.21-2.04,8.262a.341.341,0,0,1-.171.424.279.279,0,0,1-.1.022Z" />
                                    <path id="Caminho_212" data-name="Caminho 212"
                                        d="M7.574,34.835a.307.307,0,0,1-.291-.3,9.345,9.345,0,0,0-.826-3.091A.352.352,0,0,1,6.566,31a.277.277,0,0,1,.4.122,9.97,9.97,0,0,1,.9,3.355.321.321,0,0,1-.263.359Z" />
                                    <path id="Caminho_213" data-name="Caminho 213"
                                        d="M12.278,38a.278.278,0,0,1-.214-.1.358.358,0,0,1,.013-.465,13.775,13.775,0,0,0,3.762-11.5,9.511,9.511,0,0,0-6.259-7.264c-4.617-1.861-5.9-3.512-6.763-6.092a.342.342,0,0,1,.172-.424.285.285,0,0,1,.378.191c.818,2.443,1.985,3.92,6.412,5.7A10.128,10.128,0,0,1,16.413,25.8a14.5,14.5,0,0,1-3.934,12.113.278.278,0,0,1-.2.089Z" />
                                    <path id="Caminho_214" data-name="Caminho 214"
                                        d="M5.789,38a.288.288,0,0,1-.253-.163.351.351,0,0,1,.105-.45c3.584-2.362,5.821-5.886,5.985-9.428.144-3.116-1.338-6.052-4.29-8.491C4.729,17.313,3.2,14.975,2.8,12.519a6.243,6.243,0,0,1,.241-3.264A.281.281,0,0,1,3.435,9.1a.347.347,0,0,1,.137.438A5.654,5.654,0,0,0,3.381,12.4c.368,2.253,1.856,4.515,4.305,6.537,3.116,2.577,4.683,5.707,4.528,9.054-.174,3.763-2.52,7.485-6.273,9.96A.263.263,0,0,1,5.792,38Z" />
                                    <path id="Caminho_215" data-name="Caminho 215"
                                        d="M3.307,9.728a.288.288,0,0,1-.242-.143.353.353,0,0,1,.074-.457,9.066,9.066,0,0,1,7.417-1.475.332.332,0,0,1,.217.4.293.293,0,0,1-.354.243A8.678,8.678,0,0,0,3.472,9.669a.271.271,0,0,1-.167.058Z" />
                                    <path id="Caminho_216" data-name="Caminho 216"
                                        d="M19.531,18.369a.292.292,0,0,1-.258-.17c-2.37-4.811-5.642-6.721-7.969-7.477a10.594,10.594,0,0,0-4.55-.5.3.3,0,0,1-.333-.276.325.325,0,0,1,.245-.373,10.91,10.91,0,0,1,4.775.505c2.442.788,5.873,2.779,8.347,7.8a.351.351,0,0,1-.115.447.263.263,0,0,1-.141.041Z" />
                                    <path id="Caminho_217" data-name="Caminho 217"
                                        d="M18.9,28.837a.318.318,0,0,1-.293-.347,14.25,14.25,0,0,0-2.528-9.2,10.868,10.868,0,0,0-2.85-2.8.35.35,0,0,1-.122-.444.278.278,0,0,1,.4-.137,11.249,11.249,0,0,1,3.014,2.944,14.934,14.934,0,0,1,2.675,9.676.311.311,0,0,1-.293.312Z" />
                                    <path id="Caminho_218" data-name="Caminho 218"
                                        d="M25.883,21.537a.913.913,0,0,1-.687-.32L14,8.67a2.237,2.237,0,0,1,0-2.909l2.3-2.574a.271.271,0,0,1,.414,0,.356.356,0,0,1,0,.464l-2.3,2.573a1.522,1.522,0,0,0,0,1.979L25.61,20.751a.357.357,0,0,0,.546,0,.471.471,0,0,0,0-.611l-2.386-2.672a.356.356,0,0,1,0-.465.271.271,0,0,1,.414,0l2.386,2.674a1.185,1.185,0,0,1,0,1.541.919.919,0,0,1-.687.32Z" />
                                    <path id="Caminho_219" data-name="Caminho 219"
                                        d="M23.129,16.613a.28.28,0,0,1-.207-.1l-1.91-2.14a1.408,1.408,0,0,1,0-1.828l1.819-2.038a.271.271,0,0,1,.414,0,.356.356,0,0,1,0,.464l-1.819,2.038a.69.69,0,0,0,0,.9l1.91,2.141a.356.356,0,0,1,0,.464.277.277,0,0,1-.207.1Z" />
                                    <path id="Caminho_220" data-name="Caminho 220"
                                        d="M20.241,12.58a.275.275,0,0,1-.207-.1.356.356,0,0,1,0-.464L22.106,9.7a.272.272,0,0,1,.416,0,.356.356,0,0,1,0,.464L20.45,12.485a.275.275,0,0,1-.207.1Z" />
                                    <path id="Caminho_221" data-name="Caminho 221"
                                        d="M19.514,11.768a.275.275,0,0,1-.207-.1.358.358,0,0,1,0-.466l2.072-2.322a.272.272,0,0,1,.416,0,.356.356,0,0,1,0,.464L19.723,11.67a.277.277,0,0,1-.207.1Z" />
                                    <path id="Caminho_222" data-name="Caminho 222"
                                        d="M18.789,10.953a.275.275,0,0,1-.207-.1.356.356,0,0,1,0-.464L20.654,8.07a.271.271,0,0,1,.414,0,.358.358,0,0,1,0,.466L19,10.859a.275.275,0,0,1-.207.1Z" />
                                    <path id="Caminho_223" data-name="Caminho 223"
                                        d="M18.063,10.14a.275.275,0,0,1-.207-.1.358.358,0,0,1,0-.466l2.072-2.322a.271.271,0,0,1,.414,0,.356.356,0,0,1,0,.464L18.27,10.043a.277.277,0,0,1-.207.1Z" />
                                    <path id="Caminho_224" data-name="Caminho 224"
                                        d="M17.337,9.326a.275.275,0,0,1-.207-.1.356.356,0,0,1,0-.464L19.2,6.443a.271.271,0,0,1,.414,0,.358.358,0,0,1,0,.466L17.545,9.232a.275.275,0,0,1-.207.1Z" />
                                    <path id="Caminho_225" data-name="Caminho 225"
                                        d="M16.611,8.513a.281.281,0,0,1-.207-.1.358.358,0,0,1,0-.466l2.071-2.322a.272.272,0,0,1,.416,0,.356.356,0,0,1,0,.464L16.818,8.416a.277.277,0,0,1-.207.1Z" />
                                    <path id="Caminho_226" data-name="Caminho 226"
                                        d="M15.886,7.7a.273.273,0,0,1-.207-.1.358.358,0,0,1,0-.466L17.75,4.814a.271.271,0,0,1,.414,0,.356.356,0,0,1,0,.464L16.093,7.6a.277.277,0,0,1-.207.1Z" />
                                    <path id="Caminho_227" data-name="Caminho 227"
                                        d="M15.159,6.886a.281.281,0,0,1-.207-.1.356.356,0,0,1,0-.464L17.024,4a.271.271,0,0,1,.414,0,.356.356,0,0,1,0,.464L15.366,6.79A.275.275,0,0,1,15.159,6.886Z" />
                                    <path id="Caminho_228" data-name="Caminho 228"
                                        d="M23.559,7.7a3.6,3.6,0,0,1-1.235-.218C20.081,6.664,18.431,3.659,18.4.333a.3.3,0,1,1,.587-.006c.028,3.052,1.506,5.8,3.517,6.528a3.644,3.644,0,0,0,3.269-.56.275.275,0,0,1,.4.1.355.355,0,0,1-.094.454,4.559,4.559,0,0,1-2.526.847Z" />
                                    <path id="Caminho_229" data-name="Caminho 229"
                                        d="M25.99,14.863a.276.276,0,0,1-.182-.071,5.329,5.329,0,0,1-1.693-2.657,7.39,7.39,0,0,1,.02-3.338,6.093,6.093,0,0,0,.12-2.176c-.333-1.822-1.537-2.707-3.679-2.707h-.027a.331.331,0,0,1,0-.658c2.447-.011,3.888,1.08,4.281,3.233a6.709,6.709,0,0,1-.12,2.435,6.673,6.673,0,0,0-.032,3.029,4.68,4.68,0,0,0,1.494,2.324.357.357,0,0,1,.048.463.282.282,0,0,1-.23.124Z" />
                                    <path id="Caminho_230" data-name="Caminho 230"
                                        d="M26.954,17.356a.26.26,0,0,1-.112-.025.345.345,0,0,1-.16-.43c1.441-3.9.423-5.668-.312-6.373-.872-.836-2.163-.871-3.529-.909a7.807,7.807,0,0,1-4.34-1C16.793,7.466,15.782,5.047,15.5,1.423a.32.32,0,0,1,.266-.356.305.305,0,0,1,.319.3c.269,3.4,1.186,5.652,2.723,6.686a7.29,7.29,0,0,0,4.053.91c1.474.041,2.866.08,3.9,1.067.855.821,2.054,2.836.473,7.124a.3.3,0,0,1-.272.2Z" />
                                </svg>
                            </div>
                            <p>Hair Care</p>
                        </div>
                        <div class="cardCategoria">
                            <div class="icon">
                                <svg id="iconMaquiagem" xmlns="http://www.w3.org/2000/svg" width="32" height="29"
                                    viewBox="0 0 32 29">
                                    <path id="Caminho_190" data-name="Caminho 190"
                                        d="M5,11.769a8.306,8.306,0,0,0,1.98,5.359H5.66a.509.509,0,0,0-.528.487v.122A4.456,4.456,0,0,0,9.75,22h9.5a4.456,4.456,0,0,0,4.618-4.263v-.122a.509.509,0,0,0-.528-.487H22.02A8.3,8.3,0,0,0,24,11.769C24,6.934,19.738,3,14.5,3S5,6.934,5,11.769ZM22.791,18.1a3.477,3.477,0,0,1-3.541,2.923H9.75A3.477,3.477,0,0,1,6.209,18.1h5.652v.487a1.528,1.528,0,0,0,1.583,1.462h2.111a1.528,1.528,0,0,0,1.583-1.462l.009-.486S22.791,18.1,22.791,18.1ZM17.93,6.857a6.334,6.334,0,0,1,.936.681L9.912,15.8a5.929,5.929,0,0,1-.737-.865ZM8.66,14.035a5.465,5.465,0,0,1-.493-2.266A6.111,6.111,0,0,1,14.5,5.923a6.755,6.755,0,0,1,2.453.457ZM19.568,8.267a5.61,5.61,0,0,1,1.157,2.426l-6.972,6.435H11.967A6.5,6.5,0,0,1,10.7,16.45Zm-4.322,8.861,5.583-5.153a5.9,5.9,0,0,1-3.8,5.153Zm.837.974v.487a.509.509,0,0,1-.528.487H13.444a.509.509,0,0,1-.528-.487V18.1ZM14.5,3.974c4.656,0,8.444,3.5,8.444,7.795a7.448,7.448,0,0,1-2.313,5.359H19.067a6.673,6.673,0,0,0,2.822-5.359c0-3.761-3.315-6.82-7.389-6.82s-7.389,3.06-7.389,6.82a6.632,6.632,0,0,0,2.815,5.359H8.368a7.453,7.453,0,0,1-2.312-5.359C6.056,7.471,9.844,3.974,14.5,3.974Z" />
                                    <path id="Caminho_191" data-name="Caminho 191"
                                        d="M31.475,16.328l-.024-7.9s0-.009,0-.013a1.86,1.86,0,0,0-.3-.924A5.38,5.38,0,0,0,29.8,6.044a5.571,5.571,0,0,0-1.761-.938c-.961-.277-1.407.048-1.587.266a.954.954,0,0,0-.211.62s0,.008,0,.011L26.22,16.328a.516.516,0,0,0-.525.507v6.827H12.542l-4.49-.151-.389-.225a6.791,6.791,0,0,0-5.472-.58A1.683,1.683,0,0,0,1,24.3V27.08a1.683,1.683,0,0,0,1.19,1.593,6.8,6.8,0,0,0,5.472-.58l.389-.225,4.49-.151h14.2a2.106,2.106,0,0,0,1.942-1.252h2.787A.516.516,0,0,0,32,25.958V16.835A.516.516,0,0,0,31.475,16.328Zm-24.1,8.184L5.1,24.075a.525.525,0,0,0-.618.4.508.508,0,0,0,.412.6l2.474.477v.287L4.9,26.311a.508.508,0,0,0-.412.6A.521.521,0,0,0,5,27.315c.034,0,2.372-.448,2.372-.448v.212l-.251.145a5.708,5.708,0,0,1-4.6.487.667.667,0,0,1-.472-.631V24.3a.667.667,0,0,1,.472-.631,5.711,5.711,0,0,1,4.6.487l.251.145Zm4.635,2.208-1.269.043A.526.526,0,0,0,9.69,26.8l-1.267.043v-2.3l1.266.043v.55a.526.526,0,0,0,1.051,0v-.515l1.266.043ZM27.3,6.015a3.264,3.264,0,0,1,1.855.823A3.092,3.092,0,0,1,30.4,8.4a3.259,3.259,0,0,1-1.856-.823A3.12,3.12,0,0,1,27.3,6.021Zm0,1.831a6.586,6.586,0,0,0,.6.52,5.571,5.571,0,0,0,1.76.938,2.463,2.463,0,0,0,.68.107l.072,0,.018,4.892H27.273Zm-.019,7.469h3.153v1.014H27.271ZM26.746,26.7H13.058V24.676H26.746a1.014,1.014,0,1,1,0,2.027Zm4.2-1.252H28.832a2.079,2.079,0,0,0-2.087-1.789v-6.32h4.2Z" />
                                    <path id="Caminho_192" data-name="Caminho 192"
                                        d="M.379,6.761l.083.023a2.231,2.231,0,0,1,1.532,1.7l.021.092A.513.513,0,0,0,2.5,9a.513.513,0,0,0,.485-.421l.021-.092a2.231,2.231,0,0,1,1.532-1.7l.083-.023a.573.573,0,0,0,0-1.078A2.26,2.26,0,0,1,3.067,3.872L2.99,3.447A.517.517,0,0,0,2.5,3a.517.517,0,0,0-.49.447l-.077.425A2.26,2.26,0,0,1,.379,5.683a.573.573,0,0,0,0,1.078ZM2.5,5.242a3.371,3.371,0,0,0,.8.958,3.288,3.288,0,0,0-.8.881A3.287,3.287,0,0,0,1.7,6.2,3.371,3.371,0,0,0,2.5,5.242Z" />
                                    <path id="Caminho_193" data-name="Caminho 193"
                                        d="M4.379,3.134l.083.019A2.03,2.03,0,0,1,5.994,4.572l.021.077a.511.511,0,0,0,.97,0l.021-.077A2.03,2.03,0,0,1,8.538,3.154l.083-.019a.456.456,0,0,0,0-.9A2.033,2.033,0,0,1,7.067.727L6.99.372a.509.509,0,0,0-.981,0L5.933.727A2.033,2.033,0,0,1,4.379,2.236a.456.456,0,0,0,0,.9ZM6.5,1.868a3.008,3.008,0,0,0,.8.8,3,3,0,0,0-.8.735,3,3,0,0,0-.8-.735A3.008,3.008,0,0,0,6.5,1.868Z" />
                                </svg>

                            </div>
                            <p>Maquiagem</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- produtos -->
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

        <div class="limpar-filtro-wrapper" style="display:none;">
            <button id="btn-limpar-filtros">Limpar Filtros</button>
        </div>

        <section class="produtoFavoritado">
            <div class="title">
                <p>Mais Popular</p>
            </div>
            <div class="product-list">
                <?php foreach ($produtosPopulares as $produto): ?>
                    <div class="product-card" onclick="window.location.href='<?= BASE_URL ?>index.php?url=loja/produtoDetalhes/<?= $produto['link_produto'] ?>'">
                        <div class="heart" data-id="<?= $produto['id_produto'] ?>" onclick="event.stopPropagation(); toggleFavorito(<?= $produto['id_produto'] ?>, this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                                <g transform="translate(-0.5 -0.495)">
                                    <path
                                        d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                        fill="none" stroke-miterlimit="10" stroke-width="1" />
                                </g>
                            </svg>
                        </div>

                        <div class="card-img">
                            <?php
                            $caminhoArquivo = BASE_FOTO . $produto['foto_galeria'];
                            $img = BASE_FOTO . "produto/sem-foto-produto.png";
                            $alt_foto = "imagem sem foto";

                            if (!empty($produto['foto_galeria'])) {
                                $headers = @get_headers($caminhoArquivo);
                                if ($headers && strpos($headers[0], '200') !== false) {
                                    $img = $caminhoArquivo;
                                    $alt_foto = htmlspecialchars($produto['alt_foto_galeria'] ?? "imagem sem foto", ENT_QUOTES, 'UTF-8');
                                }
                            }
                            ?>
                            <img src="<?= htmlspecialchars($img) ?>" alt="<?= $alt_foto ?>">
                        </div>

                        <h3><?= htmlspecialchars($produto['nome_produto']) ?></h3>
                        <p class="category"><?= htmlspecialchars($produto['categoria_produto'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="price">
                            <span class="old-price">R$<?= number_format($produto['preco_anterior'] ?? 0, 2, ',', '.') ?></span>
                            <span class="new-price">R$<?= number_format($produto['preco_produto'] ?? 0, 2, ',', '.') ?></span>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="title">
                <p>Produtos</p>
            </div>

            <div class="product-list produtos-gerais">
                <?php foreach ($produtos as $produto): ?>
                    <div class="product-card" onclick="window.location.href='<?= BASE_URL ?>index.php?url=loja/produtoDetalhes/<?= $produto['link_produto'] ?>'">

                        <div class="heart" data-id="<?= $produto['id_produto'] ?>" onclick="event.stopPropagation(); toggleFavorito(<?= $produto['id_produto'] ?>, this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                                <g transform="translate(-0.5 -0.495)">
                                    <path
                                        d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                        stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                                </g>
                            </svg>
                        </div>
                        <div class="card-img">
                            <?php
                                $caminhoArquivo = BASE_FOTO . $produto['foto_galeria'];
                                $img = BASE_FOTO . "produto/sem-foto-produto.png";
                                $alt_foto = "imagem sem foto";

                                if (!empty($produto['foto_galeria'])) {
                                    $headers = @get_headers($caminhoArquivo);
                                    if ($headers && strpos($headers[0], '200') !== false) {
                                        $img = $caminhoArquivo;
                                        $alt_foto = htmlspecialchars($produto['alt_foto_galeria'] ?? "imagem sem foto", ENT_QUOTES, 'UTF-8');
                                    }
                                }
                            ?>
                            <img src="<?= htmlspecialchars($img) ?>" alt="<?= $alt_foto ?>">
                        </div>

                        <h3><?php echo $produto['nome_produto']; ?> </h3>

                        <p class="category"><?= htmlspecialchars($produto['categoria_produto'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="price">
                            <span class="old-price">R$<?= $produto['preco_anterior'] ?></span>
                            <span class="new-price">R$<?= $produto['preco_produto'] ?></span>
                        </p>
                    </div>

                <?php endforeach ?>
            </div>
        </section>

        <!-- navegação -->
        <?php
            require_once('templates/menuNav.php');
        ?>
    </main>

    <script src="<?= BASE_URL ?>public/assets/js/tema.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.slider-produtos .swiper', {
            effect: 'creative',
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
                clickable: true
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        document.addEventListener("DOMContentLoaded", function() {
            const iconLinks = document.querySelectorAll(".nav-icon a");
            const currentParams = new URLSearchParams(window.location.search);
            const currentUrl = currentParams.get("url");

            iconLinks.forEach(link => {
                const linkHref = link.getAttribute("href");
                const linkParams = new URLSearchParams(linkHref.split("?")[1]);
                const linkUrl = linkParams.get("url");

                link.classList.remove("icon-ativo");

                if (linkUrl === currentUrl || (!currentUrl && linkUrl === "home")) {
                    link.classList.add("icon-ativo");
                }
            });

            // Buscar favoritos e marcar
            const token = "<?= $_SESSION['token'] ?>";

            fetch("<?= BASE_API ?>listarFavoritos", {
                    method: "GET",
                    headers: {
                        "Authorization": "Bearer " + token
                    }
                })
                .then(res => res.json())
                .then(favoritos => {
                    if (Array.isArray(favoritos)) {
                        favoritos.forEach(fav => {
                            const el = document.querySelector(`.heart[data-id='${fav.id_produto}']`);
                            if (el) {
                                el.classList.add('favoritado');
                            }
                        });
                    }
                });
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

        document.addEventListener("DOMContentLoaded", function() {
            const BASE_URL = '<?= BASE_URL ?>';
            const token = '<?= $_SESSION['token'] ?>';
            const produtosContainer = document.querySelector('.product-list.produtos-gerais');
            const btnLimpar = document.getElementById('btn-limpar-filtros');
            const limparWrapper = document.querySelector('.limpar-filtro-wrapper');
            const inputBusca = document.querySelector('.input-busca');

            function mostrarBotaoLimpar() {
                limparWrapper.style.display = 'flex';
            }

            function esconderBotaoLimpar() {
                limparWrapper.style.display = 'none';
            }

            inputBusca.addEventListener('input', function() {
                const termo = this.value?.trim();
                if (!termo || termo.length < 2) return;

                fetch(`${BASE_URL}index.php?url=loja/buscarProduto`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'busca=' + encodeURIComponent(termo)
                    })
                    .then(res => res.json())
                    .then(data => {
                        renderizarProdutos(data);
                        mostrarBotaoLimpar();
                    });
            });

            document.querySelectorAll('.cardCategoria').forEach(card => {
                card.addEventListener('click', () => {
                    const categoria = card.querySelector('p')?.innerText?.trim();

                    fetch(`${BASE_URL}index.php?url=loja/buscarProdutoPorCategoria`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'categoria=' + encodeURIComponent(categoria)
                        })
                        .then(res => res.json())
                        .then(data => {
                            renderizarProdutos(data);
                            mostrarBotaoLimpar();
                        });
                });
            });

            btnLimpar.addEventListener('click', () => {
                fetch(`${BASE_URL}index.php?url=loja/buscarProduto`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'busca='
                    })
                    .then(res => res.json())
                    .then(data => {
                        renderizarProdutos(data);
                        inputBusca.value = '';
                        esconderBotaoLimpar();
                    });
            });

            function renderizarProdutos(data) {
                if (!produtosContainer) return;

                if (data.status === 'success' && Array.isArray(data.data)) {
                    let html = '';

                    if (data.data.length > 0) {
                        data.data.forEach(prod => {
                            const imagem = (prod.foto_galeria && prod.foto_galeria.trim() !== '') ?
                                `<?= BASE_FOTO ?>${prod.foto_galeria}` :
                                `<?= BASE_FOTO ?>produto/sem-foto-produto.png`;

                            html += `
                                <div class="product-card"onclick="window.location.href='<?= BASE_URL ?>index.php?url=loja/produtoDetalhes/<?= $produto['link_produto'] ?>'">
                                    <div class="heart" data-id="${prod.id_produto}" onclick="event.stopPropagation(); toggleFavorito(<?= $produto['id_produto'] ?>, this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.59 16.305">
                                            <g transform="translate(-0.5 -0.495)">
                                                <path d="M9.3,3.265h0l-.9-.943a4.2,4.2,0,0,0-6.126,0,4.679,4.679,0,0,0,0,6.406l7.027,7.349,7.027-7.349a4.679,4.679,0,0,0,0-6.406,4.2,4.2,0,0,0-6.126,0l-.9.943h0Z"
                                                    stroke="#c59d5f" stroke-miterlimit="10" stroke-width="1" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="card-img">
                                        <img src="${imagem}" alt="${prod.alt_foto_galeria ?? 'imagem'}">
                                    </div>
                                    <h3>${prod.nome_produto}</h3>
                                    <p class="category">${prod.categoria_produto}</p>
                                    <p class="price">
                                        <span class="old-price">R$ ${parseFloat(prod.preco_anterior ?? 0).toFixed(2).replace('.', ',')}</span>
                                        <span class="new-price">R$ ${parseFloat(prod.preco_produto ?? 0).toFixed(2).replace('.', ',')}</span>
                                    </p>
                                </div>
                            `;
                        });
                    } else {
                        html = '<p>Nenhum produto encontrado.</p>';
                    }

                    produtosContainer.innerHTML = html;
                } else {
                    produtosContainer.innerHTML = '';
                }
            }
        });
    </script>


</body>

</html>