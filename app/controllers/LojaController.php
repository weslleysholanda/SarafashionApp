<?php 


class LojaController extends Controller
{

    public function index()
    { 
        $urlListarProduto = BASE_API . "ListarProdutos";
        $chListarProduto = curl_init($urlListarProduto);
        curl_setopt($chListarProduto, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chListarProduto, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $responseListarProduto = curl_exec($chListarProduto);
        $statusCodeListarProduto = curl_getinfo($chListarProduto, CURLINFO_HTTP_CODE);
        curl_close($chListarProduto);
        
        if($statusCodeListarProduto != 200){
            echo "Erro ao buscar a lista de produtos na API. \n
            Código HTTP: $statusCodeListarProduto";
            exit;
        }

        $listarProdutos = json_decode($responseListarProduto, true);
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Loja ';
        $dados['produtos'] = $listarProdutos;

        $this->carregarViews('loja', $dados);


    }
}
