function direcionar(){
	$(".img-fluid").click(function(){
		var idPiso = $(this).attr("id");
		console.log(idPiso);
		$.get("./funciones_php/cargaPisos.php",{'idPiso' : idPiso},function(data,estado){
			if(estado == 'success'){
				$("#selects").hide();
				$("#pisos").hide();
				$("#carrousel").hide();
				$("#menuPrincipal").attr("style","background-color:rgb(205, 205, 177);");
				$("#calle").text("Calle: "+data.calle+"/"+data.nombreZona+", "+data.nombreCiudad);
				$("#precio").text(data.precio+"$");
				$("#banios").text(data.banios);
				$("#tipoCasa").text(data.tipo_casa);
				$("#anio").text(data.anio);
				$("#preciom2").text(data.precio_m2);
				$("#informacion").text(data.informacion);
				$("#tlf").text("TLF: "+data.telefono);
				$("#principal").attr("src",""+data.imagenPrincipal+"");
				$("#m2").text(data.m2);
				$("#habitacion").text(data.habitaciones);
				$("#oculto").show();
				window.scrollTo(0,0);
					
			}
		})
		
	})
}



$(document).ready(function() {
	direcionar();
	$("#oculto").hide();
})


