function validarBuscarE(e) {
    if ($("#BuscarPorEstudiante").val() === "") {
        $("#listadoIdenAgregarE").hide("slow");
        return false;
    }
}

function validarBuscarM(e) {
    if ($("#BuscarPorMaterial").val() === "") {
        $("#listadoIdenAgregarM").hide("slow");
        return false;
    }
}

