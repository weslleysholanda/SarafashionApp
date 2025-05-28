<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class VerificarEmailController extends Controller
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

        var_dump($_SESSION['preRegistro']);

        $dados = array();
        $dados['titulo'] = 'Verificação por E-mail';
        $this->carregarViews('verificarEmail', $dados);
    }

    public function enviarCodigo()
    {

        echo 'oi';
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Garante que o pré-registro foi feito
        if (!isset($_SESSION['preRegistro'])) {
            header('Location: ' . BASE_URL . 'index.php?url=registrar');
            exit;
        }

        // Pega dados da sessão
        $email = $_SESSION['preRegistro']['email'] ?? null;
        $nome  = $_SESSION['preRegistro']['nome'] ?? 'usuário';

        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ' . BASE_URL . 'index.php?url=verificacaoEmail&erro=email_invalido');
            exit;
        }

        // Gera código de verificação
        $codigo = rand(100000, 999999);

        // Salva código e email na sessão para validar depois
        $_SESSION['verificacao_email'] = [
            'email'     => $email,
            'codigo'    => $codigo,
            'expira_em' => time() + 600 // 10 minutos
        ];

        require_once __DIR__ . '/../../vendors/phpmailer/src/PHPMailer.php';
        require_once __DIR__ . '/../../vendors/phpmailer/src/SMTP.php';
        require_once __DIR__ . '/../../vendors/phpmailer/src/Exception.php';

        // Envia e-mail com PHPMailer
        $mail = new PHPMailer();

        echo 'Erro: ' . $mail->ErrorInfo;

        try {
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host       = HOST_EMAIL;
            $mail->SMTPAuth   = true;
            $mail->Username   = USER_EMAIL;
            $mail->Password   = PASS_EMAIL;
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = PORT_EMAIL;

            $mail->CharSet = 'UTF-8';

            $mail->setFrom(USER_EMAIL, 'Sara Fashion');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Código de Verificação - Sara Fashion';
            $mail->Body    = "
                <div style='text-align: center;'>
                    <div style='border: 2px solid #C59D5F; border-radius: 5px; padding: 40px; display: inline-block;'>
                        <div style='background-color: #fdfdfd; padding: 10px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);'>
                            <img src='https://sarafashionapp.webdevsolutions.com.br/public/assets/img/logoDark.png'style='width: 300px; object-fit: cover;' alt='logoSara'>
                        </div>

                        <h1 style='font-size: 1.563em; color:black;'>Olá, <strong>{$nome}</strong>!</h1>
                        <p style='color:black;'>Seu código de verificação é:</p>
                        <h2 style='color: #C59D5F;'>{$codigo}</h2>
                        <p style='font-weight: bold;'>Válido por 10 minutos.</p>
                    </div>
                </div>


                
            ";

            $mail->send();

            // Redireciona para a página de confirmação
            header('Location: ' . BASE_URL . 'index.php?url=confirmarCodigoEmail');
            exit;
        } catch (Exception $e) {
            // Redireciona com erro
            header('Location: ' . BASE_URL . 'index.php?url=verificacaoEmail&erro=erro_envio');
            exit;
        }
    }
}
