function inicio(){
	$.get("./funciones_php/incio.php",function(data,estado){
		if(estado=='success'){
			if(data.sesion == 'si'){
				$("#menu2 >a:last-child").remove();
				$("#menu2").append("<spam id='salir' style='color:white;'>Logout</spam>")
			}
		}
	})
}
function salida(){
	$("#salir").click(function(){
		$.get("./funciones_php/salida.php",function(data,estado){
			if(estado == 'success'){
				$("#menu2 >a:last-child").remove();
				$("#menu2").append("<a href='inicio_sesion.php'style='color:white;'>Inicio Sesion</spam>")
			}
		})
	})	
}

$(document).ready(function() {
	//inicio();
})
