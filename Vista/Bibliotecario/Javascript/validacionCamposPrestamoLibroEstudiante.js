function validarBuscarE(e) {
    if ($("#BuscarPorEstudiante").val() === "") {
        $("#listadoIdenAgregarE").hide("slow");
        return false;
    }
}

function validarBuscarL(e) {
    if ($("#BuscarPorLibro").val() === "") {
        $("#listadoIdenAgregarL").hide("slow");
        return false;
    }
}

