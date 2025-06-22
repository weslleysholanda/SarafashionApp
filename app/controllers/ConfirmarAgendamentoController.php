<?php

class ConfirmarAgendamentoController extends Controller
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
        $dados['titulo'] = 'Sarafashion - Confirmar Agendamento';
        $dados['servicos'] = $servicosSelecionados;
        $dados['total'] = $total;
        $dados['dataHora'] = $dataHoraSelecionada;

        // var_dump($dados['dataHora']);
        // var_dump($dados['servicos']);
        // var_dump($dados['total']);

        $this->carregarViews('confirmarAgendamento', $dados);
    }

    public function cadastrarAgendamento()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido.']);
            return;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['preAgendamento'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Dados do pré-agendamento não encontrados.']);
            return;
        }

        $preAgendamento = $_SESSION['preAgendamento'];

        $idServico = $preAgendamento['servicos'][0]['id'] ?? null;

        $dadosParaEnviar = [
            'id_servico' => $idServico,
            'data_agendamento' => $preAgendamento['data_hora'] ?? null,
            'status_agendamento' => 'Agendado'
        ];

        foreach ($dadosParaEnviar as $key => $value) {
            if (empty($value)) {
                http_response_code(400);
                echo json_encode(['erro' => "O campo {$key} é obrigatório."]);
                return;
            }
        }

        $urlApi = BASE_API . 'cadastrarAgendamento';

        $ch = curl_init($urlApi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dadosParaEnviar));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $_SESSION['token']
        ]);
        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        http_response_code($status);
        echo $response;
    }
}
