<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/libro.php';
include '../../Modelo/GestionDatosLibro.php';


$objGestionLibro = new GestionDatosLibro();
$libros = $objGestionLibro->obtenerLibroById($idLibro);
$libro = $libros->fetchObject();
?>

<link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioActualizar.css">

<form action="../../Control/controladorLibro.php" method="post" class="form-register-creador">

    <h2 class="tittle-creacuenta">ACTUALIZAR LIBRO</h2>

    <br>
    
    <input type="hidden" value="<?php echo $idLibro ?>" name="idLibro">

    <div class="container-input-register">
        <input type="text" value="<?php echo $libro->libCodigo ?>" name="codigo" id="codigo" class="input-100">
        <input type="text" value="<?php echo $libro->libNombre ?>" name="nombre" id="nombre" class="input-100">
        <input type="text" value="<?php echo $libro->libAutor ?>" name="autor" id="autor" class="input-100">
        <input type="text" value="<?php echo $libro->libCantidad ?>" name="cantidad" id="cantidad" class="input-100">
        <input type="text" value="<?php echo $libro->libEditorial ?>" name="editorial" id="" class="input-100">
        <input type="text" value="<?php echo $libro->libEstado ?>" name="estado" class="input-100">

        <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">
    </div>

    <input type="hidden" name="opcion" value="2">

</form>

