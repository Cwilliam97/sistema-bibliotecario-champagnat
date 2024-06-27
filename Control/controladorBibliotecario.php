<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/persona.php';
include '../Modelo/usuario.php';
include '../Modelo/GestionDatosBibliotecario.php';
include '../Modelo/GestionDatosChampagnat.php';
include '../Recursos/PhpMailer/class.phpmailer.php';
include '../Recursos/PhpMailer/class.smtp.php';


switch ($opcion) {
    
     case 1:

        //CREAR BIBLIOTECARIO

        $bibliotecario = new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionBibliotecario = new GestionDatosBibliotecario();
        $resultado = $objGestionBibliotecario->agregarbibliotecario($bibliotecario);

        if ($resultado) {
            //enviar correo destinatario:
            //creamos un objeto stdClass
            $objCorreo = new stdClass();
            $objCorreo->destinatario = $bibliotecario;
            $objCorreo->asunto = "Registro Sistema Libreria ChampaLibrary";
            $objCorreo->mensaje = "";
            $mensaje = "Señor(a) <b>" . $nombres . " " . $apellidos . "</b>, ";
            $mensaje.= "reciba un caluroso saludo. Me permito informar que ha sido registrado "
                    . "en nuestro Sistema web de la libreria Champagnat.<br><p>";
            $mensaje.= "Ingresar con los siguientes datos:  <br>";
            $mensaje.= "<b>Usuario</b> = " . $nombres . "<br>";
            $mensaje.= "<b>Contraseña</b> = " . $apellidos . "<p><br>";
            $mensaje.= "Le recomendamos que cuando ingrese por primera vez, cambie su contraseña.<br><p>";
            $mensaje.="<p><p><p> Atentamente, <p><p>Administrador Del Colegio Champagnat";
            $mensaje.= "Para ingresar debe ir a: <a href='http://localhost:8080/Champagnat/index.php'>" . "</a> <br>";
            $objCorreo->mensaje = $mensaje;
            $objGestionCorreo = new GestionDatosChampagnat();
            $envio = $objGestionCorreo->envioCorreo($objCorreo);

            
            header("location:../Vista/Administrador/index.php?pag=frmCrearBibliotecario&x=1");
        } else {
            header("location:../Vista/Administrador/index.php?pag=frmCrearBibliotecario&x=2");
        }
        
        break;
    
    case 2:

        $usuario = new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionBibliotecario = new GestionDatosBibliotecario();
        $resultado = $objGestionBibliotecario->actualizarBibliotecario($usuario);

        if ($resultado) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmActualizarMisDatos&x=1");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmActualizarMisDatos&x=2");
        }

        break;
}
?>
