<?php 

class HistoricoServicoController extends Controller{
    public function index(){
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

        $url = BASE_API . "listarHistoricoServico";
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $listarHistoricoServico = [];

        if ($statusCode === 200) {
            $listarHistoricoServico = json_decode($response, true);
        } elseif ($statusCode === 404) {
            $listarHistoricoServico = [];
        } else {
            die("Erro ao buscar favoritos. Código HTTP: $statusCode");
        }
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Hístorico de Serviços';
        $dados['listarHistorico'] = $listarHistoricoServico;
        // var_dump($dados['listarHistorico']); 
        $this->carregarViews('historicoServico',$dados);
    }
}