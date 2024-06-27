<?php
require('../../Modelo/conexion2.php');

$sql = "SELECT * FROM libro";
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
        <br>
        <br>
        <br>

        <table id="example" cellspacing="0" width="100%" class="">
            <thead>
                <tr align="center">
                    <th class="text-left">Codigo</th>
                    <th class="text-left">Titulo</th>
                    <th class="text-left">Autor</th>
                    <th class="text-left">Cantidad</th>
                    <th class="text-left">Editorial</th>
                    <th class="text-left">Estado</th>
                    <th class="text-left">Actualizar</th>
                    <th class="text-left">Desactivar</th>
                    <!--<th class="text-left">Estado Libro</th>-->
                </tr>
            </thead>

            <tbody class='table-hover'>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="text-left"><?php echo $row['libCodigo']; ?></td>
                        <td class="text-left"><?php echo $row['libNombre']; ?></td>
                        <td class="text-left"><?php echo $row['libAutor']; ?></td>
                        <td class="text-left"><?php echo $row['libCantidad']; ?></td>
                        <td class="text-left"><?php echo $row['libEditorial']; ?></td>
                        <td class="text-left"><?php echo $row['libEstado']; ?></td>
                        <!--<td class="text-left">< ?php echo $row['libEstadoLibro']; ?></td>-->
                        <td align='center' class='text-left'><a href='index.php?pag=frmActualizarLibro&idLibro=<?php echo $row['idLibro'] ?>'>
                                <img src='../../Recursos/Imagenes/VistaBibliotecario/update.png' width='42' height='39'></a></td>

                                <td align='center' class='text-left'><a href='../../Control/controladorLibro.php?idLibro=<?php echo $row['idLibro'] ?>&opcion=3'>
                                <img src='../../Recursos/Imagenes/VistaBibliotecario/estado.png' width='42' height='39'></a></td>
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
