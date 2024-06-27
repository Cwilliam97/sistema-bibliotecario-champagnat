<?php
extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/usuario.php';
include '../../Modelo/GestionDatosEstudiante.php';

$objGestionEstudiante = new GestionDatosEstudiante();
$estudiantes = $objGestionEstudiante->listarEstudiantes();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Administrador | Lista de estudiantes</title>
        <link rel="stylesheet" href="../../Css/VistaAdministrador/tabla.css">
    </head>

    <body>

        <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">Lista de Estudiantes</h3>
        <table class="table-fill">
            <thead>
                <tr>
                    <th class="text-left">Identificacion</th>
                    <th class="text-left">Nombres</th>
                    <th class="text-left">Apellidos</th>
                    <th class="text-left">Genero</th>
                    <th class="text-left">Telefono</th>
                    <th class="text-left">correo</th>
                    <th class="text-left">Direccion</th>
                    <th class="text-left">Curso</th>
                </tr>
            </thead>

            <?php
            while ($estudiante = $estudiantes->fetchObject()) {
                ?>

                <tbody class="table-hover">
                    <tr>
                        <td class="text-left"><?php echo $estudiante->perIdentificacion; ?></td>
                        <td class="text-left"><?php echo $estudiante->perNombres ?></td>
                        <td class="text-left"><?php echo $estudiante->perApellidos ?></td>
                        <td class="text-left"><?php echo $estudiante->perGenero ?></td>
                        <td class="text-left"><?php echo $estudiante->perTelefono ?></td>
                        <td class="text-left"><?php echo $estudiante->perCorreo; ?></td>
                        <td class="text-left"><?php echo $estudiante->perDireccion; ?></td>
                        <td class="text-left"><?php echo $estudiante->estCurso ?></td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>

    </body>
</html>
