<?php
require('../../Modelo/conexion2.php');

$sql = " SELECT * FROM prestamolibro as pr INNER JOIN libro as l ON pr.Libro_idLibro=l.idLibro INNER JOIN"
        . " persona as p on p.perIdentificacion=pr.Persona_perIdentificacion";
$result = $mysqli->query($sql);
?>
<html>
    <head>

        <script type="text/javascript" language="javascript" src="Javascript/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="Javascript/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaMaterialUpdate.css">

        <link rel="stylesheet" type="text/css" href="../../Css/VistaBibliotecario/paginacion/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="../../Css/VistaBibliotecario/tablaListar.css">

        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    "order": [[1, "asc"]],
                    "language": {
                        "lengthMenu": "Mostar _MENU_ registros por pagina",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtrada de _MAX_ registros)",
                        "search": "Buscar:",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    }
                });
            });

        </script>

    </head>

    <body>
        <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">LISTADO LIBROS PRESTADOS</h3>

        <table id="example" cellspacing="0" width="100%" class="">
            <thead>
                <tr align="center">
                    <th class="text-left">Usuario</th>
                    <th class="text-left">Libro</th>
                    <th class="text-left">Cantidad</th>
                    <th class="text-left">Fecha del prestamo</th>
                    <th class="text-left">Actualizar</th>
                    <th class="text-left">Devolucion Total</th>
                    <th class="text-left">Devolucion Parcial</th>
                </tr>
            </thead>

            <tbody class='table-hover'>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="text-left"><?php echo $row['perNombres'] . " " . $row['perApellidos']; ?></td>
                        <td class="text-left"><?php echo $row['libNombre']; ?></td>
                        <td class="text-left"><?php echo $row['preCantidad']; ?></td>
                        <td class="text-left"><?php echo $row['preFechaPrestamo']; ?></td>

                        <td align='center' class='text-left'><a href='index.php?pag=frmActualizarPrestamoLibro&idPrestamo=<?php echo $row['idPrestamo'] ?>'>
                                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizar.png' width='42' height='39'></a></td>
                        <td align='center' class='text-left'><a href='index.php?pag=frmActualizarLibro&idLibro=<?php echo $row['idLibro'] ?>'>
                                <img src='../../Recursos/Imagenes/VistaBibliotecario/devolucion_total.png' width='42' height='39'></a></td>

                        <td align='center' class='text-left'><a href='../../Control/controladorLibro.php?idLibro=<?php echo $row['idLibro'] ?>&opcion=3'>
                                <img src='../../Recursos/Imagenes/VistaBibliotecario/devolucion_parcial.png' width='42' height='39'></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>

    <script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

</html>	


<?php
if (@$x == 1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Libro Actualizado Correctamente<br/>
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
			Problemas al Actualizar Libro
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
			El Libro Cambio a Estado Inactivo<br/>
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
