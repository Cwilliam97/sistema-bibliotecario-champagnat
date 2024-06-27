<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/prestamoMaterial.php';
include '../Modelo/GestionDatosPrestamo.php';

switch ($opcion) {
    
    //PRESTAMO MATERIAL ESTUDIANTE
    case 1:
        $prestamo= new prestamoMaterial($identificacion, $idMaterial, $cantidad, $fechaPrestamo,$estado);
        $objGestionPrestamo= new GestionDatosPrestamo();
        $resultado=$objGestionPrestamo->prestarMaterial($prestamo);
        if($resultado){
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoMaterialEstudiante&x=1");
        }else{
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoMaterialEstudiante&x=2");
        }
        
        break;
    
    //PRESTAMO MATERIAL PROFESOR
    case 2:
        $prestamo= new prestamoMaterial($identificacion, $idMaterial, $cantidad, $fechaPrestamo,$estado);
        $objGestionPrestamo=new GestionDatosPrestamo();
        $resultado=$objGestionPrestamo->prestarMaterial($prestamo);
        if($resultado){
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroProfesor&x=1");
        }else{
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoLibroProfesor&x=2");
        }
        break;
        
        
    //PRESTAMO MATERIAL ADMINISTRATIVOS
    case 3:
        $prestamo= new prestamoMaterial($identificacion, $idMaterial, $cantidad, $fechaPrestamo,$estado);
        $objGestionPrestamo=new GestionDatosPrestamo();
        $resultado=$objGestionPrestamo->prestarMaterial($prestamo);
        if($resultado){
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoMaterialAdministrativos&x=1");
        }else{
            header("location:../Vista/Bibliotecario/index.php?pag=frmPrestamoMaterialAdministrativos&x=2");
        }
        break;
}
?>

