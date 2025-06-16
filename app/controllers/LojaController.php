<?php


class LojaController extends Controller
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

        $urlListarProduto = BASE_API . "listarProdutos";
        $chListarProduto = curl_init($urlListarProduto);
        curl_setopt($chListarProduto, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chListarProduto, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $responseListarProduto = curl_exec($chListarProduto);
        $statusCodeListarProduto = curl_getinfo($chListarProduto, CURLINFO_HTTP_CODE);
        curl_close($chListarProduto);

        if ($statusCodeListarProduto != 200) {
            echo "Erro ao buscar a lista de produtos na API. \n
            Código HTTP: $statusCodeListarProduto";
            exit;
        }

        $listarProdutos = json_decode($responseListarProduto, true);


        // Buscar produtos populares
        $urlPopulares = BASE_API . "produtosPopulares";
        $chPopulares = curl_init($urlPopulares);
        curl_setopt($chPopulares, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chPopulares, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);
        $responsePopulares = curl_exec($chPopulares);
        $statusCodePopulares = curl_getinfo($chPopulares, CURLINFO_HTTP_CODE);
        curl_close($chPopulares);

        if ($statusCodePopulares != 200) {
            echo "Erro ao buscar os produtos populares na API. Código HTTP: $statusCodePopulares";
            exit;
        }

        $produtosPopulares = json_decode($responsePopulares, true);

        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Loja ';
        $dados['cliente'] = $cliente;

        $dados['produtos'] = $listarProdutos;
        
        $dados['produtosPopulares'] = $produtosPopulares;
        var_dump($dados['produtosPopulares']);

        $this->carregarViews('loja', $dados);
    }
}
