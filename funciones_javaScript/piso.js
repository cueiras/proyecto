function direcionar(){
	$(".img-fluid").click(function(){
		var idPiso = $(this).attr("id");
		console.log(idPiso)
	})
}

$(document).ready(function() {
	direcionar();
})

