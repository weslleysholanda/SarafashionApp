<?php

class AgendamentoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Agendar Serviço';
        $this->carregarViews('escolha',$dados);
    }
}