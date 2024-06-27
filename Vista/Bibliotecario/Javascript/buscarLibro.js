function buscar() {
    var idLibro = $("#buscarLibro").val();
    if (idLibro === "") {
        alert("Ingrese un dato");
    } else {
        var parametros = {
            "buscarLibro": $("#buscarLibro").val()
        };

        $.ajax({
            url: "frmBuscarLibro.php",
            data: parametros,
            type: 'POST',
            success: function(response) {
                $("#contenido-buscar").html(response);
            }
        });
    }    
};
