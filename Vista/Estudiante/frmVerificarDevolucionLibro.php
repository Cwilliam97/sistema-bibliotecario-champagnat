<?php

extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/GestionDatosDevolucion.php';
include '../../Recursos/Paginacion/Paginador/PaginadorPrestamo.php';

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
$libros = $objGestionLibro->listarDevoluciones($inicio, $registros);

$paginador->setCabeceraTable(
        '
            <br><br><br>
            <link rel="stylesheet" type="text/css" href="../../Css/VistaEstudiante/tabla.css">
            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">DEVOLUCIONES DE LIBROS REALIZADAS</h3>
            <table width="100%" border="0" align="center" class="table-fill">
            <thead>
            <tr align="center">
            <th class="text-left"><strong>Codigo</strong></th>
            <th class="text-left"><strong>Titulo</strong></th>
            <th class="text-left"><strong>Autor</strong></th>
            <th class="text-left"><strong>Cantidad</strong></th>
            <th class="text-left"><strong>Editorial</strong></th>
            <th class="text-left"><strong>Fecha Realizacion Prestamo</strong></th>
        </tr>
        </thead>');

$cbk = function($row) {
    $html = "";

    $html .= "
            <tbody class='table-hover'>
            <tr>
                <td class='text-left'>{$row->libCodigo}</td>
                <td class='text-left'>{$row->libNombre}</td>
                <td class='text-left'>{$row->libAutor}</td>
                <td class='text-left'>{$row->libCantidad}</td>
                <td class='text-left'>{$row->libEditorial}</td>
                <td class='text-left'>{$row->devFechaDevolucion}</td>
                
            </tr>
            </tbody>";
    return $html;
};

$paginador->setFooterTable("</table>");
echo $paginador->contenido($libros->data->rows, $libros->data->count, $cbk);
?>