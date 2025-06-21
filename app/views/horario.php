<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once('templates/head.php');
?>

<body>
    <main class="app checkout escolha agendamento">
        <?php
            require_once('templates/header-agendamento-hora.php');
        ?>

        <?php
            require_once('templates/progress-line-bar.php');
        ?>

        <?php
            require_once('templates/dataAgendamento.php');
        ?>

        <?php
            require_once('templates/horarios.php');
        ?>

        <?php
            require_once('templates/footerCheckout.php');
        ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/25f4259441.js" crossorigin="anonymous"></script>

    <script>
        // Seleciona o container onde os dias vão ser adicionados (o swiper-wrapper)
        const swiperWrapper = document.querySelector('.date-selector .swiper-wrapper');

        // Array com os nomes dos dias da semana (Domingo a Sábado)
        const diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

        // Variável para controlar quantos dias já foram adicionados (começa em 0)
        let diasAdicionados = 0;

        // Função que gera um número de dias e adiciona no swiper
        function gerarDias(quantidade) {
            // Pega a data de hoje
            const hoje = new Date();

            // Loop que vai gerar "quantidade" de dias
            for (let i = diasAdicionados; i < diasAdicionados + quantidade; i++) {
                const data = new Date(); // Cria uma nova data
                data.setDate(hoje.getDate() + i); // Avança a data conforme o loop (i)

                // Se for o primeiro (hoje), escreve "Hoje", senão pega o nome do dia
                const diaSemana = (i === 0) ? 'Hoje' : diasSemana[data.getDay()];

                // Pega o dia do mês e o mês (já formatados com dois dígitos)
                const dia = String(data.getDate()).padStart(2, '0');
                const mes = String(data.getMonth() + 1).padStart(2, '0');

                // Cria a div que representa um dia (estrutura visual)
                const div = document.createElement('div');
                div.classList.add('swiper-slide', 'date-item');

                // Adiciona o conteúdo (nome do dia e a data no círculo)
                div.innerHTML = `
                    <span>${diaSemana}</span>
                    <div class="circle">${dia}/${mes}</div>
                `;

                // Adiciona o evento de clique — ao clicar, destaca o item
                div.addEventListener('click', () => {
                    // Remove a classe 'active' de todos os itens
                    document.querySelectorAll('.date-item').forEach(el => el.classList.remove('active'));
                    // Adiciona a classe 'active' no clicado
                    div.classList.add('active');
                });

                // Adiciona essa div dentro do swiper-wrapper
                swiperWrapper.appendChild(div);
            }

            // Atualiza o controle de dias já adicionados
            diasAdicionados += quantidade;
        }

        // Chama a função pra gerar os 6 primeiros dias quando a página carrega
        gerarDias(6);

        // Cria a instância do Swiper (slider)
        const swiper = new Swiper('.date-selector.swiper', {
            slidesPerView: 6, // Mostra 6 itens por vez
            freeMode: true, // Permite deslizar livremente (scroll com dedo ou mouse)

            // Evento: quando o usuário chega no final do slider
            on: {
                reachEnd: function() {
                    // Gera mais 6 dias
                    gerarDias(6);
                    // Atualiza o swiper pra reconhecer os novos slides
                    this.update(); // 'this' se refere ao swiper dentro do evento
                }
            }
        });

        document.querySelectorAll('.horario.disponivel').forEach(button => {
            button.addEventListener('click', () => {
                // Remove a classe 'selecionado' de todos os botões
                document.querySelectorAll('.horario.selecionado').forEach(b => b.classList.remove('selecionado'));

                // Adiciona a classe 'selecionado' apenas ao clicado
                button.classList.add('selecionado');
            });
        });
    </script>

</body>

</html>