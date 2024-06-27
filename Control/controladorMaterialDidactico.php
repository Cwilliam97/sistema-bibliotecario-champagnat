<?php

session_start();
extract($_REQUEST);

include '../Modelo/conexion.php';
include '../Modelo/material.php';
include '../Modelo/GestionDatosMaterial.php';


switch ($opcion) {
    case 1:

        $material = new material($idMaterial,$codigo, $nombre, $cantidad, $estado);
        $objGestionMaterial = new GestionDatosMaterial();
        $resultado = $objGestionMaterial->agregarMaterial($material);
        if ($resultado) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmCrearMaterial&x=1");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmCrearMaterial&x=2");
        }
        break;

    case 2:

        $material = new material($idMaterial, $codigo, $nombre, $cantidad, $estado);
        $objGestionMaterial = new GestionDatosMaterial();
        $actualizado = $objGestionMaterial->actualizarMaterial($material);
        if ($actualizado) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmListarMaterialDidactico&x=1");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmListarMaterialDidactico&x=2");
        }
        break;

    case 3:
        $objGestionLibro = new GestionDatosLibro();
        $desactivar = $objGestionLibro->desactivarLibro($idLibro);
        if ($desactivar) {
            header("location:../Vista/Bibliotecario/index.php?pag=frmListarLibro&x=3");
        } else {
            header("location:../Vista/Bibliotecario/index.php?pag=frmListarLibro&x=4");
        }
        break;
}
?>