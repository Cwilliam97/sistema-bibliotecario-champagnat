<?php
extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/usuario.php';
include '../../Modelo/GestionDatosAdministrador.php';

$objGestionAdministrador = new GestionDatosAdministrador();
$administradores = $objGestionAdministrador->listarAdministrador();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Administrador | Lista de Administradores</title>
        <link rel="stylesheet" href="../../Css/VistaAdministrador/tabla.css">
        <link rel="stylesheet" href="ventanaEmergente/ventanaRespuestaAdmins.css">
        <script type="text/javascript" src="Javascript/jquery-1.7.1.min.js"></script>
    </head>

    <body>

        <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">Lista de Administradores</h3>
        <table class="table-fill">
            <thead>
                <tr>
                    <th class="text-left">Identificacion</th>
                    <th class="text-left">Nombres</th>
                    <th class="text-left">Apellidos</th>
                    <th class="text-left">Genero</th>
                    <th class="text-left">Telefono</th>
                    <th class="text-left">Correo</th>
                    <th class="text-left">Direccion</th>
                    <th class="text-left">Editar</th>
                </tr>
            </thead>

            <?php
            while ($admin = $administradores->fetchObject()) {
                ?>

                <tbody class="table-hover">
                    <tr>
                        <td class="text-left"><?php echo $admin->perIdentificacion; ?></td>
                        <td class="text-left"><?php echo $admin->perNombres ?></td>
                        <td class="text-left"><?php echo $admin->perApellidos ?></td>
                        <td class="text-left"><?php echo $admin->perGenero ?></td>
                        <td class="text-left"><?php echo $admin->perTelefono ?></td>
                        <td class="text-left"><?php echo $admin->perCorreo; ?></td>
                        <td class="text-left"><?php echo $admin->perDireccion; ?></td>

                        <td align='center' class='text-left'><a href='index.php?pag=frmActualizarAdministrador&identificacion=<?php echo $admin->perIdentificacion ?>'>
                                <img src='../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png' width='42' height='39'></a></td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>

    </body>

    <script type="text/javascript" src="Javascript/validacionCamposAdmin.js"></script>
    <script type="text/javascript" src="Javascript/ventanaRespuesta.js"></script>

    <?php
    if (@$x == 1) {
        echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Datos actualizados exitosamente<br/>
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
			Problemas al Actualizar Datos<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
    }
    ?>

</html>
