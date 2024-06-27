<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/prestamoLibro.php';
include '../Modelo/GestionDatosPrestamo.php';

switch ($opcion) {

    //PRESTAMO LIBRO ESTUDIANTE
    case 1:
        $prestamo = new prestamoLibro($identificacion, $idLibro, $cantidad, $fechaPrestamo, $estado);
        $objGestionPrestamo = new GestionDatosPrestamo();
        $resultado = $objGestionPrestamo->prestarLibro($prestamo);
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

    case 4:

        break;
}
?>


