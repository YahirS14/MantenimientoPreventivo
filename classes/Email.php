<?php

namespace Classes;

use Model\Usuario;
use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '51a974634755d0';
        $mail->Password = 'f6a89de18d9b74';
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('dimas@dimas.com');
        $mail->addAddress('dimas@dimas.com');
        $mail->Subject = 'Confirma tu cuenta';

        //set Html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola" . $this->nombre . "</strong> Has 
        creado tu cuenta en DimasMantenimiento, confirma tu cuenta en el siguiente 
        enlace</p>";
        $contenido .= "<p>Presiona Aqui: <a href=
        'http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>
        Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, 
        solo ignora el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el email
        if($mail->send()){
            // echo 'mensaje enviado';
        }else{
            // echo 'no se envio';
            echo $mail->ErrorInfo;
        }
    }
}