<?php
extract($_REQUEST);

include '../../../Modelo/conexion.php';
include '../../../Modelo/material.php';
include '../../../Modelo/GestionDatosPrestamo.php';


$objGestionPrestamo = new GestionDatosPrestamo();
$materiales = $objGestionPrestamo->buscarMaterial(@$_REQUEST['idenM']);
?>

<style type="text/css">

    /*#BuscarPorGestor{
        
        background: white;
        width: 320px;
        padding: 5px 5px;
        box-sizing: border-box;
        margin-top: 10px;
        margin-bottom: 5px;
        border-radius: 7px;
        border: 0px;
        border-radius: 5px;
    }*/


</style>


<?php
foreach ($materiales as $row) {
    $idMat = $row['idmaterialDidactico'];
//         $idGestor = $row['idAsesor'];
    $nombreMat = $row['matNombre'];
//    $apellidosAdm = $row['perApellidos'];
    echo "<div class='posicionarSpanM' data-nombremat='$nombreMat' data-idmat='$idMat' ><span id='spanIdenM'>$nombreMat </span></div>";
}
?>

<script type="text/javascript">
    $('.posicionarSpanM').click(function () {
        var nombreMat = $(this).data('nombremat');
        var idMat = $(this).data('idmat');

        $('#BuscarPorMaterial').val(nombreMat);
        $('#listadoIdenAgregarM').hide();
        $('#inputOcultoIdMaterial').val(idMat);
    });
</script>

