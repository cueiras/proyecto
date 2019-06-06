 function buscar(){
    $("#buscar").click(function(){
        var comunidad=$("#comunidad").val();
        var ciudad=$("#ciudad").val();
        var zona=$("#zona").val();
        var habitaciones=$("#habitaciones").val();
        var banios=$("#baños").val();

        if(comunidad!=null&&ciudad!=null){
            $.get("./funciones_php/buscar.php",{'comunidad' : comunidad, 'ciudad' : ciudad,'zona' : zona,'habitaciones' : habitaciones,'banios' : banios},function(data,estado){
                if(estado == 'success'){
                    $("#error").html("");
                   
                    $("#pisosMuestra").html(" ")
                    for(var i=0;i<data.length;i++){
                        $("#pisosMuestra").append(data[i].casas);
                        
                    }
                }

            })
        
        }else{$("#error").text("Es necesario selecionar como minimo la comunidad y la cuidad")}

    })
}

function cargarCiudades(){
 	$("#comunidad").on('change',function(){
        var comunidad=$("#comunidad").val();
        $.get("./funciones_php/select_ciudades.php",{'comunidad' : comunidad},function(data,estado){
            
            if(estado == 'success'){
                
                $("#ciudad").html("<option id='optionCiudades' disabled selected>Ciudades</option>");
                for(var i=0;i<data.length;i++){
                    $("#optionCiudades").after("<option value="+data[i].id+">"+data[i].option+"</option>");
                }
                
            }
        })
 	});
}
function cargarZonas(){
    $("#ciudad").change(function(){
        var ciudad=$("#ciudad").val();
      
        $.get("./funciones_php/select_zonas.php",{'ciudad' : ciudad},function(data,estado){
            if(estado == 'success'){
                
                $("#zona").html("<option id='optionZonas' disabled selected>Zonas</option>");
                for(var i=0;i<data.length;i++){
                    $("#optionZonas").after("<option value="+data[i].id+">"+data[i].option+"</option>");
                }
            }
        })
    })
}

$(document).ready(function() {
    buscar();
    cargarCiudades();
    cargarZonas();
})
    			

