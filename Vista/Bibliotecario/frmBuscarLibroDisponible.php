<?php
extract($_REQUEST);
include "../../Modelo/Conexion.php";
include '../../Modelo/libro.php';
include '../../Modelo/GestionDatosLibro.php';

if (isset($filtro)) {
    $objGestionLibro = new GestionDatosLibro();
    $libros = $objGestionLibro->buscarLibroDisponible($filtro);
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Bibliotecario | Lista de libros</title>
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/tabla.css">

    </head>

    <body>

        <div>
            <h3 style="text-align: center; color: #0F97BD; font-size: 27px; margin-top: 30px; margin-bottom: 30px;">Lista de Libros</h3>
            <!--            <div>
                            <input type="text" title="Busca en Deaf Training" id="busqueda">
                        </div>-->
        </div>

        <div id="contenido-buscar">
            <div buscador>
                <input type="search" title="Busca en Champa Library" name="filtro" id="buscarLibro" placeholder="Buscar Libro">
                <input type="button" class="boton-buscar" id="buscarLibrosById" title="Buscar" value="">
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
                    <th class="text-left">Actualizar</th>
                    <th class="text-left">Desactivar</th>
                </tr>
            </thead>
            <?php
            while ($libro = $libros->fetchObject()) {
                ?>
                <tbody class="table-hover">
                    <tr>
                        <td class="text-left"><?php echo $libro->libCodigo ?></td>
                        <td class="text-left"><?php echo $libro->libNombre ?></td>
                        <td class="text-left"><?php echo $libro->libAutor ?></td>
                        <td class="text-left"><?php echo $libro->libCantidad ?></td>
                        <td class="text-left"><?php echo $libro->libEditorial ?></td>
                        <td class="text-left"><?php echo $libro->libEstado ?></td>
                        <td class="text-left"><a href="index.php?pag=frmActualizarLibro&idLibro=<?php echo $libro->idLibro ?>"><img src="../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png" width="30" height="30"></a></td>
                        <td class="text-left"><a href="../../Control/controladorLibro.php?opcion=3&idLibro=<?php echo $libro->idLibro ?>"><img src="../../Recursos/Imagenes/VistaBibliotecario/desactivar.png" width="30" height="30"></a></td>
                    </tr>



                <?php } ?>

            </tbody>
        </table>


    </body>
</html>

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
