<?php

 class ConfirmarAgendamentoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Confirmar Agendamento';
        $this->carregarViews('confirmarAgendamento',$dados);
    }
 }