<?php

class EditarPerfilController extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['token'])) {
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        $dadosToken = TokenHelper::validar($_SESSION['token']);

        if (!$dadosToken) {
            session_destroy();
            unset($_SESSION['token']);
            header("Location: " . BASE_URL . "index.php?url=login");
            exit;
        }

        // Atualizar Cliente
        //method spoofing = o HTML puro não permite o uso do method Patch
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PATCH') {
            
            $dadosAtualizados = [
                'nome_cliente' => $_POST['nome_cliente'],
                'tipo_cliente' => $_POST['tipo_cliente'],
                'cpf_cnpj_cliente' => $_POST['cpf_cnpj_cliente'],
                'data_nasc_cliente' => $_POST['data_nasc_cliente'],
                'email_cliente' => $_POST['email_cliente'],
                'telefone_cliente' => $_POST['telefone_cliente'],
                'endereco_cliente' => $_POST['endereco_cliente'],
                'bairro_cliente' => $_POST['bairro_cliente']
            ];

            // Criptografa a senha se fornecida
            if (!empty($_POST['senha_cliente'])) {
                $dadosAtualizados['senha_cliente'] = password_hash($_POST['senha_cliente'], PASSWORD_DEFAULT);
            }

            if (!empty($_POST['foto_cliente'])) {
                $dadosAtualizados['foto_cliente'] = $_POST['foto_cliente'];
            }

            $urlAtualizar = BASE_API . "atualizarCliente/" . $dadosToken['id'];
            $chAtualizar = curl_init($urlAtualizar);
            curl_setopt($chAtualizar, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chAtualizar, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($chAtualizar, CURLOPT_POSTFIELDS, json_encode($dadosAtualizados));
            curl_setopt($chAtualizar, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/json'
            ]);

            $resposta = curl_exec($chAtualizar);
            $statusCodeAtualizar = curl_getinfo($chAtualizar, CURLINFO_HTTP_CODE);
            curl_close($chAtualizar);

            $respostaDecoded = json_decode($resposta, true);

            if ($statusCodeAtualizar === 200) {
                $_SESSION['msg_sucesso'] = 'Perfil atualizado com sucesso!';
                header("Location: " . BASE_URL . "index.php?url=perfil");
                exit;
            } else {
                $erro = $respostaDecoded['erro'] ?? "Erro desconhecido";
                $_SESSION['msg_erro'] = "Erro ao atualizar o perfil! Código: $statusCodeAtualizar. Mensagem: $erro";
            }
        }

        // Buscar dados do cliente
        $url = BASE_API . "cliente/" . $dadosToken['id'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $_SESSION['token']
        ]);
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode != 200) {
            echo "Erro ao buscar o cliente na API. Código HTTP: $statusCode";
            exit;
        }

        $cliente = json_decode($response, true);
        $dados = [];
        $dados['titulo'] = 'Sarafashion - Editar Perfil';
        $dados['cliente'] = $cliente;
        $this->carregarViews('editarPerfil', $dados);
    }
}
