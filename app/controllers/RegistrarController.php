<?php

class RegistrarController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Registrar ';

        $this->carregarViews('registrar', $dados);
    }
    
    public function autenticar(){
        $email = $_POST['email'] ?? null;
        $senha =  $_POST['senha'] ?? null;

        
    }
}