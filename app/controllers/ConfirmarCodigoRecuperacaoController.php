<?php

class ConfirmarCodigoRecuperacaoController extends Controller
{

    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['recuperarSenha'])) {
            header('Location: ' . BASE_URL . 'index.php?url=esqueceuSenha');
            exit;
        }
        // $email = $_SESSION['recuperarSenha']['email'];
        // var_dump($email);

        // $id = $_SESSION['recuperarSenha']['id'];
        // var_dump($id);

        // $token = $_SESSION['recuperarSenha']['token'];
        // var_dump($token);

        $dados = array();
        $dados['titulo'] = "SaraFashion - Confirmar codigo recuperacao";
        $dados['email'] = $_SESSION['recuperarSenha']['email'];
        $this->carregarViews('confirmarCodigoRecuperacao', $dados);
    }

    public function validarCodigoRecuperacao()
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

        $token = $_SESSION['recuperarSenha']['token'] ?? null;
        $codigo = $_POST['codigo_verificacao'] ?? null;

        if (!$token || !$codigo) {
            http_response_code(400);
            echo json_encode(['erro' => 'Token ou código não informado']);
            exit;
        }

        // URL da sua API de validação
        $url = BASE_API . 'validarCodigoRecuperacao';

        // Dados para enviar via POST
        $postFields = http_build_query([
            'token_recuperacao' => $token,
            'codigo_verificacao' => $codigo,
        ]);

        // Inicializa cURL
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

        // Executa a requisição
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response === false) {
            curl_close($ch);
            http_response_code(500);
            echo json_encode(['erro' => 'Erro na comunicação com a API.']);
            exit;
        }

        curl_close($ch);

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(500);
            echo json_encode(['erro' => 'Resposta da API inválida.']);
            exit;
        }

        // Se sucesso, retorna sucesso, senão retorna o erro da API
        if ($httpCode === 200 && isset($data['sucesso'])) {
            echo json_encode(['sucesso' => $data['sucesso']]);
        } else {
            http_response_code($httpCode ?: 400);
            echo json_encode(['erro' => $data['erro'] ?? 'Erro desconhecido']);
        }
    }
}
