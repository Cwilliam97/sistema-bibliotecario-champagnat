<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/persona.php';
include '../../Modelo/profesor.php';
include '../../Modelo/GestionDatosProfesor.php';

$identi=$_GET['id'];

$objGestionProfesor= new GestionDatosProfesor();
$profesores=$objGestionProfesor->obtenerProfesor($identi);
$profesor = $profesores->fetchObject();
?>

<link rel="stylesheet" href="../../Css/VistaAdministrador/formularios.css">
<link rel="stylesheet" href="../../Css/VistaAdministrador/validaciones.css">
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<form action="../../Control/controladorAdministrador.php" method="post" class="form-register-creador">
    <head></head>   
    <body>

        <h2 class="tittle-creacuenta">ACTUALIZAR PROFESOR</h2>

        <br>

        <div class="container-input-register">

            <input readonly="true" type="text" value="<?php echo $profesor->perIdentificacion?>" name="identificacion" class="input-100" id="identificacion">
            <input type="text" value="<?php echo $profesor->perNombres?>" name="nombres" class="input-100" id="nombre">
            <input type="text" value="<?php echo $profesor->perApellidos?>" name="apellidos" class="input-100" id="apellido">
            <select name="genero" id="genero" class="input-100" id="genero">
                <option value="<?php echo $profesor->perGenero?>" class="input-100"><?php echo $profesor->perGenero?></option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>                        
            </select>
            <input type="text" value="<?php echo $profesor->perTelefono;?>" name="telefono" class="input-100" id="telefono">
            <input type="text" value="<?php echo $profesor->perCorreo?>" name="correo" class="input-100" id="correo">
            <input type="text" value="<?php echo $profesor->perDireccion;?>" name="direccion" class="input-100" id="direccion">
            
            <input type="submit" value="Actualizar" class="btn-enviar" style="position:relative; left:13%; top:50%">
            
            <input type="hidden" value="7" name="opcion">
        </div>            

    </body>
    
    <script type="text/javascript" src="Javascript/validacionCamposProfesor.js"></script>
    
</form>

<?php
if (@$x == 1) {
    echo "Datos Actualizado Correctamente";
}
if (@$x == 2) {
    echo "Problemas al actualizar los datos";
}

?>
