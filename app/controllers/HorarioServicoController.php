<?php

class HorarioServicoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Escolha um horario';
        $this->carregarViews('horario',$dados);
    }
}