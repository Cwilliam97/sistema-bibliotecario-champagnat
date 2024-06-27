<?php
extract($_REQUEST);

include '../../../Modelo/conexion.php';
include '../../../Modelo/libro.php';
include '../../../Modelo/GestionDatosPrestamo.php';


$objGestionPrestamo = new GestionDatosPrestamo();
$administrativos = $objGestionPrestamo->buscarAdministrativo(@$_REQUEST['iden']);
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
foreach ($administrativos as $row) {
    $identificacionAdm = $row['perIdentificacion'];
//         $idGestor = $row['idAsesor'];
    $nombresAdm = $row['perNombres'];
    $apellidosAdm = $row['perApellidos'];
    echo "<div class='posicionarSpanA' data-nombresadm='$nombresAdm' data-apellidosadm='$apellidosAdm' data-identificacionadm='$identificacionAdm' ><span id='spanIdenA'>$nombresAdm $apellidosAdm </span></div>";
}
?>

<script type="text/javascript">
    $('.posicionarSpanA').click(function () {
        var nombresAdm = $(this).data('nombresadm');
        var apellidosAdm = $(this).data('apellidosadm');
        var identificacionAdm = $(this).data('identificacionadm');

        $('#BuscarPorAdministrativo').val(nombresAdm + ' ' + apellidosAdm);
        $('#listadoIdenAgregarA').hide();
        $('#inputOcultoIdAdministrativo').val(identificacionAdm);
    });
</script>

