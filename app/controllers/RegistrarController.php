<?php

class RegistrarController extends Controller
{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Registrar ';

        $this->carregarViews('registrar', $dados);
    }

    public function preRegistro()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido']);
            exit;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $nome  = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $confirmarSenha = $_POST['confirmar_senha'] ?? null;

        // Validações
        if (!$nome || !$email || !$senha || !$confirmarSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Preencha todos os campos obrigatórios.']);
            exit;
        }

        if ($senha !== $confirmarSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'As senhas não coincidem.']);
            exit;
        }

        // Chamada API
        $url = BASE_API . 'preCadastro';

        $dados = [
            'nome'  => $nome,
            'email' => $email,
            'senha' => $senha
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($statusCode === 200) {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $_SESSION['preRegistro'] = [
                'nome'  => $nome,
                'email' => $email,
                'senha' => $senhaHash
            ];

            echo json_encode(['sucesso' => true]);
            exit;
        } elseif ($statusCode === 409) {
            http_response_code(409);
            $erro = $responseData['erro'] ?? 'Este e-mail já está em uso.';
            echo json_encode(['erro' => $erro]);
            exit;
        } else {
            http_response_code(500);
            $erro = $responseData['erro'] ?? 'Erro na API. Tente novamente.';
            echo json_encode(['erro' => $erro]);
            exit;
        }
    }

    public function sair()
    {
        // Destroi a sessão
        session_start();
        session_unset();
        session_destroy();

        // Redireciona para a tela de login
        header("Location: " . BASE_URL . "index.php?url=registrar");
        exit;
    }
}
