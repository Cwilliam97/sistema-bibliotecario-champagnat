<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/persona.php';
include '../Modelo/estudiante.php';
include '../Modelo/usuario.php';
include '../Modelo/GestionDatosEstudiante.php';
include '../Modelo/GestionDatosChampagnat.php';
include '../Recursos/PhpMailer/class.phpmailer.php';
include '../Recursos/PhpMailer/class.smtp.php';


switch ($opcion) {
    
    case 1:

        //CREAR ESTUDIANTE

        $estudiante = new estudiante($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion, $curso);
        $GestionEstudiante = new GestionDatosEstudiante();
        $resultado = $GestionEstudiante->agregarEstudiante($estudiante);
        if ($resultado) {

            //enviar correo destinatario:
            //creamos un objeto stdClass
            $objCorreo = new stdClass();
            $objCorreo->destinatario = $estudiante;
            $objCorreo->asunto = "Registro Sistema Libreria ChampaLibrary";
            $objCorreo->mensaje = "";
            $mensaje = "Señor(a) <b>" . $nombres . " " . $apellidos . "</b>, ";
            $mensaje.= "reciba un caluroso saludo. Me permito informar que ha sido registrado "
                    . "en nuestro Sistema web de la libreria Champagnat.<br><p>";
            $mensaje.= "Ingresar con los siguientes datos:  <br>";
            $mensaje.= "<b>Usuario</b> = " . $correo . "<br>";
            $mensaje.= "<b>Contraseña</b> = " . $identificacion . "<p><br>";
            $mensaje.= "Le recomendamos que cuando ingrese por primera vez, cambie su contraseña.<br><p>";
            $mensaje.="<p><p><p> Atentamente, <p><p>Administrador Del Colegio Champagnat";
            $mensaje.= "Para ingresar debe ir a: <a href='http://localhost:8080/Champagnat/index.php'>" . "</a> <br>";
            $objCorreo->mensaje = $mensaje;
            $objGestionCorreo = new GestionDatosChampagnat();
            $envio = $objGestionCorreo->envioCorreo($objCorreo);

            header("location: ../Vista/Administrador/index.php?pag=frmCrearEstudiante&x=1");
        } else {
            header("location: ../Vista/Administrador/index.php?pag=frmCrearEstudiante&x=2");
        }
        break;

    
    case 2:

        $estudiante= new estudiante($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion, $curso);
        $objGestionEstudiante = new GestionDatosEstudiante();
        $resultado = $objGestionEstudiante->actualizarEstudiante($estudiante);

        if ($resultado) {
            header("location:../Vista/Administrador/index.php?pag=frmListarEstudiantes1&x=1");
        } else {
            header("location:../Vista/Administrador/index.php?pag=frmListarEstudiantes1&x=2");
        }

        break;
}
?>