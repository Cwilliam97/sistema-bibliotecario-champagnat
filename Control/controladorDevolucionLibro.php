<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/devolucionLibro.php';
include '../Modelo/GestionDatosDevolucion.php';

switch ($opcion) {

    //ACTUALIZAR PRESTAMO LIBRO
    case 1:
        $devolucion = new devolucionLibro($identificacion, $idLibro, $cantidad, $fechaDevolucion);
        $objGestionDevolucion= new GestionDatosDevolucion();
        $resultado = $objGestionDevolucion->actualizarPrestamo;
        if ($resultado) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroEstudiante&x=1");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroEstudiante&x=2");
        }

        break;

    //PRESTAMO LIBRO PROFESOR
    case 2:
        $prestamo = new prestamoLibro($identificacion, $idLibro, $cantidad, $fechaPrestamo, $estado);
        $objGestionPrestamo = new GestionDatosPrestamo();
        $resultado = $objGestionPrestamo->prestarLibro($prestamo);
        if ($resultado) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroProfesor&x=1");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroProfesor&x=2");
        }
        break;

    case 3:
        $prestamo = new prestamoLibro($identificacion, $idLibro, $cantidad, $fechaPrestamo, $estado);
        $objGestionPrestamo = new GestionDatosPrestamo();
        $resultado = $objGestionPrestamo->prestarLibro($prestamo);
        if ($resultado) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroAdministrativos&x=1");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroAdministrativos&x=2");
        }
        break;
}
?>


