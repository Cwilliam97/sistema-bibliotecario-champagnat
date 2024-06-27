<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/material.php';
include '../../Modelo/GestionDatosMaterial.php';


$objGestionMaterial = new GestionDatosMaterial();
$materiales = $objGestionMaterial->obtenerMaterial($idMaterial);
$material = $materiales->fetchObject();
?>

<link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioActualizar.css">
<link rel="stylesheet" href="../../Css/VistaBibliotecario/validaciones.css">
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<form action="../../Control/controladorMaterialDidactico.php" method="post" class="form-register-creador">

    <h2 class="tittle-creacuenta">ACTUALIZAR MATERIAL DIDACTICO</h2>

    <br>

<!--<input type="hidden" value="< ?php echo $idLibro ?>" name="idLibro">-->

    <div class="container-input-register">
        <input type="text" value="<?php echo $material->idmaterialDidactico ?>" name="idMaterial" class="input-100" readonly="true">
        <input type="text" value="<?php echo $material->matCodigo ?>" name="codigo" id="codigo" class="input-100">
        <input type="text" value="<?php echo $material->matNombre ?>" name="nombre" id="nombre" class="input-100">
        <input type="text" value="<?php echo $material->matCantidad ?>" name="cantidad" id="cantidad" class="input-100">
        <input type="text" value="<?php echo $material->matEstado ?>" name="estado" id="estado" class="input-100">

        <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">
    </div>

    
    <input type="hidden" name="opcion" value="2">

</form>

<script type="text/javascript" src="Javascript/validacionCamposMateriaUpdate.js"></script>




