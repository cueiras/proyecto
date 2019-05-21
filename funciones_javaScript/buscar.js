 function buscar(){
 	var ciudad="";
    var comunidad="";

   	$("#ciudad").change(function(){
        ciudad=$('select[id=ciudad]').val();
            
	})
	$("#comunidad").change(function(){
        comunidad=$('select[id=comunidad]').val();
            
	})
    $("#buscar").click(function(){
    	$("#pisosMuestra").html("");
    	console.log(ciudad);
    	console.log(comunidad);
    	$.get("../funciones_php/Consulta1FiltroPiso.php",{'ciudad' : ciudad,'comunidad' : comunidad},function(data,estado){
    		if(data === 'success'){
    			$("#pisosMuestra").html(data);
    		}
    	})


    

    })
 }

$(document).ready(function(){
    buscar();
});

    			

