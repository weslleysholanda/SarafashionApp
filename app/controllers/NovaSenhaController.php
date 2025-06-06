<?php

class NovaSenhaController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'SarafashionApp - Nova Senha';
        $this->carregarViews('novaSenha',$dados);
    }
}