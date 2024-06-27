<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/material.php';
?>

<link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioLibro.css">
<link rel="stylesheet" href="../../Css/VistaBibliotecario/validaciones.css">
<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaMaterial.css">

<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<br>
<br>


<form action="../../Control/controladorMaterialDidactico.php" method="post" class="form-register-creador">

    <h2 class="tittle-creacuenta">MATERIAL DIDACTICO</h2>
    <div class="container-input-register">

        <input type="text" name="codigo" placeholder="Codigo" class="input-100" id="codigo">
        <input type="text" name="nombre" placeholder="Nombre" class="input-100" id="nombre" onkeypress="return validarNumeros_Letras(event)">
        <input type="text" name="cantidad" placeholder="Cantidad" class="input-100" id="cantidad" onkeypress="return validarNumeros(event)">
        <input type="text" name="estado" placeholder="Estado" class="input-100" id="estado" onkeypress="return validarLetras(event)">

        <input type="submit" value="Registrar" class="btn-enviar" style="position:relative; left:13%; top:50%">

        <input type="hidden" value="1" name="opcion">

    </div>

</form>

<script type="text/javascript" src="Javascript/validacionCamposMaterial.js"></script>
<script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Material Didactico Agregado Correctamente<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
if (@$x == 2) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Problemas al agregar Material Didactico
                        Por favor Intente de nuevo<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
//    if ($x == 3) {
//        echo "Se agregó el Administrador pero no se subió la foto";
//    }
?>