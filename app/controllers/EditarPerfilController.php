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

    public function uploadFoto()
    {
        header('Content-Type: application/json');

        if (!isset($_SESSION['token'])) {
            echo json_encode([
                'status' => 'erro',
                'mensagem' => 'Sessão expirada. Faça login novamente.'
            ]);
            return;
        }

        $dadosToken = TokenHelper::validar($_SESSION['token']);
        if (!$dadosToken) {
            session_destroy();
            unset($_SESSION['token']);
            echo json_encode([
                'status' => 'erro',
                'mensagem' => 'Token inválido. Faça login novamente.'
            ]);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['foto_cliente']['name'])) {
            $urlUpload = BASE_API . "uploadFotoCliente/" . $dadosToken['id'];

            $foto = new CURLFile(
                $_FILES['foto_cliente']['tmp_name'],
                $_FILES['foto_cliente']['type'],
                $_FILES['foto_cliente']['name']
            );

            $postData = ['foto_cliente' => $foto];

            $ch = curl_init($urlUpload);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $_SESSION['token']
            ]);

            $resposta = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $erroCurl = curl_error($ch);
            curl_close($ch);

            if ($resposta === false) {
                echo json_encode([
                    'status' => 'erro',
                    'mensagem' => 'Erro ao se comunicar com o servidor de arquivos: ' . $erroCurl
                ]);
                return;
            }

            $respostaDecoded = json_decode($resposta, true);

            // Aqui está o ajuste importante — verifica 'caminho' ao invés de 'foto'
            if ($status === 200 && isset($respostaDecoded['caminho'])) {
                $novoNomeArquivo = $respostaDecoded['caminho'];
                $caminhoImagem = BASE_URL_SITE . 'uploads/' . $novoNomeArquivo;

                echo json_encode([
                    'status' => 'sucesso',
                    'mensagem' => 'Foto atualizada com sucesso!',
                    'novaFoto' => $caminhoImagem
                ]);
            } else {
                $erro = $respostaDecoded['erro'] ?? 'Erro desconhecido ou resposta inválida da API.';
                echo json_encode([
                    'status' => 'erro',
                    'mensagem' => "Erro ao atualizar a foto: $erro"
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'erro',
                'mensagem' => 'Nenhum arquivo enviado.'
            ]);
        }
    }
}
