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

$(function () {
    $(".btn-enviar").click(function () {
        $(".error2").fadeOut().remove();

        if ($("#nombre").val() === "") {
            $("#nombre").focus().after('<span class="error2">Digite el nombre del material</span>');
            return false;
        }

        if ($("#cantidad").val() === "") {
            $("#cantidad").focus().after('<span class="error2">Ingrese una cantidad</span>');
            return false;
        }

        if ($("#estado").val() === "") {
            $("#estado").focus().after('<span class="error2">Escriba un estado</span>');
            return false;
        }

    });

});










//    $(".button2").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#identificacion").val().length > 11) {
//            $("#identificacion").focus().after('<span class="error2">Identificacion Invalida</span>');
//            return false;
//        }
//        if ($("#identificacion").val().length < 10) {
//            $("#identificacion").focus().after('<span class="error2">Identificacion Invalida</span>');
//            return false;
//        }
//
//        if ($("#nombre").val().length > 40) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombre").val().length < 3) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//        if ($("#apellido").val().length > 40) {
//            $("#apellido").focus().after('<span class="error2">Apellido Invalido</span>');
//            return false;
//        }
//        if ($("#apellido").val().length < 3) {
//            $("#apellido").focus().after('<span class="error2">Apellido Invalido</span>');
//            return false;
//        }
//
//        if ($("#genero").val() === "") {
//            $("#genero").focus().after('<span class="error2">Genero Invalido</span>');
//            return false;
//        }
//
//        if ($("#telefono").val().length > 13) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//        if ($("#telefono").val().length < 7) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//
//        if ($("#direccion").val().length > 40) {
//            $("#direccion").focus().after('<span class="error2">Direccion Invalida</span>');
//            return false;
//        }
//        if ($("#direccion").val().length < 5) {
//            $("#direccion").focus().after('<span class="error2">Direccion Invalida</span>');
//            return false;
//        }
//
//        if ($("#correo").val().length > 40) {
//            $("#correo").focus().after('<span class="error2">Correo Invalido</span>');
//            return false;
//        }
//        if ($("#correo").val().length < 5) {
//            $("#correo").focus().after('<span class="error2">Correo Invalido</span>');
//            return false;
//        }
//
//        if ($("#datepicker").val() === "") {
//            $("#datepicker").focus().after('<span class="error2">Fecha Invalida</span>');
//            return false;
//        }
//
//        if ($("#salario").val().length > 9) {
//            $("#salario").focus().after('<span class="error2">Salario Invalido</span>');
//            return false;
//        }
//        if ($("#salario").val().length < 5) {
//            $("#salario").focus().after('<span class="error2">Salario Invalido</span>');
//            return false;
//        }
//
//        if ($("#seguro").val().length > 30) {
//            $("#seguro").focus().after('<span class="error2">Seguro Invalido</span>');
//            return false;
//        }
//        if ($("#seguro").val().length < 3) {
//            $("#seguro").focus().after('<span class="error2">Seguro Invalido</span>');
//            return false;
//        }
//
//        if ($("#horarioEmpleado").val() === "") {
//            $("#horarioEmpleado").focus().after('<span class="error2">Horario Invalido</span>');
//            return false;
//        }
//
//        if ($("#aniosLaborados").val().length > 8) {
//            $("#aniosLaborados").focus().after('<span class="error2">Tiempo Invalido</span>');
//            return false;
//        }
//        if ($("#aniosLaborados").val().length < 5) {
//            $("#aniosLaborados").focus().after('<span class="error2">Tiempo Invalido</span>');
//            return false;
//        }
//
//        if ($("#rol").val() === "") {
//            $("#rol").focus().after('<span class="error2">Rol Invalido</span>');
//            return false;
//        }
//
//
//    });
//
//    $(".button3").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#identificacion").val().length > 11) {
//            $("#identificacion").focus().after('<span class="error2">Identificacion Invalida</span>');
//            return false;
//        }
//        if ($("#identificacion").val().length < 10) {
//            $("#identificacion").focus().after('<span class="error2">Identificacion Invalida</span>');
//            return false;
//        }
//
//        if ($("#nombre").val().length > 40) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombre").val().length < 3) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//        if ($("#apellido").val().length > 40) {
//            $("#apellido").focus().after('<span class="error2">Apellido Invalido</span>');
//            return false;
//        }
//        if ($("#apellido").val().length < 3) {
//            $("#apellido").focus().after('<span class="error2">Apellido Invalido</span>');
//            return false;
//        }
//
//        if ($("#genero").val() === "") {
//            $("#genero").focus().after('<span class="error2">Genero Invalido</span>');
//            return false;
//        }
//
//        if ($("#telefono").val().length > 13) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//        if ($("#telefono").val().length < 7) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//
//        if ($("#direccion").val().length > 40) {
//            $("#direccion").focus().after('<span class="error2">Direccion Invalida</span>');
//            return false;
//        }
//        if ($("#direccion").val().length < 5) {
//            $("#direccion").focus().after('<span class="error2">Direccion Invalida</span>');
//            return false;
//        }
//
//        if ($("#correo").val().length > 40) {
//            $("#correo").focus().after('<span class="error2">Correo Invalido</span>');
//            return false;
//        }
//        if ($("#correo").val().length < 5) {
//            $("#correo").focus().after('<span class="error2">Correo Invalido</span>');
//            return false;
//        }
//
//        if ($("#datepicker").val() === "") {
//            $("#datepicker").focus().after('<span class="error2">Fecha Invalida</span>');
//            return false;
//        }
//
//        if ($("#salario").val().length > 9) {
//            $("#salario").focus().after('<span class="error2">Salario Invalido</span>');
//            return false;
//        }
//        if ($("#salario").val().length < 5) {
//            $("#salario").focus().after('<span class="error2">Salario Invalido</span>');
//            return false;
//        }
//
//        if ($("#seguro").val().length > 30) {
//            $("#seguro").focus().after('<span class="error2">Seguro Invalido</span>');
//            return false;
//        }
//        if ($("#seguro").val().length < 3) {
//            $("#seguro").focus().after('<span class="error2">Seguro Invalido</span>');
//            return false;
//        }
//
//        if ($("#horarioEmpleado").val() === "") {
//            $("#horarioEmpleado").focus().after('<span class="error2">Horario Invalido</span>');
//            return false;
//        }
//
//        if ($("#aniosLaborados").val().length > 8) {
//            $("#aniosLaborados").focus().after('<span class="error2">Tiempo Invalido</span>');
//            return false;
//        }
//        if ($("#aniosLaborados").val().length < 5) {
//            $("#aniosLaborados").focus().after('<span class="error2">Tiempo Invalido</span>');
//            return false;
//        }
//
//        if ($("#cargo").val() === "") {
//            $("#cargo").focus().after('<span class="error2">Cargo Invalido</span>');
//            return false;
//        }
//
//
//    });
//
//    $(".button4").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#cantidad").val().length > 15) {
//            $("#cantidad").focus().after('<span class="error2">Cantidad Invalida</span>');
//            return false;
//        }
//        if ($("#cantidad").val().length < 5) {
//            $("#cantidad").focus().after('<span class="error2">Cantidad Invalida</span>');
//            return false;
//        }
//
//        if ($("#nombre").val().length > 40) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombre").val().length < 3) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//        if ($("#proveedor").val().length > 40) {
//            $("#proveedor").focus().after('<span class="error2">Proveedor Invalido</span>');
//            return false;
//        }
//        if ($("#proveedor").val().length < 3) {
//            $("#proveedor").focus().after('<span class="error2">Proveedor Invalido</span>');
//            return false;
//        }
//
//        if ($("#precio").val().length > 10) {
//            $("#precio").focus().after('<span class="error2">Precio Invalido</span>');
//            return false;
//        }
//        if ($("#precio").val().length < 3) {
//            $("#precio").focus().after('<span class="error2">Precio Invalido</span>');
//            return false;
//        }
//
//        if ($("#datepicker").val() === "") {
//            $("#datepicker").focus().after('<span class="error2">Fecha Invalida</span>');
//            return false;
//        }
//
//
//    });
//
//    $(".button5").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#nombre").val().length > 30) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombre").val().length < 5) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//
//    });
//
//
//    $(".button6").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#nombre").val().length > 30) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombre").val().length < 5) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//        if ($("#telefono").val().length > 13) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//        if ($("#telefono").val().length < 7) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//
//        if ($("#ubicacion").val().length > 40) {
//            $("#ubicacion").focus().after('<span class="error2">Ubicacion Invalida</span>');
//            return false;
//        }
//        if ($("#ubicacion").val().length < 5) {
//            $("#ubicacion").focus().after('<span class="error2">Ubicacion Invalida</span>');
//            return false;
//        }
//
//    });
//
//    $(".button7").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#numeroMesa").val().length > 3) {
//            $("#numeroMesa").focus().after('<span class="error2">Dato Invalido</span>');
//            return false;
//        }
//        if ($("#numeroMesa").val().length < 1) {
//            $("#numeroMesa").focus().after('<span class="error2">Dato Invalido</span>');
//            return false;
//        }
//
//        if ($("#ubicacion").val().length > 20) {
//            $("#ubicacion").focus().after('<span class="error2">Ubicacion Invalida</span>');
//            return false;
//        }
//        if ($("#ubicacion").val().length < 5) {
//            $("#ubicacion").focus().after('<span class="error2">Ubicacion Invalida</span>');
//            return false;
//        }
//
//        if ($("#categoria").val().length > 20) {
//            $("#categoria").focus().after('<span class="error2">Categoria Invalida</span>');
//            return false;
//        }
//        if ($("#categoria").val().length < 4) {
//            $("#categoria").focus().after('<span class="error2">Categoria Invalida</span>');
//            return false;
//        }
//
//        if ($("#restaurante").val() === "") {
//            $("#restaurante").focus().after('<span class="error2">Restaurante Invalido</span>');
//            return false;
//        }
//
//    });
//
//
//    $(".button8").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#identificacion").val().length > 11) {
//            $("#identificacion").focus().after('<span class="error2">Identificacion Invalida</span>');
//            return false;
//        }
//        if ($("#identificacion").val().length < 10) {
//            $("#identificacion").focus().after('<span class="error2">Identificacion Invalida</span>');
//            return false;
//        }
//
//        if ($("#nombre").val().length > 40) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombre").val().length < 3) {
//            $("#nombre").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//        if ($("#apellido").val().length > 40) {
//            $("#apellido").focus().after('<span class="error2">Apellido Invalido</span>');
//            return false;
//        }
//        if ($("#apellido").val().length < 3) {
//            $("#apellido").focus().after('<span class="error2">Apellido Invalido</span>');
//            return false;
//        }
//
//        if ($("#genero").val() === "") {
//            $("#genero").focus().after('<span class="error2">Genero Invalido</span>');
//            return false;
//        }
//
//        if ($("#telefono").val().length > 13) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//        if ($("#telefono").val().length < 7) {
//            $("#telefono").focus().after('<span class="error2">Telefono Invalido</span>');
//            return false;
//        }
//
//        if ($("#direccion").val().length > 40) {
//            $("#direccion").focus().after('<span class="error2">Direccion Invalida</span>');
//            return false;
//        }
//        if ($("#direccion").val().length < 5) {
//            $("#direccion").focus().after('<span class="error2">Direccion Invalida</span>');
//            return false;
//        }
//
//        if ($("#correo").val().length > 40) {
//            $("#correo").focus().after('<span class="error2">Correo Invalido</span>');
//            return false;
//        }
//        if ($("#correo").val().length < 5) {
//            $("#correo").focus().after('<span class="error2">Correo Invalido</span>');
//            return false;
//        }
//
//        if ($("#datepicker").val() === "") {
//            $("#datepicker").focus().after('<span class="error2">Fecha Invalida</span>');
//            return false;
//        }
//
//    });
//
//    $(".button9").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#descripcion").val().length > 40) {
//            $("#descripcion").focus().after('<span class="error2">Descripcion Invalida</span>');
//            return false;
//        }
//        if ($("#descripcion").val().length < 5) {
//            $("#descripcion").focus().after('<span class="error2">Descripcion Invalida</span>');
//            return false;
//        }
//
//        if ($("#datepicker").val() === "") {
//            $("#datepicker").focus().after('<span class="error2">Fecha Invalida</span>');
//            return false;
//        }
//
//        if ($("#hora").val() === "") {
//            $("#hora").focus().after('<span class="error2">Hora Invalida</span>');
//            return false;
//        }
//
//        if ($("#mesa").val() === "") {
//            $("#mesa").focus().after('<span class="error2">Mesa Invalida</span>');
//            return false;
//        }
//
//        if ($("#restaurante").val() === "") {
//            $("#restaurante").focus().after('<span class="error2">Restaurante Invalida</span>');
//            return false;
//        }
//
//
//    });
//
//
//    $(".button10").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#descripcion").val().length > 40) {
//            $("#descripcion").focus().after('<span class="error2">Descripcion Invalida</span>');
//            return false;
//        }
//        if ($("#descripcion").val().length < 5) {
//            $("#descripcion").focus().after('<span class="error2">Descripcion Invalida</span>');
//            return false;
//        }
//
//
//    });
//
//    $(".button11").click(function () {
//        $(".error2").fadeOut().remove();
//
//        if ($("#nombreP").val().length > 40) {
//            $("#nombreP").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//        if ($("#nombreP").val().length < 5) {
//            $("#nombreP").focus().after('<span class="error2">Nombre Invalido</span>');
//            return false;
//        }
//
//        if ($("#tipoP").val() === "") {
//            $("#tipoP").focus().after('<span class="error2">Tipo Invalido</span>');
//            return false;
//        }
//
//        if ($("#precioP").val().length > 5) {
//            $("#precioP").focus().after('<span class="error2">Precio Invalido</span>');
//            return false;
//        }
//        if ($("#precioP").val().length < 4) {
//            $("#precioP").focus().after('<span class="error2">Precio Invalido</span>');
//            return false;
//        }
//
//        if ($("#descripcionP").val().length > 40) {
//            $("#descripcionP").focus().after('<span class="error2">Descripcion Invalida</span>');
//            return false;
//        }
//        if ($("#descripcionP").val().length < 5) {
//            $("#descripcionP").focus().after('<span class="error2">Descripcion Invalida</span>');
//            return false;
//        }
//
//        if ($("#caloriasP").val() === "") {
//            $("#caloriasP").focus().after('<span class="error2">Calorias Invalidas</span>');
//            return false;
//        }
//
//        if ($("#cantidadProductosP").val().length > 1) {
//            $("#cantidadProductosP").focus().after('<span class="error2">Cantidad Invalida</span>');
//            return false;
//        }
//        if ($("#cantidadProductosP").val().length < 1) {
//            $("#cantidadProductosP").focus().after('<span class="error2">Cantidad Invalida</span>');
//            return false;
//        }
//
//
//    });

