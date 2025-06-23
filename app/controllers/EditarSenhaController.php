<?php

class EditarSenhaController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['token'])) {
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        $dadosToken = TokenHelper::validar($_SESSION['token']);

        if (!$dadosToken) {
            session_destroy();
            unset($_SESSION['token']);
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        //Buscar o cliente na API
        $url = BASE_API . "cliente/" . $dadosToken['id'];

        //Reconhecimento da chave (Inicializa uma sessão cURL)
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);


        //Recebe os dados dessa solicitação
        $response = curl_exec($ch);
        //Obtém o código HTTP da resposta (200, 400, 401)
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //Encerra a sessão da chave
        curl_close($ch);

        if ($statusCode != 200) {
            echo "Erro ao buscar o cliente na API. \n
            Código HTTP: $statusCode";
            exit;
        }

        //Separa os dados em 'campos'
        $cliente = json_decode($response, true);
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Editar Senha';
        $dados['cliente'] = $cliente;
        $this->carregarViews('alterarSenha', $dados);
    }

    public function alterarSenha()
    {
        if (!isset($_SESSION['token'])) {
            http_response_code(401);
            echo json_encode(['erro' => 'Não autorizado']);
            return;
        }

        $dadosToken = TokenHelper::validar($_SESSION['token']);

        if (!$dadosToken) {
            http_response_code(401);
            echo json_encode(['erro' => 'Sessão inválida']);
            return;
        }

        // Verifica se é uma requisição PATCH via AJAX simulada com POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PATCH') {
            $novaSenha = $_POST['nova_senha'] ?? '';

            if (strlen($novaSenha) < 6) {
                echo json_encode(['erro' => 'A senha deve ter no mínimo 6 caracteres.']);
                return;
            }

            $url = BASE_API . "editarSenhaCliente/" . $dadosToken['id'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'nova_senha' => $novaSenha
            ]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/json'
            ]);

            $resposta = curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($statusCode === 200) {
                echo json_encode(['mensagem' => 'Senha atualizada com sucesso.']);
            } else {
                $respostaDecoded = json_decode($resposta, true);
                $erro = $respostaDecoded['erro'] ?? 'Erro desconhecido';
                http_response_code($statusCode);
                echo json_encode(['erro' => $erro]);
            }

            return;
        }

        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido']);
    }
}
