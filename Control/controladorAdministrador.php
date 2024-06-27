<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/persona.php';
include '../Modelo/usuario.php';
include '../Modelo/estudiante.php';
include '../Modelo/profesor.php';
include '../Modelo/GestionDatosAdministrador.php';
include '../Modelo/GestionDatosBibliotecario.php';
include '../Modelo/GestionDatosEstudiante.php';
include '../Modelo/GestionDatosProfesor.php';
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
            $mensaje.="<p><p><p> Atentamente, <p><p>Administrador Del Colegio Champagnat.<br>";
            $mensaje.= "Para ingresar debe ir a: <a href='http://localhost:8080/Champagnat/index.php'>http://localhost:Champagnat/index.php" . "</a> <br>";
            $objCorreo->mensaje = $mensaje;
            $objGestionCorreo = new GestionDatosChampagnat();
            $envio = $objGestionCorreo->envioCorreo($objCorreo);

            
            header("location: ../Vista/Administrador/index.php?pag=frmCrearBibliotecario&x=1");
        } else {
            header("location: ../Vista/Administrador/index.php?pag=frmCrearBibliotecario&x=2");
        }

        break;
    case 2:

        //ACTUALIZAR ADMINISTRADORES

        $administrador = new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionAdministrador = new GestionDatosAdministrador();
        $resultado = $objGestionAdministrador->actualizarDatosAdmin($administrador);

        if ($resultado) {  
            header("location: ../Vista/Administrador/index.php?pag=frmlistarAdministrador&x=1");
        } else {
            header("location: ../Vista/Administrador/index.php?pag=frmlistarAdministrador&x=2");
        }

        break;

    
    case 3:

        //CREAR PROFESOR

        $profesor = new profesor($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $GestionProfesor = new GestionDatosProfesor();
        $resultado = $GestionProfesor->agregarProfesor($profesor);
        if ($resultado) {
            header("location: ../Vista/Administrador/index.php?pag=frmCrearProfesor&x=1");
        } else {
            header("location: ../Vista/Administrador/index.php?pag=frmCrearProfesor&x=2");
        }

        break;

    case 4:

        //ACTUALIZAR MIS DATOS ADMINISTRADOR

        $administrador = new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionAdministrador = new GestionDatosAdministrador();
        $resultado = $objGestionAdministrador->actualizarMisDatos($administrador);
        if ($resultado) {
            header("location: ../Vista/Administrador/index.php?pag=frmActualizarMisDatos&x=1");
        } else {
            header("location: ../Vista/Administrador/index.php?pag=frmActualizarMisDatos&x=2");
        }
        break;

    case 5:
        //CREAR ADMINISTRADOR

        $administrador = new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionAdministrador = new GestionDatosAdministrador();
        $resultado = $objGestionAdministrador->agregarAdministrador($administrador);
        if ($resultado) {
            header("location: ../Vista/Administrador/index.php?pag=frmCrearAdministrador&x=1");
        } else {
            header("location: ../Vista/Administrador/index.php?pag=frmCrearAdministrador&x=2");
        }
        break;
     
        //ACTUALIZAR BIBLIOTECARIO
        
    case 6:
        $bibliotecario= new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionBibliotecario= new GestionDatosBibliotecario();
        $resultado=$objGestionBibliotecario->actualizarBibliotecario($bibliotecario);
        if($resultado){
            header("location: ../Vista/Administrador/index.php?pag=frmListarBibliotecario&x=1");
        }else{
            header("location: ../Vista/Administrador/index.php?pag=frmListarBibliotecario&x=2");
        }
        break;
        break;
    
    //ACTUALIZAR PROFESOR
    case 7:
        $profesor=new usuario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $objGestionAdministrador= new GestionDatosProfesor();
        $resultado=$objGestionAdministrador->actualizarProfesor($profesor);
        if($resultado){
            header("location: ../Vista/Administrador/index.php?pag=frmListarProfesor&x=1");
        }else{
            header("location: ../Vista/Administrador/index.php?pag=frmListarProfesor&x=2");
        }
        break;
}
?>