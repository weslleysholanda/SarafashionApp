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

        // Criptografa a senha antes de salvar
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $_SESSION['preRegistro'] = [
            'nome'  => $nome,
            'email' => $email,
            'senha' => $senhaHash
        ];

        header('Location:' . BASE_URL . 'index.php?url=selecionarVerificacao');
        exit;
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
