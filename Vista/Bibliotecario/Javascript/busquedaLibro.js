$(document).ready(function () {

    $('#BuscarPorLibro').keyup(function () {

        var ide = $(this).val();

        $.ajax({
            url: '../Bibliotecario/funcionamientoBusquedaPrestamo/BuscarLibroPrestamo.php?idenL=' + ide,
            type: 'POST',
            dataType: 'html',
            success: function (data) {

                $('#listadoIdenAgregarL').show();

                $('#listadoIdenAgregarL').html(data);

                console.log(data);
            },
            error: function () {
                alert("error");
            }
        });
    });


});
