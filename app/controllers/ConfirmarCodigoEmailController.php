<?php

class ConfirmarCodigoEmailController extends Controller
{

    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        // var_dump($_SESSION['preRegistro']);
        // var_dump($_SESSION['verificacao_email']);
        // var_dump($_SESSION['verificacao_email']['codigo']);

        // Garante que o pré-registro foi feito
        if (!isset($_SESSION['preRegistro'])) {
            header('Location: ' . BASE_URL . 'index.php?url=registrar');
            exit;
        }

        $dados = array();
        $dados['titulo'] = 'Verificar codigo por E-mail';
        $dados['email'] = $_SESSION['verificacao_email']['email'];
        $this->carregarViews('confirmarCodigoEmail', $dados);
    }

    public function validarCodigo()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido.']);
            return;
        }

        $codigoDigitado = $_POST['codigo_verificacao'] ?? null;

        if (!$codigoDigitado) {
            http_response_code(400);
            echo json_encode(['erro' => 'Código não informado.']);
            return;
        }

        if (!isset($_SESSION['verificacao_email'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Código não enviado ou expirado.']);
            return;
        }

        $dadosSessao = $_SESSION['verificacao_email'];

        if (time() > $dadosSessao['expira_em']) {
            unset($_SESSION['verificacao_email']);
            http_response_code(400);
            echo json_encode(['erro' => 'Código expirado.']);
            return;
        }

        if ($codigoDigitado != $dadosSessao['codigo']) {
            http_response_code(401);
            echo json_encode(['erro' => 'Código incorreto.']);
            return;
        }

        // var_dump($codigoDigitado);
        // var_dump($dadosSessao['codigo']);
        // Dados do pré-registro
        $nome  = $_SESSION['preRegistro']['nome'];
        $email = $_SESSION['preRegistro']['email'];
        $senha = $_SESSION['preRegistro']['senha'];



        $url = BASE_API . "cadastrarCliente";
        $dados = [
            'nome_cliente'  => $nome,
            'email_cliente' => $email,
            'senha_cliente' => $senha
        ];
        
        // var_dump($dados);

        

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
        // var_dump($response);
        // exit;

        if ($response === false || $statusCode >= 500) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao cadastrar o cliente.']);
            return;
        }

        $respostaApi = json_decode($response, true);

        if (isset($respostaApi['erro'])) {
            http_response_code(400);
            echo json_encode(['erro' => $respostaApi['erro']]);
            return;
        }

        // Guarda o token na sessão, se existir
        if (isset($respostaApi['token'])) {
            $_SESSION['token'] = $respostaApi['token'];
        }

        // Limpa sessões
        unset($_SESSION['verificacao_email']);
        unset($_SESSION['preRegistro']);

        // Redireciona
        header('Location: ' . BASE_URL . 'index.php?url=concluidoEmail');
        exit;
    }
}
