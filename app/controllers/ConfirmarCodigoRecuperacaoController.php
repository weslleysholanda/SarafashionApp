<?php

class ConfirmarCodigoRecuperacaoController extends Controller{

    public function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['recuperarSenha'])) {
            header('Location: ' . BASE_URL . 'index.php?url=esqueceuSenha');
            exit;
        }
        // $email = $_SESSION['recuperarSenha']['email'];
        // var_dump($email);

        $dados = array();
        $dados['titulo'] = "SaraFashion - Confirmar codigo recuperacao";
        $dados['email'] = $_SESSION['recuperarSenha']['email'];
        $this->carregarViews('confirmarCodigoRecuperacao',$dados);
    }

        public function validarCodigoRec(){
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if($_SERVER['REQUEST_METHOD'] !== 'POST'){
                http_response_code(405);
                echo json_encode(['erro' => 'Método não permitido.']);
                return;
            }
            

            $codigoDigitado = $_POST['codigo_verificacao'] ?? null;

            if(!$codigoDigitado){
                http_response_code(400);
                echo json_encode(['erro' => 'Código não informado.']);
                return;
            }

            if(!isset($_SESSION['recuperarSenha'])){
                http_response_code(400);
                echo json_encode(['erro' => 'Código não enviado ou expirado.']);
                return;
            }

            $dadosSessao = $_SESSION['recuperarSenha'];

            if(!$codigoDigitado !== $dadosSessao['codigo']){
                echo json_encode(['erro' => 'Código incorreto']);
                return;
            }

            echo json_encode(['sucesso' => true]);
        }
}