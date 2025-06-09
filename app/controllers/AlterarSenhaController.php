<?php

class AlterarSenhaController extends Controller
{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Alterar Senha ';
        $this->carregarViews('recuperarSenha', $dados);
    }

    public function atualizarSenha()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        header('Content-Type: application/json; charset=utf-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido']);
            exit;
        }

        $novaSenha = $_POST['nova_senha'] ?? null;
        $confirmarSenha = $_POST['confirmar_senha'] ?? null;

        if (!$novaSenha || !$confirmarSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Preencha todos os campos.']);
            exit;
        }

        if ($novaSenha !== $confirmarSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'As senhas não conferem.']);
            exit;
        }

        $idCliente = $_SESSION['recuperarSenha']['id_cliente'] ?? null;

        if (!$idCliente) {
            http_response_code(401);
            echo json_encode(['erro' => 'Usuário não autenticado para essa ação.']);
            exit;
        }

        // URL da API para atualizar senha
        $url = BASE_API . 'alterarSenha';

        // Prepare o POST com id e nova senha (hash se necessário na API)
        $postFields = http_build_query([
            'id_cliente' => $idCliente,
            'nova_senha' => $novaSenha,
        ]);

        // cURL para chamar API
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 8,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded'
            ],
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro na comunicação com a API.']);
            exit;
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(500);
            echo json_encode(['erro' => 'Resposta inválida da API.']);
            exit;
        }

        if ($httpCode === 200 && isset($data['sucesso'])) {
            // Sucesso na alteração da senha
            echo json_encode(['sucesso' => $data['sucesso']]);
        } else {
            http_response_code($httpCode ?: 400);
            echo json_encode(['erro' => $data['erro'] ?? 'Erro desconhecido.']);
        }
    }
}
