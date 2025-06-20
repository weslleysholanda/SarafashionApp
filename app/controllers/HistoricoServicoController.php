<?php 

class HistoricoServicoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sarafashion - Hístorico de Serviços';
        $this->carregarViews('historicoServico',$dados);
    }
}