<?php
extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/material.php';
include '../../Modelo/GestionDatosMaterial.php';
include '../../Recursos/Paginacion/Paginador/PaginadorMaterial.php';

//$objGestionLibro= new GestionDatosLibro();
//$libros= $objGestionLibro->obtenerLibro();
?>
<script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaMaterialUpdate.css">

<?php
$pagina = @$_REQUEST['pagina'];
$paginador = new Paginador($pagina, 5);
$inicio = $paginador->getInicio();
$registros = $paginador->getRegistros();

@$path = "pag={$_REQUEST['pag']}";
$paginador->setPath($path);

$objGestionMaterial = new GestionDatosMaterial();
$materiales = $objGestionMaterial->listarMaterialDidactico($inicio, $registros);

$paginador->setCabeceraTable(
        '
            <br><br><br>
            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">MATERIAL DIDACTICO DISPONIBLE</h3>
            <link rel="stylesheet" type="text/css" href="../../Css/VistaBibliotecario/tabla.css">
            <table width="100%" border="0" align="center" class="table-fill">
            <thead>
            <tr align="center">
            <th height="35"class="text-left"><strong>Codigo</strong></th>
            <th class="text-left"><strong>Nombre</strong></th>
            <th class="text-left"><strong>Cantidad</strong></th>
            <th class="text-left"><strong>Estado</strong></th>
            <th class="text-left"><strong>Editar</strong></th>
            <th class="text-left"><strong>Desactivar</strong></th>
        </tr>
        </thead>');

$cbk = function($row) {
    $html = "";

    $html .= "
            <tbody class='table-hover'>
            <tr>
                <td class='text-left'>{$row->matCodigo}</td>
                <td class='text-left'>{$row->matNombre}</td>
                <td class='text-left'>{$row->matCantidad}</td>
                <td class='text-left'>{$row->matEstado}</td>
                <td align='center' class='text-left'><a href='index.php?pag=frmActualizarMaterial&idMaterial={$row->idmaterialDidactico}'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
                <td align='center' class='text-left'><a href='../../Control/controladorLibro&opcion=3'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
            </tr>
            </tbody>";
    return $html;
};

$paginador->setFooterTable("</table>");
echo $paginador->contenido($materiales->data->rows, $materiales->data->count, $cbk);
?>

<script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>


<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Material Didactico Actualizado Correctamente<br/>
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
			Problemas al Actualizar Material Didactico
                        Por favor Intente de nuevo<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}

if (@$x == 3) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Material Didactico Paso a Estado Inactivo<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
if (@$x == 4) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Problemas al Cambiar Estado
                        Por favor Intente de nuevo<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}

?>
