<?php
require('../../Modelo/conexion2.php');

$sql = "SELECT * FROM persona AS p INNER JOIN estudiante AS e WHERE p.perIdentificacion=e.Persona_perIdentificacion";
$result = $mysqli->query($sql);
?>
<html>
    <head>

        <script type="text/javascript" language="javascript" src="Javascript/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="Javascript/jquery.dataTables.min.js"></script>
        
        <link rel="stylesheet"  type="text/css" href="ventanaEmergente/ventanaRespuestaEstudiante.css">
        <link rel="stylesheet" type="text/css" href="../../Css/VistaAdministrador/paginacion/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="../../Css/VistaAdministrador/tablaListar.css">

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
                    <th class="text-left">Identificacion</th>
                    <th class="text-left">Nombre</th>
                    <th class="text-left">Apellido</th>
                    <th class="text-left">Genero</th>
                    <th class="text-left">Telefono</th>
                    <th class="text-left">Correo</th>
                    <th class="text-left">Direccion</th>
                    <th class="text-left">Curso</th>
                    <th class="text-left">Actualizar</th>
                    <th class="text-left">Desactivar</th>
                    <!--<th class="text-left">Estado Libro</th>-->
                </tr>
            </thead>

            <tbody class='table-hover'>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="text-left"><?php echo $row['perIdentificacion']; ?></td>
                        <td class="text-left"><?php echo $row['perNombres']; ?></td>
                        <td class="text-left"><?php echo $row['perApellidos']; ?></td>
                        <td class="text-left"><?php echo $row['perGenero']; ?></td>
                        <td class="text-left"><?php echo $row['perTelefono']; ?></td>
                        <td class="text-left"><?php echo $row['perCorreo']; ?></td>
                        <td class="text-left"><?php echo $row['perDireccion']; ?></td>
                        <td class="text-left"><?php echo $row['estCurso']; ?></td>
                        <!--<td class="text-left">< ?php echo $row['libEstadoLibro']; ?></td>-->
                        <td align='center' class='text-left'><a href='index.php?pag=frmActualizarEstudiante&identificacion=<?php echo $row['perIdentificacion'] ?>'>
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
			Datos de Estudiante Actualizados Correctamente<br/>
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
			Problemas al intentar Actualizar Estudiante<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}
?>


