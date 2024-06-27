<?php
extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/persona.php';
include '../../Modelo/usuario.php';
include '../../Modelo/GestionDatosBibliotecario.php';
include '../../Recursos/Paginacion/Paginador/PaginadorBibliotecario.php';

//$objGestionLibro= new GestionDatosLibro();
//$libros= $objGestionLibro->obtenerLibro();
?>

<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaBibliotecario.css">
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>

<?php
$pagina = @$_REQUEST['pagina'];
$paginador = new Paginador($pagina, 5);
$inicio = $paginador->getInicio();
$registros = $paginador->getRegistros();

@$path = "pag={$_REQUEST['pag']}";
$paginador->setPath($path);

$objGestionBibliotecario = new GestionDatosBibliotecario();
$bibliotecarios = $objGestionBibliotecario->listarBibliotecario($inicio, $registros);

$paginador->setCabeceraTable(
        '
            <br>
            
            <link rel="stylesheet" href="../../Css/VistaAdministrador/tabla.css">

            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">LISTA BIBLIOTECARIOS</h3>
            <table width="100%" border="0" align="center" class="table-fill">
            <thead>
            <tr align="center">
            <th height="35"class="text-left"><strong>Identificacion</strong></th>
            <th class="text-left"><strong>Nombres</strong></th>
            <th class="text-left"><strong>Apellidos</strong></th>
            <th class="text-left"><strong>Genero</strong></th>
            <th class="text-left"><strong>Telefono</strong></th>
            <th class="text-left"><strong>Correo</strong></th>
            <th class="text-left"><strong>Direccion</strong></th>
            <th class="text-left"><strong>Actualizar</strong></th>
            <th class="text-left"><strong>Desactivar</strong></th>
        </tr>
        </thead>');

$cbk = function($row) {
    $html = "";

    $html .= "
            <tbody class='table-hover'>
            <tr>
                <td class='text-left'>{$row->perIdentificacion}</td>
                <td class='text-left'>{$row->perNombres}</td>
                <td class='text-left'>{$row->perApellidos}</td>
                <td class='text-left'>{$row->perGenero}</td>
                <td class='text-left'>{$row->perTelefono}</td>
                <td class='text-left'>{$row->perCorreo}</td>
                <td class='text-left'>{$row->perDireccion}</td>

                <td align='center' class='text-left'><a href='index.php?pag=frmActualizarBibliotecario&identificacion={$row->perIdentificacion}'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
                <td align='center' class='text-left'><a href='../../Control/controladorLibro&opcion=3'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
            </tr>
            </tbody>";
    return $html;
};

$paginador->setFooterTable("</table>");
echo $paginador->contenido($bibliotecarios->data->rows, $bibliotecarios->data->count, $cbk);
?>

<script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Bibliotecario Actualizado Correctamente<br/>
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
			Problemas al intentar agregar Profesor<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
//if (@$x == 3) {
//    echo "Libro desactivado Correctamente";
//}
//if (@$x == 4) {
//    echo "Problemas al desactivar el Libro";
//}
?>