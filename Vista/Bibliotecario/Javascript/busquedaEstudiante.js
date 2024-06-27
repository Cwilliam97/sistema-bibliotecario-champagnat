$(document).ready(function () {

    $('#BuscarPorEstudiante').keyup(function () {

        var ide = $(this).val();

        $.ajax({
            url: '../Bibliotecario/funcionamientoBusquedaPrestamo/BuscarEstudiantePrestamoLibro.php?iden=' + ide,
            type: 'POST',
            dataType: 'html',
            success: function (data) {

                $('#listadoIdenAgregarE').show();

                $('#listadoIdenAgregarE').html(data);

                console.log(data);
            },
            error: function () {
                alert("error");
            }
        });
    });
        
});



