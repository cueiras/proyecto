function inicio(){
	$.get("./funciones_php/inicio.php",function(data,estado){
		if(estado=='success'){
			if(data.sesion == 'si'){
				$("#menu2 >a:last-child").remove();
				$("#salida").show();
				//$("#menu2").append("<spam id='salir' style='color:white;'>Logout</spam>")
			}
		}
	})
}
function salida(){

		$.get("./funciones_php/salida.php",function(data,estado){
			if(estado == 'success'){
				$("#menu2").append("<a href='inicio_sesion.php'style='color:white;'>Inicio Sesion</spam>");
				$("#salida").hide();
				location.reload();
			}
		})

}


$(document).ready(function() {
	inicio();
	$("#salida").hide();

})
