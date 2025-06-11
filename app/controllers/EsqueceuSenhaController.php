<?php

class EsqueceuSenhaController extends Controller
{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Esqueceu a senha';

        $this->carregarViews('esqueceuSenha', $dados);
    }

    public function enviarCodigoRecuperacao()
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

        $email = filter_input(INPUT_POST, 'email_cliente', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            http_response_code(400);
            echo json_encode(['erro' => 'E-mail inválido.']);
            exit;
        }

        $ch = curl_init(BASE_API . 'esqueceuSenha');
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query(['email_cliente' => $email]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 8,
        ]);

        $response   = curl_exec($ch);
        $http_code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro interno ao chamar API.']);
            exit;
        }

        $data = json_decode($response, true);

        $_SESSION['recuperarSenha'] = [
            'email' => $email,
            'token' => $data['token']
        ];

        // var_dump($data['token']);
        

        if ($http_code === 200 && isset($data['sucesso'])) {
            http_response_code(200);
            echo json_encode(['sucesso' => $data['sucesso']]);
            exit;
        }

        http_response_code($http_code ?: 400);
        echo json_encode(['erro' => $data['erro'] ?? 'Erro inesperado ao enviar o código.']);
        exit;
    }

    public function sair()
    {
        // Destroi a sessão
        session_start();
        session_unset();
        session_destroy();

        // Redireciona para a tela de login
        header("Location: " . BASE_URL . "index.php?url=esqueceuSenha");
        exit;
    }
}
