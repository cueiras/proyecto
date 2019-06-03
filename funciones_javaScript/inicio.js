function inicio(){
	/*$.get("./funciones_php/incio.php",function(data,estado){
		if(estado=='success'){
			if(data.sesion == 'si'){*/
				$("#menu2 >a:last-child").remove();
				$("#menu2").append("<spam id='salir' style='color:white;'>Logout</spam>")
			/*}
		}
	})*/
}
function salida(){
	
}

$(document).ready(function() {
	inicio();
})
