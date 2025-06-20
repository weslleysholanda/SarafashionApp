<?php

class FavoritosController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sarafashion - favoritos';
        $this->carregarViews('favoritos',$dados);
    }
}