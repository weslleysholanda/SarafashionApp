<?php

class SelecionarVerificacaoController extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Agora pode verificar a sessão
        if (!isset($_SESSION['preRegistro'])) {
            header('Location: ' . BASE_URL . 'index.php?url=registrar');
            exit;
        }

        // var_dump($_SESSION['preRegistro']);
        $dados = array();
        $dados['titulo'] = 'SarafashionAPP - Selecionar metodo de verificacao ';

        $this->carregarViews('selecionarVerificacao', $dados);
    }

}
