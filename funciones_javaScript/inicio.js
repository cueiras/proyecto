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
function menu(x){

	if (x.matches) {
    	$("#menu2").html("");
    	$("#menu2").append("<button class='btn dropdown-toggle' type='button' data-toggle='dropdown'>Menu</button>");
    	$("#menu2").append("<div class='dropdown-menu'><li><a href='index.php' style='color:white;'>Incio</a><a href='buy.html' style='color:white;'>Casas en alquiler</a><a onclick='salida()' id='salida' style='color:white;'>Desconectarse</a><a href='inicio_sesion.php' style='color:white;''>Iniciar Sesion</a></li></div>");		
  	}

}

$(document).ready(function() {
	inicio();
	$("#salida").hide();
	var x = window.matchMedia("(max-width: 700px)");
	//menu(x);
	//x.addListener(menu);
})
