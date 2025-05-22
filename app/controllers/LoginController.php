<?php 

class LoginController extends Controller{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Login ';

        $this->carregarViews('login', $dados);
    }
}