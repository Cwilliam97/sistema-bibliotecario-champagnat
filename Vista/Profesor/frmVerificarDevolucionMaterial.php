<?php

extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/GestionDatosDevolucion.php';
include '../../Recursos/Paginacion/Paginador/PaginadorDevolucionM.php';

//$objGestionLibro= new GestionDatosLibro();
//$libros= $objGestionLibro->obtenerLibro();
?>

<?php

$pagina = @$_REQUEST['pagina'];
$paginador = new Paginador($pagina, 5);
$inicio = $paginador->getInicio();
$registros = $paginador->getRegistros();

@$path = "pag={$_REQUEST['pag']}";
$paginador->setPath($path);

$objGestionLibro = new GestionDatosDevolucion();
$material = $objGestionLibro->listarDevolucionesMaterial($inicio, $registros);

$paginador->setCabeceraTable(
        '
            <br><br><br>
            <link rel="stylesheet" type="text/css" href="../../Css/VistaProfesor/tabla.css">
            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">MATERIAL DIDACTICO PRESTADO</h3>
            <table width="100%" border="0" align="center" class="table-fill">
            <thead>
            <tr align="center">
            <th class="text-left"><strong>Codigo</strong></th>
            <th class="text-left"><strong>Nombre</strong></th>
            <th class="text-left"><strong>Cantidad Prestados</strong></th>
            <th class="text-left"><strong>Fecha Realizacion Prestamo</strong></th>
        </tr>
        </thead>');

$cbk = function($row) {
    $html = "";

    $html .= "
            <tbody class='table-hover'>
            <tr>
                <td class='text-left'>{$row->matCodigo}</td>
                <td class='text-left'>{$row->matNombre}</td>
                <td class='text-left'>{$row->devCantidad}</td>
                <td class='text-left'>{$row->devFechaMaterial}</td>
                
            </tr>
            </tbody>";
    return $html;
};

$paginador->setFooterTable("</table>");
echo $paginador->contenido($material->data->rows, $material->data->count, $cbk);
?>