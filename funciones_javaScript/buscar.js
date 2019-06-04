 function buscar(){
    $("#buscar").click(function(){

    })

 }

function cargarCiudades(){
 	$("#comunidad").on('change',function(){
        var comunidad=$("#comunidad").val();
        $.get("./funciones_php/select_ciudades.php",{'comunidad' : comunidad},function(data,estado){
            
            if(estado == 'success'){

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
    			

