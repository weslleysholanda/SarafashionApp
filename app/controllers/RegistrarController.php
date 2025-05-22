<?php

class RegistrarController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Registrar ';

        $this->carregarViews('registrar', $dados);
    }
}