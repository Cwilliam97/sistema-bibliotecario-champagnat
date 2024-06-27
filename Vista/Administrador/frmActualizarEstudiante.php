<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/GestionDatosEstudiante.php';
include '../../Modelo/persona.php';
include '../../Modelo/usuario.php';


$objGestionEstudiante = new GestionDatosEstudiante();
$estudiantes = $objGestionEstudiante->obtenerDatosEstudiante(@$identificacion);
$estudiante = $estudiantes->fetchObject();
?>

<link rel="stylesheet" href="../../Css/VistaAdministrador/formularios.css">
<link rel="stylesheet" href="../../Css/VistaAdministrador/validaciones.css">
<!--<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaBibliotecario.css">-->
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<form action="../../Control/controladorEstudiante.php" method="post" class="form-register-creador">
    <head></head>   
    <body>

        <h2 class="tittle-creacuenta">ACTUALIZAR DATOS ESTUDIANTE</h2>

        <br>

        <div class="container-input-register">

            <input type="text" value="<?php echo $estudiante->perIdentificacion ?>" name="identificacion" class="input-100" id="identificacion">
            <input type="text" value="<?php echo $estudiante->perNombres ?>" name="nombres" class="input-100" id="nombre">
            <input type="text" value="<?php echo $estudiante->perApellidos ?>" name="apellidos" class="input-100" id="apellido">
            <select name="genero" id="genero" class="input-100" id="genero">
                <option value="<?php echo $estudiante->perGenero ?>" class="input-100"><?php echo $estudiante->perGenero ?></option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>                        
            </select>
            <input type="text" value="<?php echo $estudiante->perTelefono; ?>" name="telefono" class="input-100" id="telefono">
            <input type="text" value="<?php echo $estudiante->perCorreo ?>" name="correo" class="input-100" id="correo">
            <input type="text" value="<?php echo $estudiante->perDireccion; ?>" name="direccion" class="input-100" id="direccion">
            <input type="text" value="<?php echo $estudiante->estCurso; ?>" name="curso" class="input-100" id="curso">

            <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">

            <input type="hidden" value="2" name="opcion">
            
        </div>            

    </body>
</form>

<script type="text/javascript" src="Javascript/validacionCamposEstudiante.js"></script>
<!--<script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>-->

<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Datos de Estudiante Actualizados Correctamente<br/>
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
			Problemas al intentar Actualizar Estudiante<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
?>