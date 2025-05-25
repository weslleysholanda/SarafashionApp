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
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        //Fazer a requisição da API de login
        $url = BASE_API . "login?email_cliente=$email&senha_cliente=$senha";

        //Reconhecimento da chave (Inicializa uma sessão cURL)
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        //Recebe os dados dessa solicitação
        $response = curl_exec($ch);

        //Obtém o código HTTP da resposta (200, 400, 401)
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //Encerra a sessão da chave
        curl_close($ch);

        if ($statusCode == 200) {
            $data = json_decode($response, true);

            if (!empty($data['token'])) {
                $_SESSION['token'] = $data['token'];

                header("Location: " . BASE_URL . "index.php?url=home");
                exit;
            } else {
                header("Location: " . BASE_URL . "index.php?url=login");
                exit;
            }
        } else {
            echo "Login Inválido!";
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
