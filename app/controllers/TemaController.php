<?php 

class TemaController extends Controller{

    public function index(){

        $dados = array();
        $dados['titulo'] = 'Sarafashion - Alterar Tema';

        $this->carregarViews('tema', $dados);
    }
}