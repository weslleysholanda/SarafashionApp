<?php

class MeusAgendamentosController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Meus Agendamentos';
        $this->carregarViews('meusAgendamentos',$dados);
    }
}