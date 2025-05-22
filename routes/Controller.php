<?php

class Controller{

    public function carregarViews($view,$dados = array()){
        extract($dados);

        require_once '../app/views/' . $view . '.php';
    }
}