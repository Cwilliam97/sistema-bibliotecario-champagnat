$(document).ready(function () {

    $('#BuscarPorAdministrativo').keyup(function () {

        var ide = $(this).val();

        $.ajax({
            url: '../Bibliotecario/funcionamientoBusquedaPrestamo/BuscarAdministrativoPrestamoLibro.php?iden=' + ide,
            type: 'POST',
            dataType: 'html',
            success: function (data) {

                $('#listadoIdenAgregarA').show();

                $('#listadoIdenAgregarA').html(data);

                console.log(data);
            },
            error: function () {
                alert("error");
            }
        });
    });
        
});



