<?php
extract($_REQUEST);

include '../../../Modelo/conexion.php';
include '../../../Modelo/libro.php';
include '../../../Modelo/GestionDatosPrestamo.php';

$objGestionPrestamo = new GestionDatosPrestamo();
$libros = $objGestionPrestamo->buscarLibro(@$_REQUEST['idenL']);
?>


<?php
foreach ($libros as $row) {
    $idLib = $row['idLibro'];
    $tituloLib=$row['libNombre'];
    $autorLib=$row['libAutor'];
    echo "<div class='posicionarSpanL' data-titulolib='$tituloLib' data-autorlib='$autorLib' data-idlib='$idLib' ><span id='spanIdenL'>$tituloLib </span></div>";
}
?>

<script type="text/javascript">
  
    $('.posicionarSpanL').click(function () {
        var idLib = $(this).data('idlib');
        var tituloLib = $(this).data('titulolib');
//        var autorLib = $(this).data('autorlib');

        $('#BuscarPorLibro').val(tituloLib);
        $('#listadoIdenAgregarL').hide();
        $('#inputOcultoIdLibro').val(idLib);

    });
</script>



