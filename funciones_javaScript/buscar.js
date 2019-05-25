 function buscar(){
    $("#buscar").click(function(){
    $("#pisosMuestra").html("");
   	var ciudad="";
    var comunidad="";
    ciudad=$('#ciudad').val();
    comunidad=$('#comunidad').val();
    	console.log(ciudad);
    	console.log(comunidad);
    	$.get("./funciones_php/consultaGenericaPisos.php",{'ciudad' : ciudad,'comunidad' : comunidad},function(data,estado){
    		if(data === 'success'){
    			$("#pisosMuestra").html(data);
    		}
    	})
    })
 }
 function cargarCiudades(){

 		console.log("hola");
 
 }


    			

