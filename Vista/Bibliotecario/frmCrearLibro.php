<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/libro.php';
?>

<head>
    <link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioLibro.css">
    <link rel="stylesheet" href="../../Css/VistaBibliotecario/validaciones.css">
    <link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaLibro.css">
    <script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>
</head>

<body>
    <form action="../../Control/controladorLibro.php" method="post" class="form-register-creador">

        <h2 class="tittle-creacuenta">AGREGAR LIBRO</h2>
        <div class="container-input-register">
            <input type="text" name="codigo" placeholder="Codigo" class="input-100" id="codigo" onkeypress="return validarNumeros_Letras(event)">
            <input type="text" name="nombre" placeholder="Titulo"  id="nombre" onkeypress="return validarNumeros_Letras(event)" class="input-100">
            <input type="text" name="autor" placeholder="Autor" id="autor" class="input-100" onkeypress=" return validarLetras(event)"> 
            <input type="text" name="cantidad" placeholder="Cantidad" id="cantidad" class="input-100" onkeypress=" return validarNumeros(event)">
            <input type="text" name="editorial" placeholder="Editorial" id="editorial" class="input-100" onkeypress="return validarNumeros_Letras(event)">
            <input type="text" name="estado" placeholder="Estado" id="estado" class="input-100" onkeypress="return validarLetras(event)">
            <input type="submit" value="Registrar" class="btn-enviar" id="boton" name="registrar" style="position:relative; left:13%; top:50%">
            <input type="hidden" value="1" name="opcion">

        </div>
    </form>
    <script type="text/javascript" src="Javascript/validacionCamposLibro.js"></script>
    <script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>
</body>
<?php
if (@$x == 1) {
    
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Libro Agregado Correctamente<br/>
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
			Problemas al agregar libro
                        Por favor Intente de nuevo<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}

?>

