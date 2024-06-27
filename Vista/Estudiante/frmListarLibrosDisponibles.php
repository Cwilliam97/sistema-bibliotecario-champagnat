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

        <link rel="stylesheet" type="text/css" href="../../Css/VistaEstudiante/paginacion/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="../../Css/VistaEstudiante/tablaListar.css">

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
                        <td class="text-left"><?php echo $row['libEstadoLibro']; ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>

</html>	
