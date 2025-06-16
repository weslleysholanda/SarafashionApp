<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app perfil editar-perfil">
        <section class="header-perfil">
            <div class="header-nav">
                <header class="voltar">
                    <a href="<?= BASE_URL ?>index.php?url=perfil">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 15">
                            <path id="Caminho_6" data-name="Caminho 6"
                                d="M.281,38.669a1.249,1.249,0,0,0,0,1.516L5.53,46.611a.768.768,0,0,0,1.238,0,1.249,1.249,0,0,0,0-1.516l-4.631-5.67,4.628-5.67a1.249,1.249,0,0,0,0-1.516.768.768,0,0,0-1.238,0L.279,38.665Z"
                                transform="translate(-0.025 -31.925)" />
                        </svg>
                    </a>

                </header>
            </div>

        </section>

        <div class="of-height-10"></div>
        <section class="perfil-user">
            <div class="avatar-container">
                <form id="upload-foto-form" enctype="multipart/form-data">
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
                    <img src="<?= $img ?>" alt="<?= $alt_foto ?>" id="preview-img" />
                    <input type="file" name="foto_cliente" id="foto_cliente" style="display: none;" accept="image/*">

                    <button class="icon-pic" type="button" id="btn-selecionar-foto">
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
                    </button>
                </form>
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

            <div id="mensagem-upload"></div>
        </section>

        <section class="campo-info">
            <form method="POST" action="<?= BASE_URL ?>index.php?url=editarPerfil/index">
                <input type="hidden" name="_method" value="PATCH" />
                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path id="user-regular"
                            d="M12.214,4.5A3.034,3.034,0,0,0,9,1.688,3.034,3.034,0,0,0,5.786,4.5,3.034,3.034,0,0,0,9,7.313,3.034,3.034,0,0,0,12.214,4.5Zm-8.357,0C3.857,2.015,6.16,0,9,0s5.143,2.015,5.143,4.5S11.84,9,9,9,3.857,6.985,3.857,4.5ZM1.981,16.313H16.023a5.061,5.061,0,0,0-5.183-3.937H7.168a5.061,5.061,0,0,0-5.183,3.938ZM0,16.956c0-3.463,3.206-6.268,7.164-6.268h3.672c3.958,0,7.164,2.805,7.164,6.268A1.126,1.126,0,0,1,16.807,18H1.193A1.126,1.126,0,0,1,0,16.956Z"
                            fill="#888" />
                    </svg>
                    <input type="text" placeholder="Nome:" name="nome_cliente" value="<?= $cliente['nome_cliente'] ?>" />
                </div>

                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" id="iconeTipoCliente" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                    </svg>

                    <select class="form-select" name="tipo_cliente" id="tipoCliente" required>
                        <option selected disabled>Selecione o tipo</option>
                        <option value="Pessoa Jurídica" <?php echo ($cliente['tipo_cliente'] == 'Pessoa Jurídica') ? 'selected' : ''; ?>>Pessoa Jurídica</option>
                        <option value="Pessoa Física" <?php echo ($cliente['tipo_cliente'] == 'Pessoa Física') ? 'selected' : ''; ?>>Pessoa Física</option>
                    </select>
                </div>

                <div class="campo-input">
                    <svg id="iconeDocumento" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M12.214,4.5A3.034,3.034,0,0,0,9,1.688,3.034,3.034,0,0,0,5.786,4.5,3.034,3.034,0,0,0,9,7.313,3.034,3.034,0,0,0,12.214,4.5Zm-8.357,0C3.857,2.015,6.16,0,9,0s5.143,2.015,5.143,4.5S11.84,9,9,9,3.857,6.985,3.857,4.5ZM1.981,16.313H16.023a5.061,5.061,0,0,0-5.183-3.937H7.168a5.061,5.061,0,0,0-5.183,3.938ZM0,16.956c0-3.463,3.206-6.268,7.164-6.268h3.672c3.958,0,7.164,2.805,7.164,6.268A1.126,1.126,0,0,1,16.807,18H1.193A1.126,1.126,0,0,1,0,16.956Z"
                            fill="#888" />
                    </svg>

                    <input type="text" placeholder="CPF ou CNPJ" name="cpf_cnpj_cliente" id="cpfCnpjCliente" value="<?= $cliente['cpf_cnpj_cliente'] ?>" required />
                </div>

                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 13">
                        <path id="Caminho_9" data-name="Caminho 9"
                            d="M15.75,64H2.25A2.21,2.21,0,0,0,0,66.167v8.667A2.21,2.21,0,0,0,2.25,77h13.5A2.21,2.21,0,0,0,18,74.833V66.167A2.21,2.21,0,0,0,15.75,64Zm-3.7,5.782,4.763-3.93a1.01,1.01,0,0,1,.066.315v8.667a.992.992,0,0,1-.045.213Zm3.7-4.7a1.076,1.076,0,0,1,.211.041L9,70.87,2.039,65.125a1.076,1.076,0,0,1,.211-.041ZM1.17,75.045a.98.98,0,0,1-.045-.212V66.167a1.011,1.011,0,0,1,.066-.315l4.761,3.929Zm1.08.872a1.118,1.118,0,0,1-.321-.062l4.878-5.368,1.827,1.508a.576.576,0,0,0,.732,0l1.827-1.508,4.878,5.368a1.112,1.112,0,0,1-.321.062Z"
                            transform="translate(0 -64)" fill="#888" />
                    </svg>

                    <input type="email" placeholder="Email:" name="email_cliente" value="<?= $cliente['email_cliente'] ?>" />
                </div>

                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path id="Caminho_278" data-name="Caminho 278"
                            d="M4.111,1.494a.763.763,0,0,0-1.142-.071L1.806,2.587A1.93,1.93,0,0,0,1.3,4.579a19.8,19.8,0,0,0,4.689,7.434A19.8,19.8,0,0,0,13.422,16.7a1.93,1.93,0,0,0,1.991-.506l1.163-1.163a.763.763,0,0,0-.071-1.142l-2.6-2.018a.765.765,0,0,0-.652-.137l-2.464.615a1.969,1.969,0,0,1-1.864-.516L6.167,9.07A1.969,1.969,0,0,1,5.65,7.205l.616-2.464a.765.765,0,0,0-.137-.652ZM2.119.575A1.963,1.963,0,0,1,5.058.758L7.076,3.352A1.962,1.962,0,0,1,7.43,5.033L6.815,7.5a.765.765,0,0,0,.2.723l2.764,2.764a.765.765,0,0,0,.724.2l2.463-.615a1.969,1.969,0,0,1,1.681.354l2.594,2.018a1.963,1.963,0,0,1,.183,2.937l-1.163,1.163a3.124,3.124,0,0,1-3.237.79A20.924,20.924,0,0,1,5.139,12.86,20.924,20.924,0,0,1,.167,4.975,3.127,3.127,0,0,1,.957,1.738Z"
                            transform="translate(0 0)" fill="#888" />
                    </svg>


                    <input type="tel" placeholder="Telefone:" name="telefone_cliente" value="<?= $cliente['telefone_cliente'] ?>" />
                </div>

                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M3.5,0A.5.5,0,0,1,4,.5V1h8V.5a.5.5,0,0,1,1,0V1h1a2,2,0,0,1,2,2V14a2,2,0,0,1-2,2H2a2,2,0,0,1-2-2V3A2,2,0,0,1,2,1H3V.5A.5.5,0,0,1,3.5,0M1,4V14a1,1,0,0,0,1,1H14a1,1,0,0,0,1-1V4Z"
                            fill="#888" />
                    </svg>

                    <input type="date" placeholder="data de nascimento:" name="data_nasc_cliente" value="<?= $cliente['data_nasc_cliente'] ?>" />
                </div>

                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>

                    <input type="text" placeholder="Endereço:" name="endereco_cliente" value="<?= $cliente['endereco_cliente'] ?>" />
                </div>

                <div class="campo-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>

                    <input type="text" placeholder="Bairro:" name="bairro_cliente" value="<?= $cliente['bairro_cliente'] ?>" />
                </div>

                <div class="input-post">
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

    </main>
    <script src="<?= BASE_URL ?>public/assets/js/tema.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Upload de foto e preview
            const visualizarImg = document.getElementById('preview-img');
            const arquivo = document.getElementById('foto_cliente');

            visualizarImg.addEventListener('click', function() {
                arquivo.click();
            });

            arquivo.addEventListener('change', function() {
                if (arquivo.files && arquivo.files[0]) {
                    let render = new FileReader();
                    render.onload = function(e) {
                        visualizarImg.src = e.target.result;
                    }
                    render.readAsDataURL(arquivo.files[0]);
                }
            });

            // Elementos de ícone e input documento
            const select = document.getElementById('tipoCliente');
            const iconeTipoCliente = document.getElementById('iconeTipoCliente');
            const iconeDocumento = document.getElementById('iconeDocumento');
            const inputDoc = document.getElementById('cpfCnpjCliente');

            const iconestipoCliente = {
                'Pessoa Física': [
                    `M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z`,
                    `M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5`
                ],
                'Pessoa Jurídica': [
                    `M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z`,
                    `M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z`
                ]
            };

            // Ícones para campo documento
            const iconesDocumento = {
                'Pessoa Física': [
                    `M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z`,
                    `M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5`
                ],
                'Pessoa Jurídica': [
                    `M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z`,
                    `M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z`
                ]
            };

            select.addEventListener('change', () => {
                const tipo = select.value;

                // Troca ícone tipoCliente
                const pathsTipo = iconestipoCliente[tipo];
                if (pathsTipo) {
                    iconeTipoCliente.innerHTML = '';
                    pathsTipo.forEach(d => {
                        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                        path.setAttribute("d", d);
                        path.setAttribute("fill", "#888");
                        iconeTipoCliente.appendChild(path);
                    });
                }

                // Troca ícone documento
                const pathsDoc = iconesDocumento[tipo];
                if (pathsDoc) {
                    iconeDocumento.innerHTML = '';
                    pathsDoc.forEach(d => {
                        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                        path.setAttribute("d", d);
                        path.setAttribute("fill", "#888");
                        iconeDocumento.appendChild(path);
                    });
                }

                // Limpa e seta placeholder no campo documento
                inputDoc.value = '';
                inputDoc.setAttribute('placeholder', tipo === 'Pessoa Física' ? 'Digite o CPF' : 'Digite o CNPJ');
            });

            // Máscaras simples para CPF e CNPJ
            inputDoc.addEventListener('input', () => {
                let val = inputDoc.value.replace(/\D/g, '');

                if (select.value === 'Pessoa Física') {
                    if (val.length > 11) val = val.slice(0, 11);
                    val = val.replace(/(\d{3})(\d)/, '$1.$2');
                    val = val.replace(/(\d{3})(\d)/, '$1.$2');
                    val = val.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                } else if (select.value === 'Pessoa Jurídica') {
                    if (val.length > 14) val = val.slice(0, 14);
                    val = val.replace(/^(\d{2})(\d)/, '$1.$2');
                    val = val.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                    val = val.replace(/\.(\d{3})(\d)/, '.$1/$2');
                    val = val.replace(/(\d{4})(\d{1,2})$/, '$1-$2');
                }

                inputDoc.value = val;
            });
        });

        document.getElementById('btn-selecionar-foto').addEventListener('click', function() {
            document.getElementById('foto_cliente').click();
        });

        document.getElementById('foto_cliente').addEventListener('change', function() {
            const file = this.files[0];
            const msgDiv = document.getElementById('mensagem-upload');
            msgDiv.innerHTML = '';

            if (!file) return;

            const formData = new FormData();
            formData.append('foto_cliente', file);

            fetch("<?= BASE_URL ?>index.php?url=editarPerfil/uploadFoto", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'sucesso') {
                        // Atualiza a imagem
                        document.getElementById('preview-img').src = data.novaFoto;
                        exibirMensagem(data.mensagem, 'success');
                    } else if (data.status === 'erro') {
                        exibirMensagem(data.mensagem, 'error');
                    } else {
                        exibirMensagem('Ocorreu um erro desconhecido.', 'error');
                    }
                })
                .catch(err => {
                    console.error('Erro no envio da imagem:', err);
                    exibirMensagem('Erro inesperado ao enviar a imagem.', 'error');
                });
        });

        function exibirMensagem(mensagem, tipo) {
            const msgDiv = document.getElementById('mensagem-upload');
            msgDiv.innerHTML = `
            <div class="custom-alert-container">
                <div class="custom-alert ${tipo}">
                    ${mensagem}
                    <span class="close-btn" onclick="closeAlert(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </span>
                </div>
            </div>`;
        }

        function closeAlert(el) {
            const alertBox = el.closest('.custom-alert-container');
            alertBox.style.opacity = '0';
            alertBox.style.transform = 'translateY(-10px)';
            setTimeout(() => alertBox.remove(), 300);
        }


        $(document).ready(function() {
            $('input[name="telefone_cliente"]').mask('(00) 00000-0000');
        });
    </script>

</body>

</html>