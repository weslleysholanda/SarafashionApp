<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>

    <main class="app favorito historico agendamentos">
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
                    <h1>Meus agendamentos</h1>
                    <p>lembre-se de chegar com 5 minutos de antecedência.</p>
                </div>
            </div>
        </section>
        <section class="listServicos">
            <div class="container-card">
                <div class="card">
                    <div class="box-img">
                        <img src="<?= BASE_URL ?>public/assets/img/alongamentoserv.jpeg" alt="imagem serviço alongamento">
                        <span class="tag">Alongamento</span>
                    </div>
                    <div class="box-info">
                        <div class="servicoRealizado">
                            <h2>Serviço Especializado de
                                Alongamento</h2>
                        </div>
                        <div class="servicoStatus">
                            <div class="iconAgendamento">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 44.9 47.6">
                                    <path
                                        d="M38.2,4.7h-4.8v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-8.6v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-4.8C3.1,4.7,0,7.7,0,11.5v29.3c0,3.7,3,6.8,6.8,6.8h31.3c3.7,0,6.8-3,6.8-6.8V11.5c0-3.7-3-6.8-6.8-6.8h.1ZM28.3,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM13.2,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM1.6,11.5c0-2.9,2.4-5.3,5.3-5.3h4.8v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h8.6v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h4.8c2.9,0,5.3,2.4,5.3,5.3v2.5H1.6v-2.5ZM43.4,40.8c0,2.9-2.4,5.3-5.3,5.3H6.8c-2.9,0-5.3-2.4-5.3-5.3V15.5h41.9v25.3Z">
                                    </path>
                                    <path
                                        d="M7.3,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z">
                                    </path>
                                    <path
                                        d="M7.3,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z">
                                    </path>
                                    <path
                                        d="M19.8,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M19.8,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M32.2,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM31,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M37.7,32.3l-4.6,5.4-2.3-2c-.3-.3-.8-.2-1.1,0-.3.3-.2.8,0,1.1l2.9,2.5c.1.1.3.2.5.2s0,0,0,0c.2,0,.4-.1.5-.3l5.1-6c.3-.3.2-.8,0-1.1-.3-.3-.8-.2-1.1,0l.1.2Z">
                                    </path>
                                </svg>
                                <span>20 Abr 2025</span>
                            </div>
                            <div class="iconAgendamento">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.971 12.971">
                                    <g id="Grupo_347" data-name="Grupo 347" transform="translate(-0.313 -0.313)">
                                        <g id="Grupo_348" data-name="Grupo 348">
                                            <path id="Caminho_114" data-name="Caminho 114"
                                                d="M7.909.69a6.485,6.485,0,1,0,6.485,6.485A6.485,6.485,0,0,0,7.909.69Zm0,11.38A4.895,4.895,0,1,1,12.8,7.175,4.895,4.895,0,0,1,7.909,12.07Z"
                                                transform="translate(-1.111 -0.377)" />
                                            <path id="Caminho_117" data-name="Caminho 117"
                                                d="M11.383,7.176a.258.258,0,1,1-.352-.094A.258.258,0,0,1,11.383,7.176Z"
                                                transform="translate(-6.294 -3.854)" />
                                            <path id="Caminho_118" data-name="Caminho 118"
                                                d="M19.91,21.945a.258.258,0,1,1-.352-.094A.258.258,0,0,1,19.91,21.945Z"
                                                transform="translate(-10.957 -11.929)" />
                                            <path id="Caminho_119" data-name="Caminho 119"
                                                d="M8.039,10.684a.258.258,0,1,0-.258-.258A.258.258,0,0,0,8.039,10.684Z"
                                                transform="translate(-4.588 -5.561)" />
                                            <path id="Caminho_120" data-name="Caminho 120"
                                                d="M22.937,18.729a.258.258,0,1,1-.352.094A.258.258,0,0,1,22.937,18.729Z"
                                                transform="translate(-12.664 -10.223)" />
                                            <path id="Caminho_121" data-name="Caminho 121"
                                                d="M6.9,14.432a.258.258,0,1,1-.258.258A.258.258,0,0,1,6.9,14.432Z"
                                                transform="translate(-3.963 -7.892)" />
                                            <path id="Caminho_122" data-name="Caminho 122"
                                                d="M23.95,14.432a.258.258,0,1,1-.258.258A.258.258,0,0,1,23.95,14.432Z"
                                                transform="translate(-13.288 -7.892)" />
                                            <path id="Caminho_123" data-name="Caminho 123"
                                                d="M7.91,18.729a.258.258,0,1,1-.094.352A.258.258,0,0,1,7.91,18.729Z"
                                                transform="translate(-4.588 -10.223)" />
                                            <path id="Caminho_124" data-name="Caminho 124"
                                                d="M22.808,10.684a.258.258,0,1,0-.258-.258A.258.258,0,0,0,22.808,10.684Z"
                                                transform="translate(-12.664 -5.561)" />
                                            <path id="Caminho_125" data-name="Caminho 125"
                                                d="M10.937,21.945a.258.258,0,1,1,.094.352A.258.258,0,0,1,10.937,21.945Z"
                                                transform="translate(-6.294 -11.929)" />
                                            <path id="Caminho_126" data-name="Caminho 126"
                                                d="M19.464,7.176a.258.258,0,1,1,.094.352A.258.258,0,0,1,19.464,7.176Z"
                                                transform="translate(-10.957 -3.854)" />
                                            <path id="Caminho_127" data-name="Caminho 127"
                                                d="M15.424,23.474a.258.258,0,1,0-.258-.258A.258.258,0,0,0,15.424,23.474Z"
                                                transform="translate(-8.625 -12.554)" />
                                            <path id="Caminho_128" data-name="Caminho 128"
                                                d="M15.424,6.42a.258.258,0,1,0-.258-.258A.258.258,0,0,0,15.424,6.42Z"
                                                transform="translate(-8.625 -3.229)" />
                                            <path id="Caminho_129" data-name="Caminho 129"
                                                d="M17.143,13.908a.314.314,0,0,1-.161-.044l-1.814-1.088a.312.312,0,0,1-.152-.268V10.714a.313.313,0,0,1,.625,0v1.617l1.662,1a.313.313,0,0,1-.161.581Z"
                                                transform="translate(-8.544 -5.688)" />
                                        </g>
                                    </g>
                                </svg>
                                <span>14:00</span>
                            </div>
                        </div>
                        <div class="servicoDetalhes">
                            <button>Status: Agendado</button>
                            <button>Cancelar</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="box-img">
                        <img src="<?= BASE_URL ?>public/assets/img/corteserv.jpeg" alt="imagem serviço corte visa">
                        <span class="tag">Corte Visagista</span>
                    </div>
                    <div class="box-info">
                        <div class="servicoRealizado">
                            <h2>Serviço Especializado de
                                Corte Visagista</h2>
                        </div>
                        <div class="servicoStatus">
                            <div class="iconAgendamento">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 44.9 47.6">
                                    <path
                                        d="M38.2,4.7h-4.8v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-8.6v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-4.8C3.1,4.7,0,7.7,0,11.5v29.3c0,3.7,3,6.8,6.8,6.8h31.3c3.7,0,6.8-3,6.8-6.8V11.5c0-3.7-3-6.8-6.8-6.8h.1ZM28.3,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM13.2,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM1.6,11.5c0-2.9,2.4-5.3,5.3-5.3h4.8v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h8.6v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h4.8c2.9,0,5.3,2.4,5.3,5.3v2.5H1.6v-2.5ZM43.4,40.8c0,2.9-2.4,5.3-5.3,5.3H6.8c-2.9,0-5.3-2.4-5.3-5.3V15.5h41.9v25.3Z">
                                    </path>
                                    <path
                                        d="M7.3,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z">
                                    </path>
                                    <path
                                        d="M7.3,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z">
                                    </path>
                                    <path
                                        d="M19.8,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M19.8,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M32.2,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM31,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M37.7,32.3l-4.6,5.4-2.3-2c-.3-.3-.8-.2-1.1,0-.3.3-.2.8,0,1.1l2.9,2.5c.1.1.3.2.5.2s0,0,0,0c.2,0,.4-.1.5-.3l5.1-6c.3-.3.2-.8,0-1.1-.3-.3-.8-.2-1.1,0l.1.2Z">
                                    </path>
                                </svg>
                                <span>20 Abr 2025</span>
                            </div>
                            <div class="iconAgendamento">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.971 12.971">
                                    <g id="Grupo_347" data-name="Grupo 347" transform="translate(-0.313 -0.313)">
                                        <g id="Grupo_348" data-name="Grupo 348">
                                            <path id="Caminho_114" data-name="Caminho 114"
                                                d="M7.909.69a6.485,6.485,0,1,0,6.485,6.485A6.485,6.485,0,0,0,7.909.69Zm0,11.38A4.895,4.895,0,1,1,12.8,7.175,4.895,4.895,0,0,1,7.909,12.07Z"
                                                transform="translate(-1.111 -0.377)" />
                                            <path id="Caminho_117" data-name="Caminho 117"
                                                d="M11.383,7.176a.258.258,0,1,1-.352-.094A.258.258,0,0,1,11.383,7.176Z"
                                                transform="translate(-6.294 -3.854)" />
                                            <path id="Caminho_118" data-name="Caminho 118"
                                                d="M19.91,21.945a.258.258,0,1,1-.352-.094A.258.258,0,0,1,19.91,21.945Z"
                                                transform="translate(-10.957 -11.929)" />
                                            <path id="Caminho_119" data-name="Caminho 119"
                                                d="M8.039,10.684a.258.258,0,1,0-.258-.258A.258.258,0,0,0,8.039,10.684Z"
                                                transform="translate(-4.588 -5.561)" />
                                            <path id="Caminho_120" data-name="Caminho 120"
                                                d="M22.937,18.729a.258.258,0,1,1-.352.094A.258.258,0,0,1,22.937,18.729Z"
                                                transform="translate(-12.664 -10.223)" />
                                            <path id="Caminho_121" data-name="Caminho 121"
                                                d="M6.9,14.432a.258.258,0,1,1-.258.258A.258.258,0,0,1,6.9,14.432Z"
                                                transform="translate(-3.963 -7.892)" />
                                            <path id="Caminho_122" data-name="Caminho 122"
                                                d="M23.95,14.432a.258.258,0,1,1-.258.258A.258.258,0,0,1,23.95,14.432Z"
                                                transform="translate(-13.288 -7.892)" />
                                            <path id="Caminho_123" data-name="Caminho 123"
                                                d="M7.91,18.729a.258.258,0,1,1-.094.352A.258.258,0,0,1,7.91,18.729Z"
                                                transform="translate(-4.588 -10.223)" />
                                            <path id="Caminho_124" data-name="Caminho 124"
                                                d="M22.808,10.684a.258.258,0,1,0-.258-.258A.258.258,0,0,0,22.808,10.684Z"
                                                transform="translate(-12.664 -5.561)" />
                                            <path id="Caminho_125" data-name="Caminho 125"
                                                d="M10.937,21.945a.258.258,0,1,1,.094.352A.258.258,0,0,1,10.937,21.945Z"
                                                transform="translate(-6.294 -11.929)" />
                                            <path id="Caminho_126" data-name="Caminho 126"
                                                d="M19.464,7.176a.258.258,0,1,1,.094.352A.258.258,0,0,1,19.464,7.176Z"
                                                transform="translate(-10.957 -3.854)" />
                                            <path id="Caminho_127" data-name="Caminho 127"
                                                d="M15.424,23.474a.258.258,0,1,0-.258-.258A.258.258,0,0,0,15.424,23.474Z"
                                                transform="translate(-8.625 -12.554)" />
                                            <path id="Caminho_128" data-name="Caminho 128"
                                                d="M15.424,6.42a.258.258,0,1,0-.258-.258A.258.258,0,0,0,15.424,6.42Z"
                                                transform="translate(-8.625 -3.229)" />
                                            <path id="Caminho_129" data-name="Caminho 129"
                                                d="M17.143,13.908a.314.314,0,0,1-.161-.044l-1.814-1.088a.312.312,0,0,1-.152-.268V10.714a.313.313,0,0,1,.625,0v1.617l1.662,1a.313.313,0,0,1-.161.581Z"
                                                transform="translate(-8.544 -5.688)" />
                                        </g>
                                    </g>
                                </svg>
                                <span>14:00</span>
                            </div>
                        </div>
                        <div class="servicoDetalhes">
                            <button>Status: Agendado</button>
                            <button>Cancelar</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="box-img">
                        <img src="<?= BASE_URL ?>public/assets/img/depilacaoserv.jpeg" alt="imagem serviço depilação">
                        <span class="tag">Depilaçao</span>
                    </div>
                    <div class="box-info">
                        <div class="servicoRealizado">
                            <h2>Serviço Especializado de
                                Depilaçao</h2>
                        </div>
                        <div class="servicoStatus">
                            <div class="iconAgendamento">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 44.9 47.6">
                                    <path
                                        d="M38.2,4.7h-4.8v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-8.6v-1.4c0-1.8-1.5-3.3-3.3-3.3s-3.3,1.5-3.3,3.3v1.4h-4.8C3.1,4.7,0,7.7,0,11.5v29.3c0,3.7,3,6.8,6.8,6.8h31.3c3.7,0,6.8-3,6.8-6.8V11.5c0-3.7-3-6.8-6.8-6.8h.1ZM28.3,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM13.2,3.3c0-1,.8-1.8,1.8-1.8s1.8.8,1.8,1.8v4.5c0,1-.8,1.8-1.8,1.8s-1.8-.8-1.8-1.8V3.3ZM1.6,11.5c0-2.9,2.4-5.3,5.3-5.3h4.8v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h8.6v1.7c0,1.8,1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3v-1.7h4.8c2.9,0,5.3,2.4,5.3,5.3v2.5H1.6v-2.5ZM43.4,40.8c0,2.9-2.4,5.3-5.3,5.3H6.8c-2.9,0-5.3-2.4-5.3-5.3V15.5h41.9v25.3Z">
                                    </path>
                                    <path
                                        d="M7.3,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z">
                                    </path>
                                    <path
                                        d="M7.3,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM6.1,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3,0,0,0-3.1,0-3.1Z">
                                    </path>
                                    <path
                                        d="M19.8,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M19.8,41.3h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM18.5,35.4c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M32.2,28.9h4.4c1.5,0,2.8-1.2,2.8-2.8v-3.1c0-1.5-1.2-2.8-2.8-2.8h-4.4c-1.5,0-2.8,1.2-2.8,2.8v3.1c0,1.5,1.2,2.8,2.8,2.8ZM31,23c0-.7.6-1.3,1.3-1.3h4.4c.7,0,1.3.6,1.3,1.3v3.1c0,.7-.6,1.3-1.3,1.3h-4.4c-.7,0-1.3-.6-1.3-1.3v-3.1Z">
                                    </path>
                                    <path
                                        d="M37.7,32.3l-4.6,5.4-2.3-2c-.3-.3-.8-.2-1.1,0-.3.3-.2.8,0,1.1l2.9,2.5c.1.1.3.2.5.2s0,0,0,0c.2,0,.4-.1.5-.3l5.1-6c.3-.3.2-.8,0-1.1-.3-.3-.8-.2-1.1,0l.1.2Z">
                                    </path>
                                </svg>
                                <span>20 Abr 2025</span>
                            </div>
                            <div class="iconAgendamento">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.971 12.971">
                                    <g id="Grupo_347" data-name="Grupo 347" transform="translate(-0.313 -0.313)">
                                        <g id="Grupo_348" data-name="Grupo 348">
                                            <path id="Caminho_114" data-name="Caminho 114"
                                                d="M7.909.69a6.485,6.485,0,1,0,6.485,6.485A6.485,6.485,0,0,0,7.909.69Zm0,11.38A4.895,4.895,0,1,1,12.8,7.175,4.895,4.895,0,0,1,7.909,12.07Z"
                                                transform="translate(-1.111 -0.377)" />
                                            <path id="Caminho_117" data-name="Caminho 117"
                                                d="M11.383,7.176a.258.258,0,1,1-.352-.094A.258.258,0,0,1,11.383,7.176Z"
                                                transform="translate(-6.294 -3.854)" />
                                            <path id="Caminho_118" data-name="Caminho 118"
                                                d="M19.91,21.945a.258.258,0,1,1-.352-.094A.258.258,0,0,1,19.91,21.945Z"
                                                transform="translate(-10.957 -11.929)" />
                                            <path id="Caminho_119" data-name="Caminho 119"
                                                d="M8.039,10.684a.258.258,0,1,0-.258-.258A.258.258,0,0,0,8.039,10.684Z"
                                                transform="translate(-4.588 -5.561)" />
                                            <path id="Caminho_120" data-name="Caminho 120"
                                                d="M22.937,18.729a.258.258,0,1,1-.352.094A.258.258,0,0,1,22.937,18.729Z"
                                                transform="translate(-12.664 -10.223)" />
                                            <path id="Caminho_121" data-name="Caminho 121"
                                                d="M6.9,14.432a.258.258,0,1,1-.258.258A.258.258,0,0,1,6.9,14.432Z"
                                                transform="translate(-3.963 -7.892)" />
                                            <path id="Caminho_122" data-name="Caminho 122"
                                                d="M23.95,14.432a.258.258,0,1,1-.258.258A.258.258,0,0,1,23.95,14.432Z"
                                                transform="translate(-13.288 -7.892)" />
                                            <path id="Caminho_123" data-name="Caminho 123"
                                                d="M7.91,18.729a.258.258,0,1,1-.094.352A.258.258,0,0,1,7.91,18.729Z"
                                                transform="translate(-4.588 -10.223)" />
                                            <path id="Caminho_124" data-name="Caminho 124"
                                                d="M22.808,10.684a.258.258,0,1,0-.258-.258A.258.258,0,0,0,22.808,10.684Z"
                                                transform="translate(-12.664 -5.561)" />
                                            <path id="Caminho_125" data-name="Caminho 125"
                                                d="M10.937,21.945a.258.258,0,1,1,.094.352A.258.258,0,0,1,10.937,21.945Z"
                                                transform="translate(-6.294 -11.929)" />
                                            <path id="Caminho_126" data-name="Caminho 126"
                                                d="M19.464,7.176a.258.258,0,1,1,.094.352A.258.258,0,0,1,19.464,7.176Z"
                                                transform="translate(-10.957 -3.854)" />
                                            <path id="Caminho_127" data-name="Caminho 127"
                                                d="M15.424,23.474a.258.258,0,1,0-.258-.258A.258.258,0,0,0,15.424,23.474Z"
                                                transform="translate(-8.625 -12.554)" />
                                            <path id="Caminho_128" data-name="Caminho 128"
                                                d="M15.424,6.42a.258.258,0,1,0-.258-.258A.258.258,0,0,0,15.424,6.42Z"
                                                transform="translate(-8.625 -3.229)" />
                                            <path id="Caminho_129" data-name="Caminho 129"
                                                d="M17.143,13.908a.314.314,0,0,1-.161-.044l-1.814-1.088a.312.312,0,0,1-.152-.268V10.714a.313.313,0,0,1,.625,0v1.617l1.662,1a.313.313,0,0,1-.161.581Z"
                                                transform="translate(-8.544 -5.688)" />
                                        </g>
                                    </g>
                                </svg>
                                <span>14:00</span>
                            </div>
                        </div>
                        <div class="servicoDetalhes">
                            <button>Status: Agendado</button>
                            <button>Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

</body>

</html>