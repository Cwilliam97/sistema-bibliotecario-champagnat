$(document).ready(function () {

    $('#BuscarPorMaterial').keyup(function () {

        var ide = $(this).val();

        $.ajax({
            url: '../Bibliotecario/funcionamientoBusquedaPrestamo/BuscarMaterialPrestamo.php?idenM=' + ide,
            type: 'POST',
            dataType: 'html',
            success: function (data) {

                $('#listadoIdenAgregarM').show();

                $('#listadoIdenAgregarM').html(data);

                console.log(data);
            },
            error: function () {
                alert("error");
            }
        });
    });


});
