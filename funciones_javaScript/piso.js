
function direcionar(){
	$(".img-fluid").click(function(){
		var idPiso = $(this).attr("id");
		console.log(idPiso);
		$.get("./funciones_php/idPisoSesion.php",{'idPiso' : idPiso},function(data,estado){
			if(estado=='success'){
				console.log("todo bien");
			}
		})
	})
}


$(document).ready(function() {
	direcionar();
})


