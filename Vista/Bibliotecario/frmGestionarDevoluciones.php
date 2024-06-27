<?php
extract($_REQUEST);
include '../../Modelo/conexion.php';
//include '../../Modelo/material.php';
include '../../Modelo/GestionDatosDevolucion.php';
include '../../Recursos/Paginacion/Paginador.php';

//$objGestionLibro= new GestionDatosLibro();
//$libros= $objGestionLibro->obtenerLibro();
?>

<html>
    <head>
        <script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>
        <link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaMaterialUpdate.css">
    </head>

    <body>
        <form method="post" action="frmGestionarDevoluciones.php">
            <table class="TT" width="365" border="0" align="center" bgcolor="#CC6600">
                <tr valign="middle">
                    <td height="40" colspan="3" align="center" style="color: #ffff00; font-size: 20px;">CONSULTAR EMPLEADO</td>
                </tr>
                <tr>
                    <td width="69" align="center" valign="middle">Dato:</td>
                    <td width="142" align="center" valign="middle"><input name="filtro" type="text" id="filtro" size="20"/></td>
                    <td width="79" align="center" valign="middle"><label for="filtro"></label>
                        <input type="submit" name="button" id="button" value="Buscar" /></td>
                </tr>
                <tr valign="middle">
                    <td height="59" colspan="3" align="center" style="color: #fff;"><p>Este formulario permite realizar busquedas por identificacion, nombre y apellido</p></td>
                </tr>
            </table>
            <br>
            <?php
            $pagina = @$_REQUEST['pagina'];
            $paginador = new Paginador($pagina, 5);
            $inicio = $paginador->getInicio();
            $registros = $paginador->getRegistros();

            @$path = "pag={$_REQUEST['pag']}";
            $paginador->setPath($path);

            $objGestionDevolucion = new GestionDatosDevolucion();
            $prestamos = $objGestionDevolucion->consultarPrestamo($inicio, $registros, @$filtro);

            $paginador->setCabeceraTable(
                    '
            <br><br><br>
            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">MATERIAL DIDACTICO DISPONIBLE</h3>
            <link rel="stylesheet" type="text/css" href="../../Css/VistaBibliotecario/tabla.css">
            <table width="100%" border="0" align="center" class="table-fill">
            <thead>
            <tr align="center">
            <th class="text-left">Usuario</th>
            <th class="text-left">Libro</th>
            <th class="text-left">Cantidad</th>               
            <th class="text-left">Fecha del prestamo</th>
            <th class="text-left"><strong>Editar</strong></th>
            <th class="text-left"><strong>Desactivar</strong></th>
        </tr>
        </thead>');

            $cbk = function($row) {
                $html = "";

                $html .= "
            <tbody class='table-hover'>
            <tr>
                <td class='text-left'>{$row->perNombres}</td>
                <td class='text-left'>{$row->libNombre}</td>
                <td class='text-left'>{$row->preCantidad}</td>
                <td class='text-left'>{$row->preFechaPrestamo}</td>
                <td align='center' class='text-left'><a href='index.php?pag=frmActualizarMaterial&idPrestamo={$row->idPrestamo}'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
                <td align='center' class='text-left'><a href='../../Control/controladorLibro&opcion=3'>
                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
            
            </tr>
            </tbody>";
                return $html;
            };

            $paginador->setFooterTable("</table>");
            echo $paginador->contenido($prestamos->data->rows, $prestamos->data->count, $cbk);
            ?>

        </form>
    </body>
    <script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>
</html>