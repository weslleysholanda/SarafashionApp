<?php

class AgendamentoConfirmadoController extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['token'])) {
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        if (!isset($_SESSION['preAgendamento'])) {
            header('Location: ' . BASE_URL . 'index.php?url=agendamento');
            exit;
        }

        $servicosSelecionados = $_SESSION['preAgendamento']['servicos'] ?? [];
        $total = $_SESSION['preAgendamento']['total'] ?? 0;
        $dataHoraSelecionada = $_SESSION['preAgendamento']['data_hora'] ?? '';

        $dados = array();
        $dados['titulo'] = 'Sarafashion - Agendamento Confirmado';
        $dados['servicos'] = $servicosSelecionados;
        $dados['total'] = $total;
        $dados['dataHora'] = $dataHoraSelecionada;
        $this->carregarViews('agendamentoconfirmado', $dados);
    }

    public function home()
    {
        unset($_SESSION['preAgendamento']);
        header("Location: " . BASE_URL . "index.php?url=home");
    }
}
