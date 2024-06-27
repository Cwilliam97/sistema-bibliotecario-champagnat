$(document).ready(function () {

    $('#BuscarPorProfesor').keyup(function () {

        var ide = $(this).val();

        $.ajax({
            url: '../Bibliotecario/funcionamientoBusquedaPrestamo/BuscarProfesorPrestamoLibro.php?iden=' + ide,
            type: 'POST',
            dataType: 'html',
            success: function (data) {

                $('#listadoIdenAgregarP').show();

                $('#listadoIdenAgregarP').html(data);

                console.log(data);
            },
            error: function () {
                alert("error");
            }
        });
    });
        
});



