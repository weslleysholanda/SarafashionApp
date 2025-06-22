<?php

class MeusAgendamentosController extends Controller
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

        $url = BASE_API . "listarAgendamento";
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $listarAgendamento = [];

        if ($statusCode === 200) {
            $listarAgendamento = json_decode($response, true);
        } elseif ($statusCode === 404) {
            $listarAgendamento = [];
        } else {
            die("Erro ao buscar favoritos. Código HTTP: $statusCode");
        }

        $dados = array();
        $dados['titulo'] = 'Sarafashion - Meus Agendamentos';
        $dados['agendamento'] = $listarAgendamento;
        // var_dump($dados['agendamento']);
        $this->carregarViews('meusAgendamentos', $dados);
    }
    
    public function cancelarAgendamento()
    {
        if (!isset($_SESSION['token'])) {
            http_response_code(401);
            echo json_encode(['erro' => 'Não autorizado']);
            return;
        }

        $dadosToken = TokenHelper::validar($_SESSION['token']);
        if (!$dadosToken) {
            session_destroy();
            unset($_SESSION['token']);
            http_response_code(401);
            echo json_encode(['erro' => 'Token inválido']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        if (empty($input['id_agendamento'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'ID do agendamento é obrigatório']);
            return;
        }

        $idAgendamento = intval($input['id_agendamento']);

        $ch = curl_init(BASE_API . 'cancelarAgendamento');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $_SESSION['token']
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'id_agendamento' => $idAgendamento
        ]));

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        http_response_code($statusCode);
        echo $response;
    }
}
