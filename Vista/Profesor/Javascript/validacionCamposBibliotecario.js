patron = /\d/; // Solo acepta números
patron = /\w/; // Acepta números y letras
patron = /\D/; // No acepta números
patron = /[A-Za-zñÑ\s]/; // igual que el ejemplo, pero acepta también las letras ñ y Ñ

function validarLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8)
        return true;
    patron = /[\D/]/;
    ;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validarNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8)
        return true;
    patron = /[\d/]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validarNumeros_Letras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8)
        return true;
    patron = /[\w/@ #.-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validar_email(email)
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

$(function () {
    $(".btn-enviar").click(function () {
        $(".error2").fadeOut().remove();
        if ($("#identificacion").val() === "") {
            $("#identificacion").focus().after('<span class="error2">Ingrese una identificacion</span>');
            return false;
        }

        if ($("#nombre").val() === "") {
            $("#nombre").focus().after('<span class="error2">Digite un Nombre</span>');
            return false;
        }

        if ($("#nombre").val().length > 40) {
            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
            return false;
        }
        if ($("#nombre").val().length < 3) {
            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
            return false;
        }

        if ($("#apellido").val() === "") {
            $("#apellido").focus().after('<span class="error2">Ingrese un Apellido</span>');
            return false;
        }

        if ($("#genero").val() === "") {
            $("#genero").focus().after('<span class="error2">Seleccione un Genero</span>');
            return false;
        }



        if ($("#telefono").val().length > 10) {
            $("#telefono").focus().after('<span class="error2">Digite un telefono valido</span>');
            return false;
        }
        if ($("#telefono").val() === "") {
            $("#telefono").focus().after('<span class="error2">Digite un telefono</span>');
            return false;
        }


        if ($("#correo").val() !== "") {

            var mail = $("#correo").val();

            if (validar_email(mail))
            {
                $(".error2").fadeOut().remove();
            } else
            {
                $("#correo").focus().after('<span class="error2">Ingrese un correo valido</span>');
                return false;
            }


        }

        if ($("#correo").val() === "") {
            $("#correo").focus().after('<span class="error2">Digite un correo</span>');
            return false;
        }


        if ($("#direccion").val() === "") {
            $("#direccion").focus().after('<span class="error2">Ingrese una direccion</span>');
            return false;
        }

    });
});
