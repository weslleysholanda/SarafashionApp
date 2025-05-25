<?php

class EsqueceuSenhaController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'Esqueceu a senha';

        $this->carregarViews('esqueceuSenha',$dados);
    }
}