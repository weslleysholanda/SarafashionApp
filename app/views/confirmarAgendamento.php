<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php');
?>

<body>

    <main class="app escolha checkout agendamento confirmar">
        <section class="header-nav">
            <header>
                <a href="<?= BASE_URL ?>index.php?url=horarioServico">
                    <button><i class="fa-solid fa-arrow-left"></i></button>
                </a>
                <h1>Confirmar Agendamento</h1>
            </header>
        </section>

        <section class="progress-line-bar">
            <div class="bar-line">
                <div class="stepper">
                    <div class="progress-line"></div>
                    <div class="background-line"></div>

                    <div class="step">
                        <div class="circle">1</div>
                        <span>Login</span>
                    </div>
                    <div class="step">
                        <div class="circle">2</div>
                        <span>Escolha</span>
                    </div>
                    <div class="step">
                        <div class="circle">3</div>
                        <span>Horário</span>
                    </div>
                    <div class="step current">
                        <div class="circle">4</div>
                        <span>Confirmação</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="detalhesAgendamento">
            <div class="container-title">
                <h2>Detalhe do agendamento</h2>
            </div>
            <div id="mensagem"></div>
            <div class="info-agendamento">
                <div class="container-Agendamento">
                    <div class="data">
                        <a href="<?= BASE_URL ?>index.php?url=horarioServico" class="mudar">
                            <span>Data:</span>
                            <span><?= date('H:i, d M Y', strtotime($dataHora)) ?></span>
                            <span>mudar <svg xmlns="http://www.w3.org/2000/svg" width="6.998" height="12"
                                    viewBox="0 0 6.998 12">
                                    <path id="Caminho_96" data-name="Caminho 96"
                                        d="M11.88,60.1l-.6-.6a.378.378,0,0,0-.553,0L6,64.228,1.275,59.5a.378.378,0,0,0-.553,0l-.6.6a.378.378,0,0,0,0,.553l5.6,5.6a.378.378,0,0,0,.553,0l5.6-5.6a.379.379,0,0,0,0-.553Z"
                                        transform="translate(-59.382 12) rotate(-90)" fill="#4e545c" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="servico">
                        <a href="<?= BASE_URL ?>index.php?url=agendamento" class="mudar">
                            <span>Serviço:</span>
                            <span id="adaptacao">
                                <?php foreach ($servicos as $servico): ?>
                                    <?= htmlspecialchars($servico['nome']) ?><br>
                                <?php endforeach; ?>
                            </span>
                            <span>mudar <svg xmlns="http://www.w3.org/2000/svg" width="6.998" height="12"
                                    viewBox="0 0 6.998 12">
                                    <path id="Caminho_96" data-name="Caminho 96"
                                        d="M11.88,60.1l-.6-.6a.378.378,0,0,0-.553,0L6,64.228,1.275,59.5a.378.378,0,0,0-.553,0l-.6.6a.378.378,0,0,0,0,.553l5.6,5.6a.378.378,0,0,0,.553,0l5.6-5.6a.379.379,0,0,0,0-.553Z"
                                        transform="translate(-59.382 12) rotate(-90)" fill="#4e545c" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="detalhesCupom">
            <div class="container-title">
                <h2>Aplicar Cupom</h2>
            </div>

            <div class="info-cupom">
                <div class="container-cupom">
                    <div class="pontos">
                        <a href="" class="mudar">
                            <span>Pontos:</span>
                            <span>0 Pontos <svg xmlns="http://www.w3.org/2000/svg" width="6.998" height="12"
                                    viewBox="0 0 6.998 12">
                                    <path id="Caminho_96" data-name="Caminho 96"
                                        d="M11.88,60.1l-.6-.6a.378.378,0,0,0-.553,0L6,64.228,1.275,59.5a.378.378,0,0,0-.553,0l-.6.6a.378.378,0,0,0,0,.553l5.6,5.6a.378.378,0,0,0,.553,0l5.6-5.6a.379.379,0,0,0,0-.553Z"
                                        transform="translate(-59.382 12) rotate(-90)" fill="#4e545c" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="footerCheckout">
            <div class="confirmFooter">
                <div class="container-confirmFooter">
                    <div class="leftFooter">
                        <h2>Total <span>R$ <?= number_format($total, 2, ',', '.') ?></span></h2>
                        <h3>0 Pontos</h3>
                    </div>
                    <div class="rightFooter">
                        <button id="btn-confirmar">
                            Confirmar
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="19" height="19" viewBox="0 0 19 19">
                                    <image id="next" width="19" height="19"
                                        xlink:href="data:image/png;base64,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" />
                                </svg>

                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script src="https://kit.fontawesome.com/25f4259441.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnConfirmar = document.getElementById('btn-confirmar');
            const mensagem = document.getElementById('mensagem');

            if (btnConfirmar) {
                btnConfirmar.addEventListener('click', confirmarAgendamento);
            }

            function confirmarAgendamento() {
                fetch('<?= BASE_URL ?>index.php?url=confirmarAgendamento/cadastrarAgendamento', {
                        method: 'POST'
                    })
                    .then(async (response) => {
                        const text = await response.text();
                        try {
                            const data = JSON.parse(text);
                            if (!response.ok) {
                                throw new Error(data.erro || 'Erro no servidor');
                            }
                            return data;
                        } catch (e) {
                            console.error('Resposta não é JSON:', text);
                            throw new Error('Resposta inesperada do servidor.');
                        }
                    })
                    .then((result) => {
                        if (result.mensagem) {
                            exibirAlerta('success', 'Agendamento confirmado com sucesso!');
                            window.location.href = '<?= BASE_URL ?>index.php?url=agendamentoConfirmado';
                        } else {
                            exibirAlerta('error', result.message || result.erro || 'Erro ao confirmar o agendamento.');
                        }
                    })
                    .catch((error) => {
                        console.error('Erro:', error);
                        exibirAlerta('error', error.message || 'Erro inesperado ao tentar agendar. Tente novamente.');
                    });
            }

            function exibirAlerta(tipo, msg) {
                mensagem.innerHTML = `
            <div class="custom-alert-container">
                <div class="custom-alert ${tipo}">
                    ${msg}
                    <span class="close-btn" onclick="fecharAlerta(this);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </span>
                </div>
            </div>
        `;
            }

            function fecharAlerta(el) {
                const alertBox = el.closest('.custom-alert-container');
                if (alertBox) {
                    alertBox.style.opacity = '0';
                    alertBox.style.transform = 'translateY(-10px)';
                    setTimeout(() => alertBox.remove(), 300);
                }
            }
        });
    </script>






</body>

</html>