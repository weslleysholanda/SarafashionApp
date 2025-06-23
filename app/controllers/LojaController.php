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
        // Inicia o cURL
        $chPopulares = curl_init($urlPopulares);
        // Configurações
        curl_setopt_array($chPopulares, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 8,
        ]);
        // Se precisar de Authorization via Bearer Token, descomente a linha abaixo e ajuste:
        if (isset($_SESSION['token'])) {
            curl_setopt($chPopulares, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $_SESSION['token']
            ]);
        }

        // Executa
        $responsePopulares = curl_exec($chPopulares);
        $httpCode = curl_getinfo($chPopulares, CURLINFO_HTTP_CODE);
        curl_close($chPopulares);

        // Verificações
        if ($responsePopulares === false) {
            die("Erro na comunicação com a API de produtos populares.");
        }

        $dataPopulares = json_decode($responsePopulares, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            die("Erro ao decodificar JSON da resposta da API.");
        }

        if ($httpCode !== 200 || !isset($dataPopulares['status']) || $dataPopulares['status'] !== 'success') {
            $erroMsg = $dataPopulares['message'] ?? 'Erro desconhecido.';
            die("Erro ao buscar produtos populares. HTTP $httpCode - $erroMsg");
        }

        // Buscar categorias
        $urlCategorias = BASE_API . "listarCategorias";
        $chCategorias = curl_init($urlCategorias);
        curl_setopt($chCategorias, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chCategorias, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $responseCategorias = curl_exec($chCategorias);
        $statusCodeCategorias = curl_getinfo($chCategorias, CURLINFO_HTTP_CODE);
        curl_close($chCategorias);

        if ($statusCodeCategorias != 200) {
            die("Erro ao buscar categorias. Código HTTP: $statusCodeCategorias");
        }

        $categorias = json_decode($responseCategorias, true);



        // consumir API das promoções
        $urlPromocoes = BASE_API . "promocaoProduto";
        $chPromocoes = curl_init($urlPromocoes);

        curl_setopt_array($chPromocoes, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['token']
            ]
        ]);

        $response = curl_exec($chPromocoes);
        $httpCode = curl_getinfo($chPromocoes, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            die("Erro ao buscar promoções. Código HTTP: $httpCode");
        }

        $promocoes = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            die("Erro ao decodificar JSON das promoções.");
        }



        $dados['categorias'] = $categorias;

        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Loja ';
        $dados['cliente'] = $cliente;
        $dados['produtos'] = $listarProdutos;
        // var_dump($dados['produtos']);
        $dados['produtosPopulares'] = $dataPopulares['data'] ?? [];
        // var_dump($dados['produtosPopulares']);
        $dados['promocoes'] = $promocoes;

        $this->carregarViews('loja', $dados);
    }

    public function buscarProduto()
    {
        $termo = $_POST['busca'] ?? '';

        if (empty($termo)) {
            echo json_encode(['status' => 'error', 'mensagem' => 'Informe um termo de busca']);
            exit;
        }

        $url = BASE_API . "buscarProdutos?busca=" . urlencode($termo);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode != 200) {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro na busca. Código: ' . $statusCode]);
            exit;
        }

        $produtos = json_decode($response, true);

        echo json_encode(['status' => 'success', 'data' => $produtos]);
    }

    public function produtoDetalhes($link)
    {
        // Buscar dados do produto
        $url = BASE_API . "buscarProdutoUnico?link=" . urlencode($link);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode != 200) {
            die('Produto não encontrado. Código: ' . $statusCode);
        }

        $produto = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE || !$produto) {
            die('Erro ao decodificar JSON da API.');
        }

        // Agora verificar se o produto está favoritado
        $urlFavoritos = BASE_API . "listarFavoritos";
        $chFav = curl_init($urlFavoritos);
        curl_setopt($chFav, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chFav, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);
        $responseFav = curl_exec($chFav);
        curl_close($chFav);

        $favoritos = json_decode($responseFav, true);
        $produto['favoritado'] = false;

         if (isset($favoritos[0]['id_produto'])) {
            foreach ($favoritos as $fav) {
                if ($fav['id_produto'] == $produto['id_produto']) {
                    $produto['favoritado'] = true;
                    break;
                }
            }
        }

        $dados['titulo'] = 'Detalhes do Produto';
        $dados['produto'] = $produto;

        $this->carregarViews('produtoUnico', $dados);
    }

    public function buscarProdutoPorCategoria()
    {
        $categoria = $_POST['categoria'] ?? '';

        if (empty($categoria)) {
            echo json_encode(['status' => 'error', 'mensagem' => 'Informe a categoria']);
            exit;
        }

        $url = BASE_API . "buscarPorCategoria?categoria=" . urlencode($categoria);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode != 200) {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao buscar produtos. Código: ' . $statusCode]);
            exit;
        }

        $produtos = json_decode($response, true);
        echo json_encode(['status' => 'success', 'data' => $produtos]);
    }
}
