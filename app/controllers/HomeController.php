<?php

class HomeController extends Controller
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


        //fidelidade Cliente
        $urlFidelidade = BASE_API . "fidelidadeCliente/" . $dadosToken['id'];
        $chFidelidadeCliente = curl_init($urlFidelidade);
        curl_setopt($chFidelidadeCliente, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chFidelidadeCliente, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $responseFidelidadeCliente = curl_exec($chFidelidadeCliente);
        $statusCodeFidelidade = curl_getinfo($chFidelidadeCliente, CURLINFO_HTTP_CODE);
        curl_close($chFidelidadeCliente);

        if($statusCodeFidelidade != 200){
            echo "Erro ao buscar a fidelidade do cliente na API. \n
            Código HTTP: $statusCode";
            exit;
        }

        $pontosFidelidade = json_decode($responseFidelidadeCliente, true);

        //Listar Servico
        $urlListarServico = BASE_API . "ListarServico/";
        $chListarServico = curl_init($urlListarServico);
        curl_setopt($chListarServico, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chListarServico, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $responseListarServico = curl_exec($chListarServico);
        $statusCodeListarServico = curl_getinfo($chListarServico, CURLINFO_HTTP_CODE);
        curl_close($chListarServico);

        if($statusCodeListarServico != 200){
            echo "Erro ao buscar a lista de servicos na API. \n
            Código HTTP: $statusCode";
            exit;
        }

        $listarServico = json_decode($responseListarServico, true);

        //Listar Promoções Serviço
        $urlServPromocoes = BASE_API . "promocaoServico";
        $chServPromocoes = curl_init($urlServPromocoes);

        curl_setopt_array($chServPromocoes,[
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER =>[
                'Authorization: Bearer ' . $_SESSION['token']
            ]
        ]);

        $responseServProm = curl_exec($chServPromocoes);
        $httpCode = curl_getinfo($chServPromocoes, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpCode !== 200){
            die("Erro ao buscar promoções. Código HTTP: $httpCode");
        }

        $servPromocoes = json_decode($responseServProm,true);

        if(json_last_error() !== JSON_ERROR_NONE){
            die("Erro ao decodificar o JSON das promoções");
        }


        $dados = array();
        $dados['titulo'] = 'Sarafashion - Home';
        $dados['cliente'] = $cliente;
        $dados['pontos_acumulados'] = $pontosFidelidade['pontos_acumulados_fidelidade'] ?? 'Pontos';
        $dados['listarServico'] = $listarServico;
        $dados['servPromocoes'] = $servPromocoes;

        // var_dump($dados['listarServico']);
        // var_dump($dados['cliente']);
        // var_dump($dados['servPromocoes']);


        $this->carregarViews('home', $dados);
    }
}
