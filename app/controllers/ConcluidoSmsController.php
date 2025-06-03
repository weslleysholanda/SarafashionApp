<?php

class ConcluidoSmsController extends Controller{

    public function index(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        if(!isset($_SESSION['preRegistro'])){
            header('Location:' . BASE_URL . 'index.php?url=register');
            exit;
        }
        
        $dados = array();
        $dados['titulo'] = 'Sarafashion - confirmar Sms';
        $this->carregarViews('confirmarCodigoSms',$dados);
    }
}