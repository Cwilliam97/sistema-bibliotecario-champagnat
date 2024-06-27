<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/persona.php';
include '../../Modelo/GestionDatosBibliotecario.php';

$objGestionBibliotecario= new GestionDatosBibliotecario();
$usuarios=$objGestionBibliotecario->obtenerDatos();
$usuario=$usuarios->fetchObject();

?>

<link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioActualizar.css">
<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaMisDatos.css">
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<form action="../../Control/controladorBibliotecario.php" method="post" class="form-register-creador">
    
    <h2 class="tittle-creacuenta">ACTUALIZAR MIS DATOS</h2>
    
    <br>
    
    <div class="container-input-register">
        <input type="text" value="<?php echo $usuario->perNombres ?>" name="nombres" class="input-100">
        <input type="text" value="<?php echo $usuario->perApellidos ?>" name="apellidos" class="input-100">
        <input type="text" value="<?php echo $usuario->perGenero ?>" name="genero" class="input-100">
        <input type="text" value="<?php echo $usuario->perTelefono ?>" name="telefono" class="input-100">
        <input type="text" value="<?php echo $usuario->perCorreo ?>" name="correo" class="input-100">
        <input type="text" value="<?php echo $usuario->perDireccion ?>" name="direccion" class="input-100">    
        <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">
    </div>
    
    <input type="hidden" name="identificacion" value="<?php echo $usuario->perIdentificacion ?>">
    <input type="hidden" name="opcion" value="2">
</form>

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
