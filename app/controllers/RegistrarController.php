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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $nome  = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $confirmarSenha = $_POST['confirmar_senha'] ?? null;

        if (!$nome || !$email || !$senha || !$confirmarSenha) {
            header('Location: ' . BASE_URL . 'index.php?url=registrar&erro=campos_obrigatorios');
            exit;
        }

        if ($senha !== $confirmarSenha) {
            header('Location: ' . BASE_URL . 'index.php?url=registrar&erro=senhas_diferentes');
            exit;
        }

        // Aqui chama a API preCadastro
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

            header('Location:' . BASE_URL . 'index.php?url=selecionarVerificacao');
            exit;
        } elseif ($statusCode === 409) {
            $erro = $responseData['erro'] ?? 'email_em_uso';
            header('Location: ' . BASE_URL . 'index.php?url=registrar&erro=' . $erro);
            exit;
        } else {
            $erro = $responseData['erro'] ?? 'erro_api';
            header('Location: ' . BASE_URL . 'index.php?url=registrar&erro=' . $erro);
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
