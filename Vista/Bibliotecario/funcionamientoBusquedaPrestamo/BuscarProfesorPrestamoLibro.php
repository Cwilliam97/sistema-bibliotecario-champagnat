<?php
extract($_REQUEST);

include '../../../Modelo/conexion.php';
include '../../../Modelo/libro.php';
include '../../../Modelo/GestionDatosPrestamo.php';


$objGestionPrestamo = new GestionDatosPrestamo();
$profesores = $objGestionPrestamo->buscarProfesor(@$_REQUEST['iden']);
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
foreach ($profesores as $row) {
    $identificacionPro = $row['perIdentificacion'];
//         $idGestor = $row['idAsesor'];
    $nombresPro = $row['perNombres'];
    $apellidosPro = $row['perApellidos'];
    echo "<div class='posicionarSpanP' data-nombrespro='$nombresPro' data-apellidospro='$apellidosPro' data-identificacionpro='$identificacionPro' ><span id='spanIdenP'>$nombresPro $apellidosPro </span></div>";
}

?>

<script type="text/javascript">
    $('.posicionarSpanP').click(function () {
        var nombresPro = $(this).data('nombrespro');
        var apellidosPro = $(this).data('apellidospro');
        var identificacionPro = $(this).data('identificacionpro');

        $('#BuscarPorProfesor').val(nombresPro + ' ' + apellidosPro);
        $('#listadoIdenAgregarP').hide();
        $('#inputOcultoIdProfesor').val(identificacionPro);
    });
    
</script>

