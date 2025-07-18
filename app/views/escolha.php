<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once('templates/head.php')
?>

<body>
    <main class="app checkout escolha">
        <section class="header-nav">
            <header>
                <a href="<?= BASE_URL ?>index.php?url=home">
                    <button><i class="fas fa-times"></i></button>
                </a>
                <h1>Escolha um serviço</h1>

            </header>
        </section>

        <section class="progress-line-bar">
            <div class="bar-line">
                <div class="stepper">
                    <div class="progress-line"></div>
                    <div class="background-line"></div>

                    <div class="step active">
                        <div class="circle">1</div>
                        <span>Login</span>
                    </div>
                    <div class="step current">
                        <div class="circle">2</div>
                        <span>Escolha</span>
                    </div>
                    <div class="step">
                        <div class="circle">3</div>
                        <span>Horário</span>
                    </div>
                    <div class="step">
                        <div class="circle">4</div>
                        <span>Confirmação</span>
                    </div>
                </div>
            </div>
        </section>

        <div id="mensagem"></div>

        <section class="escolhaServico">
            <div class="container-escolha">
                <form>
                    <?php foreach ($listAgendamentServ as $serv): ?>
                        <div class="service">
                            <input type="checkbox" data-id-servico="<?= $serv['id_servico'] ?>" data-nome="<?= htmlspecialchars($serv['nome_servico'], ENT_QUOTES, 'UTF-8') ?>" data-preco="<?= $serv['preco_base_servico'] ?>" />
                            <div class="content">
                                <div class="top-row">
                                    <span class="title"><?= htmlspecialchars($serv['nome_servico'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <div class="info">
                                        <?php
                                        $tempo = $serv['tempo_estimado_servico']; // exemplo: "01:30:00"
                                        list($horas, $minutos, $segundos) = explode(':', $tempo);
                                        $totalMinutos = ($horas * 60) + $minutos;
                                        ?>
                                        <span><?= $totalMinutos ?> minutos</span>
                                        <span>R$<?= htmlspecialchars($serv['preco_base_servico'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                </div>
                                <hr />
                                <p><?= htmlspecialchars($serv['descricao_servico'], ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- <div class="service">
                        <input type="checkbox" />
                        <div class="content">
                            <div class="top-row">
                                <span class="title">Maquiagem</span>
                                <div class="info">
                                    <span>50 minutos</span>
                                    <span>R$ 00.00</span>
                                </div>
                            </div>
                            <hr />
                            <p>Serviço profissional para realçar a beleza, adequado para diversas ocasiões, como festas
                                e eventos.</p>
                        </div>
                    </div>

                    <div class="service">
                        <input type="checkbox" />
                        <div class="content">
                            <div class="top-row">
                                <span class="title">Corte Visagista</span>
                                <div class="info">
                                    <span>50 minutos</span>
                                    <span>R$ 00.00</span>
                                </div>
                            </div>
                            <hr />
                            <p>Corte personalizado que valoriza o formato do rosto e a personalidade da cliente.</p>
                        </div>
                    </div>

                    <div class="service">
                        <input type="checkbox" />
                        <div class="content">
                            <div class="top-row">
                                <span class="title">Alongamento</span>
                                <div class="info">
                                    <span>50 minutos</span>
                                    <span>R$ 00.00</span>
                                </div>
                            </div>
                            <hr />
                            <p>Aplicação de extensões para aumentar o comprimento e o volume dos cabelos..</p>
                        </div>
                    </div>

                    <div class="service">
                        <input type="checkbox" />
                        <div class="content">
                            <div class="top-row">
                                <span class="title">Dia da Noiva</span>
                                <div class="info">
                                    <span>50 minutos</span>
                                    <span>R$ 00.00</span>
                                </div>
                            </div>
                            <hr />
                            <p>Pacote especial com penteado, maquiagem e outros cuidados para o grande dia da noiva.</p>
                        </div>
                    </div> -->
                </form>
            </div>
        </section>

        <section class="footerCheckout">
            <div class="confirmFooter">
                <div class="container-confirmFooter">
                    <div class="leftFooter">
                        <h2>Total <span>R$ 00,00</span></h2>
                        <h3>(Sujeito a reajuste)</h3>
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
        // Atualiza estilo e calcula total ao selecionar serviços
        document.querySelectorAll('.service input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const service = this.closest('.service');
                service.classList.toggle('selected', this.checked);
                calcularTotal();
            });
        });

        // Evento de confirmação
        document.getElementById('btn-confirmar').addEventListener('click', function(e) {
            e.preventDefault();

            const servicosSelecionados = [];
            let total = 0;

            document.querySelectorAll('.service input[type="checkbox"]:checked').forEach(checkbox => {
                const idServico = checkbox.dataset.idServico;
                const preco = parseFloat(checkbox.dataset.preco);

                if (idServico && !isNaN(preco)) {
                    servicosSelecionados.push({
                        id: parseInt(idServico),
                        nome: checkbox.dataset.nome,
                        preco: preco
                    });
                    total += preco;
                }
            });

            if (servicosSelecionados.length === 0) {
                showMessage('Selecione pelo menos um serviço.', 'error');
                return;
            }

            fetch('<?= BASE_URL ?>index.php?url=agendamento/preSelecionarServicos', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        servicos: servicosSelecionados,
                        total: total
                    }),
                    credentials: "include"
                })
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso) {
                        window.location.href = '<?= BASE_URL ?>index.php?url=horarioServico';
                    } else {
                        showMessage(data.erro || 'Erro ao pré-selecionar os serviços.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                    showMessage('Erro ao enviar o pré-agendamento.', 'error');
                });
        });

        // Atualiza o total na interface
        function calcularTotal() {
            let total = 0;

            document.querySelectorAll('.service input[type="checkbox"]:checked').forEach(checkbox => {
                const preco = parseFloat(checkbox.dataset.preco);
                if (!isNaN(preco)) total += preco;
            });

            const totalSpan = document.querySelector('.leftFooter h2 span');
            totalSpan.textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
        }

        function showMessage(msg, tipo = 'error') {
            const mensagemDiv = document.getElementById('mensagem');
            mensagemDiv.innerHTML = `
            <div class="custom-alert-container">
                <div class="custom-alert ${tipo}">
                    ${msg}
                    <span class="close-btn" onclick="closeAlert(this);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </span>
                </div>
            </div><div class="custom-alert-container">
                <div class="custom-alert ${tipo}">
                    ${msg}
                    <span class="close-btn" onclick="closeAlert(this);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </span>
                </div>
            </div>
        `;
        }

        function closeAlert(el) {
            const alertBox = el.closest('.custom-alert-container');
            alertBox.style.opacity = '0';
            alertBox.style.transform = 'translateY(-10px)';
            setTimeout(() => alertBox.remove(), 300);
        }
    </script>
</body>

</html>