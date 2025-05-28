<?php 

class ConfirmarCodigoEmailController extends Controller{

    public function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        

        // var_dump($_SESSION['preRegistro']);
        // var_dump($_SESSION['verificacao_email']);

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

}