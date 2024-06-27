$(function(){
    $("#departamento").change(function() {
        
        var parametros = {
            "idDepartamentos" : $('#departamento').val()
        };
        $.ajax({
            url:'Control/obtenerMunicipios.php',
            data: parametros,
            type: 'post',
            success: function(response){
                $("#municipios").html(response);
            }
        });
    });
/*Obtener municipios para Administrador*/
    $("#departamento").change(function() {
        
        var parametros = {
            "idDepartamentos" : $('#departamento').val()
        };
        $.ajax({
            url:'../../Control/obtenerMunicipios.php',
            data: parametros,
            type: 'post',
            success: function(response){
                $("#municipios").html(response);
            }
        });
    });
    
//    
//    var cont = 0;
//    var cont1 = 0;
//   $(".0").click(function() {       
//        if(cont == 0)
//        {   $("#mensajeCorrecto").hide();
//            $("#mensajeinCorrecto").show();
//            cont++
//        }         
//        if(cont1 ==2 && cont !=0 ){
//            $("#mensajeCorrecto").show();
//            $("#mensajeinCorrecto").hide();
//        }
//        
//            
//    });        
//        
//    $(".1").click(function() {  
//        if(cont == 0 && cont1 == 0){
//            $("#mensajeCorrecto").hide();
//            $("#mensajeinCorrecto").show();
//            cont1 = 2;
//            cont++;
//        } 
//        if(cont1 == 2){
//            $("#mensajeCorrecto").show();
//            $("#mensajeinCorrecto").hide();
//            cont1 = 2;           
//        } 
//       
//                      
//    });
    $(".Calificar").click(function() {         
        $(".0").hide();
        $(".1").show();
        $("#mensajeCorrecto").show();
        $("#mensajeinCorrecto").hide();
    });
    $(".Contunuar").click(function() {         
        $(location).attr('href','Entrenamiento.php');
    });
//    
});


  
    function calificar(j,rp,rr,a){
        $(".boton_jugar").attr("onclick","");
         var parametros = {
            "idJugador" : j,
            "idPreguntas" : rp,
            "idRespuestas" : rr,
            "resAsignacion" : a
            
        };
        $.ajax({
            url:'HistorialJugador.php',
            data: parametros,
            type: 'post',
            success: function(response){
                if(a == 1 ){
                   $("#mensajeCorrecto").show(); 
                }
                if(a == 0 ){
                   $("#mensajeinCorrecto").show(); 
               }
            }
        });
        
    }
