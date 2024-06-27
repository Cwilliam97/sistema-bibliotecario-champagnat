<?php

class GestionDatosChampagnat {

    //put your code here
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::singleton();
    }

    public function envioCorreo(stdClass $objCorreo) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = "ludicassena@gmail.com";
        $mail->Password = "comercio5"; //aquí colocar la clave del correo anterior	
        $mail->From = "ludicassena@gmail.com"; //correo del remitente
        $mail->FromName = utf8_decode("Libreria Champagnat - Comunidad de Hermanos Marista de la Enseñanza"); //nombre del remitente
        $mail->Subject = utf8_decode($objCorreo->asunto);
        $mail->Body = utf8_decode($objCorreo->mensaje);
        $mail->AddAddress($objCorreo->destinatario->getCorreo(), utf8_decode($objCorreo->destinatario->getNombres() . " " . $objCorreo->destinatario->getApellidos()));
        $mail->IsHTML(true);
        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }
    }

}
