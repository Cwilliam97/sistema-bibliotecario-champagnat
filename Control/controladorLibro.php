<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/libro.php';
include '../Modelo/GestionDatosLibro.php';


switch ($opcion){
    
    //AGREGAR LIBRO
    case 1:
        
        $libro= new libro($codigo, $nombre, $autor, $cantidad, $editorial, $estado);
        $objGestionLibro= new GestionDatosLibro();
        $resultado= $objGestionLibro->agregarLibro($libro);
        
        if($resultado){
             header("location:../Vista/Bibliotecario/index.php?pag=frmCrearLibro&x=1");
        }else{
             header("location:../Vista/Bibliotecario/index.php?pag=frmCrearLibro&x=2");
        }
    break;
    
    //ACTUALIZAR LIBRO
    case 2:
        $libro= new libro($codigo, $nombre, $autor, $cantidad, $editorial, $estado);
        $objGestionLibro= new GestionDatosLibro();
        $actualizado=$objGestionLibro->actualizarLibro($libro,$idLibro);
         if($actualizado){
             header("location:../Vista/Bibliotecario/index.php?pag=frmListarLibros2&x=1");
        }else{
             header("location:../Vista/Bibliotecario/index.php?pag=frmListarLibros2&x=2");
        }
        break;
    
        
    //DESACTIVAR LIBRO
     case 3:
         $objGestionLibro= new GestionDatosLibro();
         $desactivar= $objGestionLibro->desactivarLibro($idLibro);
         if($desactivar){
              header("location:../Vista/Bibliotecario/index.php?pag=frmListarLibros2&x=3");
         }else{
              header("location:../Vista/Bibliotecario/index.php?pag=frmListarLibros2&x=4");
         }
        break;
}

?>
