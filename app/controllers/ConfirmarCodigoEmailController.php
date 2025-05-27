<?php 

class ConfirmarCodigoEmailController extends Controller{

    public function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Garante que o pré-registro foi feito
        if (!isset($_SESSION['preRegistro'])) {
            header('Location: ' . BASE_URL . 'index.php?url=registrar');
            exit;
        }

        $dados = array();
        $dados['titulo'] = 'Verificar codigo por E-mail';
        $this->carregarViews('confirmarCodigoEmail', $dados);
        
    }
}