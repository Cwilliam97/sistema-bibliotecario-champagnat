<?php
extract($_REQUEST);

include '../../../Modelo/conexion.php';
include '../../../Modelo/libro.php';
include '../../../Modelo/GestionDatosPrestamo.php';


$objGestionPrestamo = new GestionDatosPrestamo();
$estudiantes = $objGestionPrestamo->buscarEstudiante(@$_REQUEST['iden']);
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
foreach ($estudiantes as $row) {
    $identificacionEst = $row['perIdentificacion'];
//         $idGestor = $row['idAsesor'];
    $nombresEst = $row['perNombres'];
    $apellidosEst = $row['perApellidos'];
    echo "<div class='posicionarSpanE' data-nombresest='$nombresEst' data-apellidosest='$apellidosEst' data-identificacionest='$identificacionEst' ><span id='spanIdenE'>$nombresEst $apellidosEst </span></div>";
}

?>

<script type="text/javascript">
    $('.posicionarSpanE').click(function () {
        var nombresEst = $(this).data('nombresest');
        var apellidosEst = $(this).data('apellidosest');
        var identificacionEst = $(this).data('identificacionest');



        $('#BuscarPorEstudiante').val(nombresEst + ' ' + apellidosEst);
        $('#listadoIdenAgregarE').hide();
        $('#inputOcultoIdEstudiante').val(identificacionEst);

    });
</script>

