<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>
    <main class="app config">
        <?php
            require_once('templates/background-box.php');
        ?>

        <section class="settings-container">
            <ul class="settings-list">
                <!-- Perfil -->
                <li class="setting-item">
                    <a href="perfil.html">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30.704" height="30.704"
                                viewBox="0 0 30.704 30.704">
                                <path
                                    d="M1.919,26.866V3.838A1.922,1.922,0,0,1,3.838,1.919h19.19a1.92,1.92,0,0,1,1.919,1.919V15.12L26.866,13.2V3.838A3.838,3.838,0,0,0,23.028,0H3.838A3.838,3.838,0,0,0,0,3.838V26.866A3.838,3.838,0,0,0,3.838,30.7H14.393V28.785H3.838A1.922,1.922,0,0,1,1.919,26.866ZM21.109,5.757H5.757V7.676H21.109Zm0,3.838H5.757v1.919H21.109Zm0,3.838H5.757v1.919H21.109ZM5.757,19.19h7.676V17.271H5.757Zm24.385-1.919-1.357-1.357a1.918,1.918,0,0,0-2.713,0l-8.238,8.238a6.848,6.848,0,0,0-1.522,2.315l-.96,4.236,4.235-.96A23.343,23.343,0,0,0,21.9,28.223l8.238-8.238A1.918,1.918,0,0,0,30.142,17.271ZM21.227,27.542a9.553,9.553,0,0,1-.944.649L17.8,25.706a8.527,8.527,0,0,1,.714-.875l6.2-6.2,2.714,2.714Z"
                                    fill="#4e545c" />
                            </svg>
                        </div>
                        <div class="text">
                            <h2 class="title">Perfil</h2>
                            <p class="subtitle">Nome, Data de nascimento, E-mail…</p>
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

                <!-- Tema -->
                <li class="setting-item">
                    <a href="">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29.662" height="29.662"
                                viewBox="0 0 29.662 29.662">
                                <g transform="translate(-24 -370.859)">
                                    <path
                                        d="M12.7,7.562A2.781,2.781,0,1,0,9.916,4.781,2.781,2.781,0,0,0,12.7,7.562m7.416,5.562a2.781,2.781,0,1,0-2.781-2.781,2.781,2.781,0,0,0,2.781,2.781M8.062,11.269A2.781,2.781,0,1,1,5.281,8.489a2.781,2.781,0,0,1,2.781,2.781m.927,11.123a2.781,2.781,0,1,0-2.781-2.781,2.781,2.781,0,0,0,2.781,2.781"
                                        transform="translate(26.135 372.566)" fill="#4e545c" />
                                    <path
                                        d="M29.662,14.831c0,5.84-3.459,4.792-6.613,3.838-1.878-.569-3.648-1.107-4.51-.13-1.118,1.266-.881,3.372-.651,5.413.328,2.92.643,5.71-3.057,5.71A14.831,14.831,0,1,1,29.662,14.831M14.831,27.808c1.133,0,1.212-.317,1.214-.326a4.291,4.291,0,0,0,.13-2.074c-.026-.311-.069-.686-.113-1.1-.1-.86-.208-1.863-.219-2.71a6.173,6.173,0,0,1,1.305-4.29,3.507,3.507,0,0,1,2.358-1.146,6.99,6.99,0,0,1,2.151.193c.636.143,1.3.345,1.9.527l.052.015c.641.195,1.22.369,1.767.493,1.211.274,1.676.154,1.837.044.07-.048.6-.454.6-2.607A12.977,12.977,0,1,0,14.831,27.808"
                                        transform="translate(24 370.859)" fill="#4e545c" />
                                </g>
                            </svg>
                        </div>
                        <div class="text">
                            <h2 class="title">Tema</h2>
                            <p class="subtitle">Alterar Tema</p>
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

                <!-- Notificações -->
                <li class="setting-item">
                    <a href="">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28.662" height="32.759"
                                viewBox="0 0 28.662 32.759">
                                <path
                                    d="M15.331,32.758a4.1,4.1,0,0,0,4.095-4.095H11.236a4.1,4.1,0,0,0,4.095,4.095m0-28.83-1.632.33a8.189,8.189,0,0,0-6.557,8.027,44.428,44.428,0,0,1-.94,7.661,26.483,26.483,0,0,1-1.357,4.623H25.817a26.609,26.609,0,0,1-1.357-4.623,44.429,44.429,0,0,1-.94-7.661,8.189,8.189,0,0,0-6.558-8.025ZM28.065,24.568a5.209,5.209,0,0,0,1.6,2.047H1a5.209,5.209,0,0,0,1.6-2.047c1.843-3.685,2.5-10.482,2.5-12.284a10.24,10.24,0,0,1,8.2-10.034,2.047,2.047,0,1,1,4.074,0,10.236,10.236,0,0,1,8.2,10.034c0,1.8.655,8.6,2.5,12.284"
                                    fill="#4e545c" />
                            </svg>
                        </div>
                        <div class="text">
                            <div class="title">Notificações</div>
                            <div class="subtitle">Configurar alertas</div>
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

                <!-- Segurança -->
                <li class="setting-item">
                    <a href="seguranca.html">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21.874" height="28.209"
                                viewBox="0 0 21.874 28.209">
                                <path
                                    d="M74.094,11.038V7.359c0-4.065-3.673-7.359-8.2-7.359s-8.2,3.294-8.2,7.359v3.679a2.605,2.605,0,0,0-2.734,2.453V25.756a2.605,2.605,0,0,0,2.734,2.453H74.094a2.6,2.6,0,0,0,2.734-2.453V13.491A2.6,2.6,0,0,0,74.094,11.038ZM60.423,7.359a5.5,5.5,0,0,1,10.937,0v3.679H60.423Zm13.672,18.4H57.688V13.491H74.094Zm-9.57-5.246v1.567a1.375,1.375,0,0,0,2.734,0V20.51A2.414,2.414,0,0,0,68.625,18.4a2.75,2.75,0,0,0-5.469,0A2.413,2.413,0,0,0,64.524,20.51Z"
                                    transform="translate(-54.954)" fill="#4e545c" />
                            </svg>
                        </div>
                        <div class="text">
                            <div class="title">Segurança</div>
                            <div class="subtitle">Alterar senha</div>
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
            </ul>

            <!-- Botão Sair -->
            <button class="logout-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24.404" height="28" viewBox="0 0 24.404 28">
                    <line x2="13" transform="translate(9.99 14)" fill="none" stroke="#fff" stroke-linecap="round"
                        stroke-width="2" />
                    <path
                        d="M23.93,25v3h-16V4h16V7h2V3a1,1,0,0,0-1-1h-18a1,1,0,0,0-1,1V29a1,1,0,0,0,1,1h18a1,1,0,0,0,1-1V25Z"
                        transform="translate(-5.93 -2)" fill="#fff" />
                    <line x1="4" y2="4" transform="translate(18.99 14)" fill="none" stroke="#fff" stroke-linecap="round"
                        stroke-width="2" />
                    <line x1="4" y1="4" transform="translate(18.99 10)" fill="none" stroke="#fff" stroke-linecap="round"
                        stroke-width="2" />
                    <line y1="2" transform="translate(18.99 4.09)" fill="none" stroke="#fff" stroke-linecap="round"
                        stroke-width="2" />
                    <path d="M0,2V0" transform="translate(18.99 22)" fill="none" stroke="#fff" stroke-linecap="round"
                        stroke-width="2" />
                </svg>
                <span>Sair</span>
            </button>
        </section>

        <div class="bottom-nav">
            <div class="nav-background">
                <img src="assets/img/Caminho367.png" alt="">
            </div>
            <div class="navbar-Fixed">
                <div class="nav-icon">
                    <div class="icon-Right">
                        <a href="#" class="icon-ativo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <path id="Caminho_358" data-name="Caminho 358"
                                    d="M1.036,44.218H3.48V55.179a1.12,1.12,0,0,0,1.047,1.174h7.156a1.12,1.12,0,0,0,1.047-1.174V47.154h4.364v8.025a1.12,1.12,0,0,0,1.047,1.174h6.807A1.12,1.12,0,0,0,26,55.179V44.218h2.967a1.054,1.054,0,0,0,.96-.724,1.287,1.287,0,0,0-.227-1.272L16.047,26.7a.965.965,0,0,0-1.466-.02L.321,42.2a1.279,1.279,0,0,0-.244,1.292A1.028,1.028,0,0,0,1.036,44.218ZM15.279,29.187,26.45,41.87h-1.5A1.12,1.12,0,0,0,23.9,43.044V54H19.189V45.98a1.12,1.12,0,0,0-1.047-1.174H11.683a1.12,1.12,0,0,0-1.047,1.174V54H5.574V43.044A1.12,1.12,0,0,0,4.527,41.87H3.62Z"
                                    transform="translate(0 -26.353)" fill="rgba(73,73,74,0.5)" />
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.572" height="28.869"
                                viewBox="0 0 23.572 28.869">
                                <path id="Caminho_361" data-name="Caminho 361"
                                    d="M12.786,1.8A4.368,4.368,0,0,1,17,6.315v.9H8.577v-.9A4.368,4.368,0,0,1,12.786,1.8m5.893,5.413v-.9A6.115,6.115,0,0,0,12.786,0,6.115,6.115,0,0,0,6.893,6.315v.9H1V25.26a3.494,3.494,0,0,0,3.367,3.609H21.2a3.494,3.494,0,0,0,3.367-3.609V7.217Zm-16,1.8h20.2V25.26a1.747,1.747,0,0,1-1.684,1.8H4.367a1.747,1.747,0,0,1-1.684-1.8Z"
                                    transform="translate(-1)" fill="rgba(73,73,74,0.5)" />
                            </svg>
                        </a>
                    </div>


                    <div class="icon-Left">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                                <path id="cart_1_" data-name="cart (1)"
                                    d="M0,1.867A.867.867,0,0,1,.867,1h2.6a.867.867,0,0,1,.841.657l.7,2.81H25.134a.867.867,0,0,1,.851,1.026l-2.6,13.867a.867.867,0,0,1-.851.707H6.934a.867.867,0,0,1-.851-.707L3.484,5.519,2.791,2.733H.867A.867.867,0,0,1,0,1.867M5.377,6.2,7.653,18.333H21.815L24.091,6.2Zm3.29,13.867a3.467,3.467,0,1,0,3.467,3.467,3.467,3.467,0,0,0-3.467-3.467m12.134,0a3.467,3.467,0,1,0,3.467,3.467A3.467,3.467,0,0,0,20.8,20.067M8.667,21.8a1.733,1.733,0,1,1-1.733,1.733A1.733,1.733,0,0,1,8.667,21.8m12.134,0a1.733,1.733,0,1,1-1.733,1.733A1.733,1.733,0,0,1,20.8,21.8"
                                    transform="translate(0 -1)" fill="rgba(73,73,74,0.5)" />
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">
                                <path id="Caminho_65" data-name="Caminho 65"
                                    d="M16,16A7,7,0,1,0,9,9a7,7,0,0,0,7,7ZM16,4a5,5,0,1,1-5,5A5,5,0,0,1,16,4Z"
                                    transform="translate(-4 -2)" fill="rgba(73,73,74,0.5)" />
                                <path id="Caminho_66" data-name="Caminho 66"
                                    d="M17,18H15A11,11,0,0,0,4,29a1,1,0,0,0,1,1H27a1,1,0,0,0,1-1A11,11,0,0,0,17,18ZM6.06,28A9,9,0,0,1,15,20h2a9,9,0,0,1,8.94,8Z"
                                    transform="translate(-4 -2)" fill="rgba(73,73,74,0.5)" />
                            </svg>
                        </a>

                    </div>
                </div>
                <div class="central-button">
                    <svg id="calendario" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                        <g id="Layer_2" data-name="Layer 2" transform="translate(0 1.372)">
                            <path id="Caminho_68" data-name="Caminho 68"
                                d="M23.192,26.628H7.808A4.664,4.664,0,0,1,3,22.122V9.506A4.664,4.664,0,0,1,7.808,5H23.192A4.664,4.664,0,0,1,28,9.506V22.122A4.664,4.664,0,0,1,23.192,26.628ZM7.808,6.8a2.8,2.8,0,0,0-2.885,2.7V22.122a2.8,2.8,0,0,0,2.885,2.7H23.192a2.8,2.8,0,0,0,2.885-2.7V9.506a2.8,2.8,0,0,0-2.885-2.7Z"
                                transform="translate(-3 -3)" fill="#fff" />
                            <path id="Caminho_70" data-name="Caminho 70"
                                d="M27.038,13H3.962a1,1,0,0,1,0-2H27.038a1,1,0,0,1,0,2Z"
                                transform="translate(-3 -3.791)" fill="#fff" />
                            <path id="Caminho_71" data-name="Caminho 71"
                                d="M11,9a1,1,0,0,1-1-1V4a1,1,0,0,1,2,0V8A1,1,0,0,1,11,9Z"
                                transform="translate(-3.292 -3)" fill="#fff" />
                            <path id="Caminho_72" data-name="Caminho 72"
                                d="M21,9a1,1,0,0,1-1-1V4a1,1,0,0,1,2,0V8A1,1,0,0,1,21,9Z"
                                transform="translate(-3.708 -3)" fill="#fff" />
                        </g>
                        <g id="frame" transform="translate(0.272)">
                            <rect id="Retângulo_49" data-name="Retângulo 49" width="24.28" height="25" fill="none" />
                        </g>
                    </svg>

                </div>
            </div>
        </div>
    </main>

</body>

</html>