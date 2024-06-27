<?php
extract($_REQUEST);
include '../../Modelo/conexion.php';
include '../../Modelo/libro.php';
include '../../Modelo/GestionDatosLibro.php';

if(isset($filtro)){
$objGestionLibro= new GestionDatosLibro();
$buscarLibro=$objGestionLibro->buscarLibroDisponible($filtro);
}
?>

<html>
    <head>
        <title>Bibliotecario | Buscar Libro</title>
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/tabla.css">
        <script src="Javascript/buscarLibro.js" type="text/javascript"t></script>
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/funcionesVista.css">
    </head>

    <body>
        <div id="contenido-buscar">
            <div buscador>
                <input type="text" title="Busca en Champa Library" name="filtro" id="buscarLibro" placeholder="Buscar Libro">
                <input type="button" class="boton-buscar" id="buscarLibrosById" title="Buscar" value=""/>
            </div>
        </div>

            <table class="table-fill">
                <thead>
                    <tr>
                        <th class="text-left">Codigo</th>
                        <th class="text-left">Titulo</th>
                        <th class="text-left">Autor</th>
                        <th class="text-left">Cantidad</th>
                        <th class="text-left">Editorial</th>
                        <th class="text-left">Estado</th>
                        <th class="text-left">Disponibilidad</th>
                        <th class="text-left">Actualizar</th>
                        <th class="text-left">Eliminar</th>
                    </tr>
                </thead>
                <?php
                while (@$buscarL = @$buscarLibro->fetchObject()) {
                    ?>
                    <tbody class="table-hover">
                        <tr>
                            <td class="text-left"><?php echo $buscarL->libCodigo ?></td>
                            <td class="text-left"><?php echo $buscarL->libNombre ?></td>
                            <td class="text-left"><?php echo $buscarL->libAutor ?></td>
                            <td class="text-left"><?php echo $buscarL->libCantidad ?></td>
                            <td class="text-left"><?php echo $buscarL->libEditorial ?></td>
                            <td class="text-left"><?php echo $buscarL->libEstado ?></td>
                            <td class="text-left"><?php echo $buscarL->libEstadoLibro ?></td>
                            <td class="text-left"><a href="PaginaInicio.php?pg=FRMActualizarAdministrador&ID=<?php echo $administrador->ID ?>"><img src="../../Recursos/Imegenes/ImgPaginaPrincipal/flecha-de-actualizacion.png" width="30" height="30"></a></td>
                            <td class="text-left"><a href="../../Control/CTRLEmpleado.php?opcion=3&idAprendiz=<?php echo $administrador->ID ?>"><img src="../../Recursos/Imegenes/ImgPaginaPrincipal/cruz-de-eliminar.png" width="30" height="30"></a></td>
                        </tr>



                    <?php } ?>

                </tbody>
            </table>
      
    </body>
</html>
