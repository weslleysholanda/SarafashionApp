<?php

class HorarioServicoController extends Controller
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



        $servicosSelecionados = $_SESSION['preAgendamento']['servicos'];
        $total = $_SESSION['preAgendamento']['total'];

        $dados = array();
        $dados['titulo'] = 'Sarafashion - Escolha um horario';
        $dados['servicos'] = $servicosSelecionados;
        $dados['total'] = $total;
        // var_dump($_SESSION['preAgendamento']);
        // var_dump($dados['servicos']);
        // var_dump($dados['total']);
        $this->carregarViews('horario', $dados);
    }

    public function preSelecionaDataHora()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido.']);
            return;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $dataHora = $input['data_hora'] ?? '';

        if (empty($dataHora)) {
            http_response_code(400);
            echo json_encode(['erro' => 'Data e hora do agendamento são obrigatórios.']);
            return;
        }

        // Verifica se o array 'preAgendamento' existe na sessão, se não, cria
        if (!isset($_SESSION['preAgendamento'])) {
            $_SESSION['preAgendamento'] = [];
        }

        // Agora salva a data e hora corretamente
        $_SESSION['preAgendamento']['data_hora'] = $dataHora;

        // Envia para a API externa (caso necessário)
        $url = BASE_API . 'preSelecionaDataHora';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['data_hora' => $dataHora]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $respostaApi = json_decode($response, true);

        if ($status === 200) {
            echo json_encode(['mensagem' => 'Data e horário salvos com sucesso.']);
        } else {
            http_response_code($status);
            echo json_encode(['erro' => $respostaApi['erro'] ?? 'Erro ao salvar data e horário.']);
        }
    }
}
