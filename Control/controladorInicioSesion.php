<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/GestionDatosUsuarios.php';

switch ($opcion) {
    case 1:
        $objGestionUsuario = new gestionDatosUsuarios();
        $resultado = $objGestionUsuario->iniciarSesion($login, $password);

        if ($resultado->rowCount() == 1) {

            $usu = $resultado->fetchObject();
            $rol = $usu->Rol_idRol;

            $_SESSION['identificacion'] = $usu->perIdentificacion;
            $_SESSION['usuario'] = $usu->perNombres . " " . $usu->perApellidos;
            $_SESSION['nombre'] = $usu->perNombres;
            $_SESSION['apellido'] = $usu->perApellidos;
            $_SESSION['telefono'] = $usu->perTelefono;
            $_SESSION['foto'] = $usu->usuFoto;
            $_SESSION['estado'] = $usu->usuEstado;
            

            switch ($rol) {
                case 1:
                    header("location:../Vista/Administrador/index.php");
                    break;
                case 2:
                    header("location:../Vista/Bibliotecario/index.php");
                    break;
                case 3:
                    header("location:../Vista/Estudiante/index.php");
                    break;
                case 4:
                    header("location:../Vista/Profesor/index.php");
                    break;
            }
        } else {
            header("location:../index.php?x=1");
        }
        break;
}
?>
