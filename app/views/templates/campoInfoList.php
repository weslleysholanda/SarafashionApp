<section class="campo-info">
    <div class="campo">
        <!-- Nome -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.667 15.544">
            <path
                d="M9.274,3.886A2.441,2.441,0,1,0,6.834,6.315,2.435,2.435,0,0,0,9.274,3.886Zm-6.346,0a3.905,3.905,0,1,1,3.9,3.886,3.9,3.9,0,0,1-3.9-3.886ZM1.5,14.087H12.166a3.97,3.97,0,0,0-3.936-3.4H5.443a3.97,3.97,0,0,0-3.936,3.4ZM0,14.642A5.425,5.425,0,0,1,5.44,9.229H8.228a5.425,5.425,0,0,1,5.44,5.413.9.9,0,0,1-.906.9H.906A.9.9,0,0,1,0,14.642Z"
                fill="#888" />
        </svg>
        <span><?= $cliente['nome_cliente'] ?></span>
    </div>

    <div class="campo">
        <!-- Tipo Pessoa -->
        <svg xmlns="http://www.w3.org/2000/svg" id="iconeTipoCliente" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
        </svg>
        <span><?= $cliente['tipo_cliente'] ?></span>
    </div>

    <div class="campo">
        <!-- documento cliente -->
        <svg id="iconeDocumento" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" fill="#888"/>
            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5" fill="#888">
        </svg>
        <span><?= $cliente['cpf_cnpj_cliente'] ?></span>
    </div>

    <div class="campo">
        <!-- Email -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 12">
            <path
                d="M15.75,64H2.25A2.136,2.136,0,0,0,0,66v8a2.136,2.136,0,0,0,2.25,2h13.5A2.136,2.136,0,0,0,18,74V66A2.136,2.136,0,0,0,15.75,64Zm-3.7,5.337 4.763-3.628a.871.871,0,0,1,.066.291v8a.855.855,0,0,1-.045.2ZM15.75,65a1.156,1.156,0,0,1,.211.038L9,70.342l-6.961-5.3A1.156,1.156,0,0,1,2.25,65ZM1.17,74.2a.845.845,0,0,1-.045-.2V66a.872.872,0,0,1,.066-.291l4.761,3.627Zm1.08.8a1.2,1.2,0,0,1-.321-.058l4.878-4.955 1.827,1.392a.613.613,0,0,0,.732,0l1.827-1.392 4.878,4.955A1.194,1.194,0,0,1,15.75,75Z"
                transform="translate(0 -64)" fill="#888" />
        </svg>
        <span><?= $cliente['email_cliente'] ?></span>
    </div>

    <div class="campo">
        <!-- Telefone -->
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path id="Caminho_278" data-name="Caminho 278"
                d="M4.111,1.494a.763.763,0,0,0-1.142-.071L1.806,2.587A1.93,1.93,0,0,0,1.3,4.579a19.8,19.8,0,0,0,4.689,7.434A19.8,19.8,0,0,0,13.422,16.7a1.93,1.93,0,0,0,1.991-.506l1.163-1.163a.763.763,0,0,0-.071-1.142l-2.6-2.018a.765.765,0,0,0-.652-.137l-2.464.615a1.969,1.969,0,0,1-1.864-.516L6.167,9.07A1.969,1.969,0,0,1,5.65,7.205l.616-2.464a.765.765,0,0,0-.137-.652ZM2.119.575A1.963,1.963,0,0,1,5.058.758L7.076,3.352A1.962,1.962,0,0,1,7.43,5.033L6.815,7.5a.765.765,0,0,0,.2.723l2.764,2.764a.765.765,0,0,0,.724.2l2.463-.615a1.969,1.969,0,0,1,1.681.354l2.594,2.018a1.963,1.963,0,0,1,.183,2.937l-1.163,1.163a3.124,3.124,0,0,1-3.237.79A20.924,20.924,0,0,1,5.139,12.86,20.924,20.924,0,0,1,.167,4.975,3.127,3.127,0,0,1,.957,1.738Z"
                transform="translate(0 0)" fill="#888" />
        </svg>

        <span><?= !empty($cliente['telefone_cliente']) ? $cliente['telefone_cliente'] : '(00) 00000-0000' ?></span>
    </div>

    <div class="campo">
        <!-- endereco -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>

        <span><?= !empty($cliente['endereco_cliente']) ? $cliente['endereco_cliente'] : 'Endereço:' ?></span>
    </div>

    <div class="campo">
        <!-- Bairro -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
        <span><?= $cliente['bairro_cliente'] ?></span>
    </div>

    <div class="campo">
        <!-- Data de nascimento -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path
                d="M3.5,0A.5.5,0,0,1,4,.5V1h8V.5a.5.5,0,0,1,1,0V1h1a2,2,0,0,1,2,2V14a2,2,0,0,1-2,2H2a2,2,0,0,1-2-2V3A2,2,0,0,1,2,1H3V.5A.5.5,0,0,1,3.5,0M1,4V14a1,1,0,0,0,1,1H14a1,1,0,0,0,1-1V4Z"
                fill="#888" />
        </svg>
        <?php
        $dataNasc = $cliente['data_nasc_cliente'] ?? null;
        $dataFormatada = '';

        if (!empty($dataNasc) && $dataNasc !== '0000-00-00') {
            $dataObj = DateTime::createFromFormat('Y-m-d', $dataNasc);
            if ($dataObj) {
                $dataFormatada = $dataObj->format('d/m/Y');
            }
        }
        ?>
        <span><?= htmlspecialchars($dataFormatada ?: '00/00/0000') ?></span>
    </div>

</section>