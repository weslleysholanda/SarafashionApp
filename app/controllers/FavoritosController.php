<?php

class FavoritosController extends Controller
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

        $url = BASE_API . "listarFavoritos";
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $favoritos = [];

        if ($statusCode === 200) {
            $favoritos = json_decode($response, true);
        } elseif ($statusCode === 404) {
            $favoritos = [];
        } else {
            die("Erro ao buscar favoritos. Código HTTP: $statusCode");
        }

        $dados = array();
        $dados['titulo'] = 'Sarafashion - favoritos';
        $dados['favoritos'] = $favoritos;

        $this->carregarViews('favoritos', $dados);
    }
}
