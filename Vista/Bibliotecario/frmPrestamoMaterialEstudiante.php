<?php
extract($_REQUEST);

include '../../Modelo/conexion.php';
include '../../Modelo/GestionDatosPrestamo.php';

//
//$objGestionPrestamo = new GestionDatosPrestamo();
//$estudiantes=$objGestionPrestamo->buscarEstudiante(@$_REQUEST['iden']);
//
?>

<head>
    <link rel="stylesheet" href="../../Css/VistaBibliotecario/formularioLibro.css">
    <link rel="stylesheet" href="../../Css/VistaBibliotecario/validaciones.css">
    <link rel="stylesheet" href="../../Css/VistaBibliotecario/prestamos/buscarMaterialPrestamoEstudiante.css">
    <link rel="stylesheet" href="../../Css/VistaBibliotecario/prestamos/buscarEstudiantePrestamoMaterial.css">
    <link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaPrestamoLibroE.css">
    <script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="Javascript/busquedaEstudiante.js"></script>
    <script type="text/javascript" src="Javascript/busquedaMaterial.js"></script>
    <script type="text/javascript" src="Javascript/validacionCamposPrestamoMaterialEstudiante.js"></script>
</head>

<body>
    <form action="../../Control/controladorPrestamoMaterial.php" method="post" class="form-register-creador">

        <h2 class="tittle-creacuenta">PRESTAMO MATERIAL DIDACTICO ESTUDIANTE</h2>
        <div class="container-input-register">

            <label for="identEstudiante" id="identEstudiante" ></label>  
            <input type="text" name="identEstudiante" id="BuscarPorEstudiante" placeholder="Buscar Estudiante..." autocomplete="off" class="input-100" onkeyup="validarBuscarE(event)">
            <input type="hidden" name="identificacion" id="inputOcultoIdEstudiante">
            <div id="listadoIdenAgregarE"></div>
            
            <label for="identMaterial" id="identMaterial" ></label>  
            <input type="text" name="identMaterial" id="BuscarPorMaterial" placeholder="Buscar material didactico..." autocomplete="off" class="input-100" onkeyup="validarBuscarM(event)">
            <input type="hidden" name="idMaterial" id="inputOcultoIdMaterial">
            <div id="listadoIdenAgregarM"></div>
            
            <input type="text" name="cantidad" placeholder="Cantidad" class="input-48" id="cantidad" onkeypress="">
            <input type="date" name="fechaPrestamo" class="input-48" id="cantidad" onkeypress="" style="height: 50px;">
           
            <input type="submit" value="Realizar Prestamo" class="btn-enviar" id="boton" name="registrar" style="position:relative; left:13%; top:50%">



            <input type="hidden" value="1" name="opcion">

        </div>
    </form>
    <script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>
</body>
<?php
if (@$x == 1) {

    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Prestamo de Libro Registrado Exitosamente<br/>
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
			Problemas al Registrar Prestamo
                        Por favor Intente de nuevo<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
?>