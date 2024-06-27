<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/GestionDatosAdministrador.php';
include '../../Modelo/persona.php';
include '../../Modelo/usuario.php';

$objGestionAdministrador = new GestionDatosAdministrador();
$administradores = $objGestionAdministrador->obtenerDatosAdmin($identificacion);
$administrador = $administradores->fetchObject();
?>

<link rel="stylesheet" href="../../Css/VistaAdministrador/formularios.css">
<link rel="stylesheet" href="../../Css/VistaAdministrador/validaciones.css">
<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaAdmin.css">
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<form action="../../Control/controladorAdministrador.php" method="post" class="form-register-creador">
    <head></head>   
    <body>

        <h2 class="tittle-creacuenta">ACTUALIZAR MIS DATOS</h2>

        <br>

        <div class="container-input-register">

            <input readonly="true" type="text" value="<?php echo $administrador->perIdentificacion ?>" name="identificacion" class="input-100" id="identificacion">
            <input type="text" value="<?php echo $administrador->perNombres ?>" name="nombres" class="input-100" id="nombre">
            <input type="text" value="<?php echo $administrador->perApellidos ?>" name="apellidos" class="input-100" id="apellido">
            <select name="genero" id="genero" class="input-100" id="genero">
                <option value="<?php echo $administrador->perGenero ?>" class="input-100"><?php echo $administrador->perGenero ?></option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>                        
            </select>
            <input type="text" value="<?php echo $administrador->perTelefono; ?>" name="telefono" class="input-100" id="telefono">
            <input type="text" value="<?php echo $administrador->perCorreo ?>" name="correo" class="input-100" id="correo">
            <input type="text" value="<?php echo $administrador->perDireccion; ?>" name="direccion" class="input-100" id="direccion">

            <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">

            <input type="hidden" value="2" name="opcion">
        </div>            

    </body>
</form>

<script type="text/javascript" src="Javascript/validacionCamposAdmin.js"></script>
<script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Datos actualizados exitosamente<br/>
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
			Problemas al Actualizar Datos<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
?>
