<?php

class AlterarSenhaController extends Controller
{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Alterar Senha ';

        $this->carregarViews('recuperarSenha', $dados);
        $dados['token'] = $_SESSION['recuperarSenha']['token'];
        // var_dump($dados['token']);
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
            return;
        }

        $novaSenha = $_POST['senha'] ?? null;
        $confirmarSenha = $_POST['confirmar_senha'] ?? null;

        if (!$novaSenha || !$confirmarSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Preencha todos os campos.']);
            return;
        }

        if ($novaSenha !== $confirmarSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'As senhas não conferem.']);
            return;
        }

        $token = $_SESSION['recuperarSenha']['token'] ?? null;

        if (!$token) {
            http_response_code(401);
            echo json_encode(['erro' => 'Token ausente ou sessão expirada.']);
            return;
        }

        // Consumo da API real
        $ch = curl_init(BASE_API . 'alterarSenha');
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query([
                'token'            => $token,
                'nova_senha'       => $novaSenha,
                'confirmar_senha'  => $confirmarSenha
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 8,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/x-www-form-urlencoded'],
        ]);

        $resp = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($resp === false) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro na comunicação com a API.']);
            return;
        }

        $data = json_decode($resp, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(500);
            echo json_encode(['erro' => 'Resposta inválida da API.']);
            return;
        }

        if ($code === 200 && !empty($data['sucesso'])) {
            unset($_SESSION['recuperarSenha']);
            echo json_encode(['sucesso' => $data['sucesso']]);
        } else {
            http_response_code($code ?: 400);
            echo json_encode(['erro' => $data['erro'] ?? 'Erro desconhecido.']);
        }
    }
}
