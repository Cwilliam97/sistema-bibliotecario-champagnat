<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/GestionDatosDevolucion.php';


$objGestionLibro = new GestionDatosDevolucion;
$libros = $objGestionLibro->obtenerPrestamoLibro($idPrestamo);
$libro = $libros->fetchObject();
?>

<link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioActualizar.css">

<form action="../../Control/controladorPrestamoLibro.php" method="post" class="form-register-creador">

    <h2 class="tittle-creacuenta">ACTUALIZAR PRESTAMO LIBRO</h2>

    <br>
    
    <input type="hidden" value="<?php echo $idLibro ?>" name="idLibro">

    <div class="container-input-register">
        <input type="text" value="<?php echo $libro->perNombres .' '. $libro->perApellidos?>" id="codigo" class="input-100" readonly="true">
        <input type="text" value="<?php echo $libro->libNombre ?>" name="nombre" id="nombre" class="input-100" readonly="true">
        <input type="text" value="<?php echo $libro->preCantidad ?>" name="cantidad" id="autor" class="input-100">
        <input type="text" value="<?php echo $libro->preFechaPrestamo ?>" id="cantidad" class="input-100" readonly="true">

        <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">
    </div>

    <input type="hidden" name="opcion" value="1">

</form>