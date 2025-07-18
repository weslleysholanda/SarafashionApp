<!DOCTYPE html>
<html lang="en">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app tema favorito historico">
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
                    <h1>Histórico de Serviços</h1>
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

        <section class="listServicos">
            <div class="container-card">
                <?php foreach ($listarHistorico as $historicoServico): ?>
                    <div class="card">
                        <div class="box-img">
                            <img src="<?= BASE_URL ?>public/assets/img/depilacaoserv.jpeg" alt="imagem serviço depilação">
                            <span class="tag"><?= htmlspecialchars($historicoServico['nome_servico'], ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <div class="box-info">
                            <div class="servicoRealizado">
                                <h2>Serviço:</h2>
                                <h3><?= htmlspecialchars($historicoServico['nome_servico'], ENT_QUOTES, 'UTF-8') ?></h3>
                            </div>
                            <div class="servicoStatus">
                                <h2>Status:</h2>

                                <?php
                                $status = htmlspecialchars($historicoServico['status_agendamento'], ENT_QUOTES, 'UTF-8');

                                switch ($status) {
                                    case 'Concluído':
                                        echo '<span class="status concluido">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.871" height="14.284" viewBox="0 0 16.871 14.284">
                                            <g id="check_icon-icons.com_73639" transform="translate(0 -38.791)">
                                                <g id="Grupo_174" data-name="Grupo 174" transform="translate(0 36.401)">
                                                    <path id="Caminho_259" data-name="Caminho 259"
                                                        d="M14.081,44.243a.268.268,0,0,0-.122-.031.32.32,0,0,0-.233.1l-.649.649a.3.3,0,0,0-.091.223v2.577a1.628,1.628,0,0,1-1.623,1.623H2.922a1.563,1.563,0,0,1-1.146-.477A1.563,1.563,0,0,1,1.3,47.763v-8.44a1.563,1.563,0,0,1,.477-1.146A1.563,1.563,0,0,1,2.922,37.7h8.44a1.8,1.8,0,0,1,.456.061.326.326,0,0,0,.091.02.321.321,0,0,0,.233-.1l.5-.5a.315.315,0,0,0,.091-.294.308.308,0,0,0-.183-.233,2.793,2.793,0,0,0-1.187-.254H2.922a2.814,2.814,0,0,0-2.064.857A2.814,2.814,0,0,0,0,39.323v8.44a2.814,2.814,0,0,0,.857,2.064,2.814,2.814,0,0,0,2.064.857h8.44a2.928,2.928,0,0,0,2.922-2.922V44.537A.3.3,0,0,0,14.081,44.243Z"
                                                        transform="translate(0 -34.011)" />
                                                    <path id="Caminho_260" data-name="Caminho 260"
                                                        d="M87.394,56.315,86.278,55.2a.809.809,0,0,0-1.157,0l-6.564,6.564L75.89,59.1a.809.809,0,0,0-1.156,0l-1.116,1.116a.808.808,0,0,0,0,1.157L77.98,65.73a.809.809,0,0,0,1.156,0l8.258-8.258a.808.808,0,0,0,0-1.156Z"
                                                        transform="translate(-70.767 -51.906)" />
                                                </g>
                                            </g>
                                                </svg>
                                                Concluído
                                            </span>';
                                        break;

                                    case 'Agendado':
                                        echo '<span class="status agendado">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20.306" height="16.245" viewBox="0 0 20.306 16.245">
                                                    <g id="reload_78477" transform="translate(0 -51.197)">
                                                        <path id="Caminho_266" data-name="Caminho 266"
                                                            d="M125.05,59.319a8.122,8.122,0,0,0-13.866-5.743l1.914,1.914a5.415,5.415,0,0,1,9.244,3.829h-2.031L123.7,62.7l3.384-3.384Z"
                                                            transform="translate(-106.774)" />
                                                        <path id="Caminho_267" data-name="Caminho 267"
                                                            d="M10.153,179.464a5.421,5.421,0,0,1-5.415-5.415H6.769l-3.384-3.384L0,174.049H2.031A8.122,8.122,0,0,0,15.9,179.793l-1.914-1.914A5.38,5.38,0,0,1,10.153,179.464Z"
                                                            transform="translate(0 -114.73)" />
                                                    </g>
                                                </svg>
                                                Agendado
                                            </span>';
                                        break;

                                    case 'Cancelado':
                                        echo '<span class="status cancelado">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                    <g id="Grupo_345" data-name="Grupo 345" transform="translate(-86 -805)">
                                                        <path id="Caminho_280" data-name="Caminho 280"
                                                            d="M8,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7m0,1A8,8,0,1,0,0,8a8,8,0,0,0,8,8"
                                                            transform="translate(86 805)"/>
                                                        <path id="Caminho_281" data-name="Caminho 281"
                                                            d="M4.646,4.646a.5.5,0,0,1,.708,0L8,7.293l2.646-2.647a.5.5,0,0,1,.708.708L8.707,8l2.647,2.646a.5.5,0,0,1-.708.708L8,8.707,5.354,11.354a.5.5,0,1,1-.708-.708L7.293,8,4.646,5.354a.5.5,0,0,1,0-.708"
                                                            transform="translate(86 805)"/>
                                                    </g>
                                                </svg>
                                                Cancelado
                                            </span>';
                                        break;

                                    default:
                                        echo '<span class="status desconhecido">Status desconhecido</span>';
                                }
                                ?>
                            </div>

                            <div class="servicoDetalhes">
                                <button>Detalhes</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="card">
                        <div class="box-img">
                            <img src="<?= BASE_URL ?>public/assets/img/corteserv.jpeg" alt="imagem serviço corte visagista">
                            <span class="tag">Corte <br>Visagista</span>
                        </div>
                        <div class="box-info">
                            <div class="servicoRealizado">
                                <h2>Serviço:</h2>
                                <h3>corte visagista</h3>
                            </div>
                            <div class="servicoStatus">
                                <h2>Status: </h2>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.306" height="16.245"
                                        viewBox="0 0 20.306 16.245">
                                        <g id="reload_78477" transform="translate(0 -51.197)">
                                            <path id="Caminho_266" data-name="Caminho 266"
                                                d="M125.05,59.319a8.122,8.122,0,0,0-13.866-5.743l1.914,1.914a5.415,5.415,0,0,1,9.244,3.829h-2.031L123.7,62.7l3.384-3.384Z"
                                                transform="translate(-106.774)" />
                                            <path id="Caminho_267" data-name="Caminho 267"
                                                d="M10.153,179.464a5.421,5.421,0,0,1-5.415-5.415H6.769l-3.384-3.384L0,174.049H2.031A8.122,8.122,0,0,0,15.9,179.793l-1.914-1.914A5.38,5.38,0,0,1,10.153,179.464Z"
                                                transform="translate(0 -114.73)" />
                                        </g>
                                    </svg>

                                    pendente
                                </span>
                            </div>
                            <div class="servicoDetalhes">
                                <button>Detalhes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box-img">
                            <img src="<?= BASE_URL ?>public/assets/img/alongamentoserv.jpeg" alt="imagem serviço alongamento">
                            <span class="tag">Alongamento</span>
                        </div>
                        <div class="box-info">
                            <div class="servicoRealizado">
                                <h2>Serviço:</h2>
                                <h3>Alongamento</h3>
                            </div>
                            <div class="servicoStatus">
                                <h2>Status: </h2>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <g id="Grupo_345" data-name="Grupo 345" transform="translate(-86 -805)">
                                            <path id="Caminho_280" data-name="Caminho 280"
                                                d="M8,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7m0,1A8,8,0,1,0,0,8a8,8,0,0,0,8,8"
                                                transform="translate(86 805)"/>
                                            <path id="Caminho_281" data-name="Caminho 281"
                                                d="M4.646,4.646a.5.5,0,0,1,.708,0L8,7.293l2.646-2.647a.5.5,0,0,1,.708.708L8.707,8l2.647,2.646a.5.5,0,0,1-.708.708L8,8.707,5.354,11.354a.5.5,0,1,1-.708-.708L7.293,8,4.646,5.354a.5.5,0,0,1,0-.708"
                                                transform="translate(86 805)"/>
                                        </g>
                                    </svg>

                                    cancelado
                                </span>
                            </div>
                            <div class="servicoDetalhes">
                                <button>Detalhes</button>
                            </div>
                        </div>
                    </div> -->

            </div>

        </section>
    </main>
</body>

</html>