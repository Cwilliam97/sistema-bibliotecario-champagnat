<?php

extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/libro.php';
include '../../Modelo/GestionDatosLibro.php';
include '../../Recursos/Paginacion/Paginador.php';

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

$objGestionLibro = new GestionDatosLibro();
$libros = $objGestionLibro->listarLibro($inicio, $registros);

$paginador->setCabeceraTable(
        '
            <br><br><br>
            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">LIBROS DISPONIBLES</h3>
            <table width="100%" border="0" align="center" class="table-fill">
            <thead>
            <tr align="center">
            <th height="35"class="text-left"><strong>Codigo</strong></th>
            <th class="text-left"><strong>Titulo</strong></th>
            <th class="text-left"><strong>Autor</strong></th>
            <th class="text-left"><strong>Cantidad</strong></th>
            <th class="text-left"><strong>Editorial</strong></th>
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
                <td class='text-left'>{$row->libCodigo}</td>
                <td class='text-left'>{$row->libNombre}</td>
                <td class='text-left'>{$row->libAutor}</td>
                <td class='text-left'>{$row->libCantidad}</td>
                <td class='text-left'>{$row->libEditorial}</td>
                <td class='text-left'>{$row->libEstado}</td>
                <td align='center' class='text-left'><a href='index.php?pag=frmActualizarLibro&idLibro={$row->idLibro}'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
                <td align='center' class='text-left'><a href='../../Control/controladorLibro&opcion=3'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
            </tr>
            </tbody>";
    return $html;
};

$paginador->setFooterTable("</table>");
echo $paginador->contenido($libros->data->rows, $libros->data->count, $cbk);
?>


<?php

if (@$x == 1) {
    echo "Libro Actualizado Correctamente";
}
if (@$x == 2) {
    echo "Problemas al actualizar el Libro";
}
if (@$x == 3) {
    echo "Libro desactivado Correctamente";
}
if (@$x == 4) {
    echo "Problemas al desactivar el Libro";
}

?>
