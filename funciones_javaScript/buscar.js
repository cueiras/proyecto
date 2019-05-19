$(document).ready(function(){
    
    $("#buscar").click(function()){
    	var ciudad=$("#ciudad").val();
    	var ciudad=$("#ciudad").val();
        $.get("./funciones_php/login.php",{'ciudad' : ciudad,'contraseña' : contraseña},function(data,estado){
        


        });

    }

    			
});
