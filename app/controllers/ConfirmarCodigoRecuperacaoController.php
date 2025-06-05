<?php

class ConfirmarCodigoRecuperacaoController extends Controller{

    public function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['recuperarSenha'])) {
            header('Location: ' . BASE_URL . 'index.php?url=esqueceuSenha');
            exit;
        }
        // $email = $_SESSION['recuperarSenha']['email'];
        // var_dump($email);

        $dados = array();
        $dados['titulo'] = "SaraFashion - Confirmar codigo recuperacao";
        $dados['email'] = $_SESSION['recuperarSenha']['email'];
        $this->carregarViews('confirmarCodigoRecuperacao',$dados);
    }

    
}