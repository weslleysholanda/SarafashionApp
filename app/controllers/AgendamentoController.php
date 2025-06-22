<?php

class AgendamentoController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['token'])) {
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        $dadosToken = TokenHelper::validar($_SESSION['token']);

        if (!$dadosToken) {
            session_destroy();
            unset($_SESSION['token']);
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        $urlListarServicoAgendamento = BASE_API . "listartServicoAgendamento";
        $chListarServicoAgendamento = curl_init($urlListarServicoAgendamento);
        curl_setopt($chListarServicoAgendamento, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chListarServicoAgendamento, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $responseListarServico = curl_exec($chListarServicoAgendamento);
        $statusCodeListarServico = curl_getinfo($chListarServicoAgendamento, CURLINFO_HTTP_CODE);
        curl_close($chListarServicoAgendamento);

        if ($statusCodeListarServico != 200) {
            echo "Erro ao buscar a lista de servicos na API. \n
            Código HTTP: $statusCodeListarServico";
            exit;
        }

        $listarServicoAgendamento = json_decode($responseListarServico, true);
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Agendar Serviço';
        $dados['listAgendamentServ'] = $listarServicoAgendamento;
        // var_dump($dados['listAgendamentServ']);
        $this->carregarViews('escolha', $dados);
    }

    public function preSelecionarServicos()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido.']);
            return;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $dados = json_decode(file_get_contents('php://input'), true);
        $servicos = $dados['servicos'] ?? [];
        $total = $dados['total'] ?? 0;

        if (empty($servicos) || !is_array($servicos)) {
            http_response_code(400);
            echo json_encode(['erro' => 'Selecione pelo menos um serviço.']);
            return;
        }

        $_SESSION['preAgendamento']['servicos'] = $servicos;
        $_SESSION['preAgendamento']['total'] = $total;


        echo json_encode(['sucesso' => true]);
    }

    public function Sair(){
        unset($_SESSION['preAgendamento']);
        header("Location: " . BASE_URL . "index.php?url=agendamento");
        exit;
    }
}
