<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/usuario.php';
?>

<link rel="stylesheet" href="../../Css/VistaAdministrador/formularioAdmin.css">
<link rel="stylesheet" href="../../Css/VistaBibliotecario/validaciones.css">
<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaAdmin.css">
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<form action="../../Control/controladorBibliotecario.php" method="post" class="form-register-creador">

    <h2 class="tittle-creacuenta">CREAR BIBLIOTECARIO</h2>
    <div class="container-input-register">

        <input type="text" name="identificacion" placeholder="Identificacion" class="input-100" id="identificacion" onkeypress="return validarNumeros(event)">
        <input type="text" name="nombres" placeholder="Nombre" class="input-100" id="nombre" onkeypress="return validarLetras(event)">
        <input type="text" name="apellidos" placeholder="Apellido" class="input-100" id="apellido" onkeypress="return validarLetras(event)"> 
        <select name="genero" id="genero" class="input-100" id="genero">
            <option value="">Seleccione genero...</option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>                        
        </select>
        <input type="text" name="telefono" placeholder="Telefono" class="input-100" id="telefono" onkeypress="return validarNumeros(event)">
        <input type="text" name="correo" placeholder="Correo Electronico" class="input-100" id="correo">
        <input type="text" name="direccion" placeholder="Direccion" class="input-100" id="direccion">


        <input type="submit" value="Registrar" class="btn-enviar" style="position:relative; left:13%; top:50%">

        <input type="hidden" value="1" name="opcion">

    </div>

</form>

<script type="text/javascript" src="Javascript/validacionCamposAdmin.js"></script>
<script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Bibliotecario Agregado Correctamente<br/>
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
			Problema al Agregar Bibliotecario<br/>
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

