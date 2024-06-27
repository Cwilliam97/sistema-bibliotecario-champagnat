<?php
require('../../Modelo/conexion2.php');

$sql = " SELECT * FROM prestamomaterial as pr INNER JOIN materialdidactico as m ON pr.materialDidactico_idMaterialDidactico="
     . " m.idMaterialDidactico INNER JOIN persona as p on p.perIdentificacion=pr.Persona_perIdentificacion";
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
                    <th class="text-left">Material Didactico</th>
                    <th class="text-left">Cantidad</th>
                    <th class="text-left">Fecha del prestamo</th>
                </tr>
            </thead>

            <tbody class='table-hover'>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="text-left"><?php echo $row['perNombres']." ".$row['perApellidos']; ?></td>
                        <td class="text-left"><?php echo $row['matNombre']; ?></td>
                        <td class="text-left"><?php echo $row['preCantidad']; ?></td>
                        <td class="text-left"><?php echo $row['preFechaMaterial']; ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>

    <script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

</html>	
