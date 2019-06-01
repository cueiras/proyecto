 function buscar(){
    $("#buscar").click(function(){

    })

 }

function cargarCiudades(){
 	$("#comunidad").on('change',function(){
        var comunidad=$("#comunidad").val();
        console.log(comunidad);
        $.get("./funciones_php/select_ciudades.php",{'comunidad' : comunidad},function(data,estado){
            console.log("2");
            if(estado === 'success'){
                console.log("dentro");
                console.log(data)
                $("#optionCiudades").after("<option value="+data.id+">"+data.option+"</option>");
            }
            console.log("3");
        })
 	});
}
function cargarZonas(){
    $("#ciudad").change(function(){
        var ciudad=$("#ciudad").val();
        console.log(ciudad);
        $.get("./funciones_php/select_zonas.php",{'ciudad' : ciudad},function(data,estado){
            if(estado === 'success'){
                console.log(data);
                $("#optionZonas").after("<option value="+data.id+">"+data.option+"</option>");
            }
        })
    })
}

$(document).ready(function() {
    buscar();
    cargarCiudades();
    cargarZonas();
})
    			

