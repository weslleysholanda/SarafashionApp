    <?php

    class ConcluidoEmailController extends Controller{
        public function index(){
            if (!isset($_SESSION['token'])) {
                header("Location: " . BASE_URL . "index.php?url=login");
                // var_dump($_SESSION['token']);
                exit;
            }


            $dadosToken = TokenHelper::validar($_SESSION['token']);

            if (!$dadosToken) {
                session_destroy();
                unset($_SESSION['token']);
                header("Location: " . BASE_URL . "index.php?url=login");
                exit;
            }
            
            $dados = array();
            $dados['titulo'] = 'Sarafashionapp - Email Verificado';
            $this->carregarViews('concluidoEmail',$dados);
        }
    }