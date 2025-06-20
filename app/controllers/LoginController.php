<?php

class LoginController extends Controller
{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Login ';

        $this->carregarViews('login', $dados);
    }

    //Método de autenticação
    public function autenticar()
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

        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if (!$email || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Preencha todos os campos.']);
            exit;
        }

        $url = BASE_API . "login?email_cliente=$email&senha_cliente=$senha";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode == 200) {
            $data = json_decode($response, true);

            if (!empty($data['token'])) {
                $_SESSION['token'] = $data['token'];
                echo json_encode(['sucesso' => true]);
                exit;
            } else {
                http_response_code(401);
                echo json_encode(['erro' => 'Token inválido.']);
                exit;
            }
        } else {
            http_response_code(401);
            echo json_encode(['erro' => 'Login ou senha incorretos.']);
            exit;
        }
    }



    public function sair()
    {
        // Destroi a sessão e remove o token
        session_start();
        session_unset();
        session_destroy();

        // Redireciona para a tela de login
        header("Location: " . BASE_URL . "index.php?url=login");
        exit;
    }
}
