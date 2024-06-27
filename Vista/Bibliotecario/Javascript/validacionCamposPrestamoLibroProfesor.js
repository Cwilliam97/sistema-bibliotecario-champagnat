function validarBuscarP(e) {
    if ($("#BuscarPorProfesor").val() === "") {
        $("#listadoIdenAgregarP").hide("slow");
        return false;
    }
}

function validarBuscarL(e) {
    if ($("#BuscarPorLibro").val() === "") {
        $("#listadoIdenAgregarL").hide("slow");
        return false;
    }
}

