<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class EmailController extends controller
{



    public function index()
    {
        $dados = array();

        $this->loadTemplate('envioEmail', $dados);

        //  header("Location: " . BASE_URL);
    }

    public function enviarEmail()
    {
        if (!empty($_POST['email'])) {
            $dados = addslashes($_POST['email']);
        }

        $mail = new PHPMailer();


        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'andreluizrms102@gmail.com';
        $mail->Password = 'belaisa123';
        $mail->Port = 587;

        $mail->setFrom('andreluizrms102@gmail.com');
        $mail->addReplyTo('andreluizrms102@gmail.com');
        $mail->addAddress('andreluiz.ramos@hotmail.com');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->addAttachment('arquivos/relatorio_diario.pdf');

        if (!$mail->send()) {
            echo 'Não foi possível enviar a mensagem.<br>';
            echo 'Erro: ' . $mail->ErrorInfo;
        } else {
            echo 'Mensagem enviada.';
        }

        //$this->loadView('mail', $endereco);

        header("Location: " . BASE_URL);
    }
}
