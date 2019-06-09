function direcionar(){
	$(document).on("click",".img-fluid",function(){

		var idPiso = $(this).attr("id");
		console.log(idPiso);
		$.get("./funciones_php/cargaPisos.php",{'idPiso' : idPiso},function(data,estado){
			if(estado == 'success'){
				$.get("./funciones_php/cargaImagenes.php",{'idPiso' : idPiso},function(data,estado){
					if(estado == 'success'){
						console.log(data);
						for(var i=0;i<data.length;i++){
                        	if(i == 0){
                        		$("#imagenes").append("<div class='carousel-item active'><img src='"+data[i].imagen+"'class='img-fluid'></div>");
                        	}else{
                        		$("#imagenes").append("<div class='carousel-item '><img src='"+data[i].imagen+"'class='img-fluid'></div>");
                        	}
                   		}
					}
				})
				$("#selects").hide();
				$("#pisos").hide();
				$("#carrousel").hide();
				$("#menuPrincipal").attr("style","background-color:rgb(205, 205, 177);");
				$("#calle").text("Calle: "+data.calle+": Nº"+data.numero+" "+data.piso+"/"+data.nombreZona+", "+data.nombreCiudad);
				$("#precio").text(data.precio+"$");
				$("#banios").text(data.banios);
				$("#tipoCasa").text(data.tipo_casa);
				$("#anio").text(data.anio);
				$("#preciom2").text(data.precio_m2);
				$("#informacion").text(data.informacion);
				$("#tlf").text("Telefono: "+data.telefono);
				$("#principal").attr("src",""+data.imagenPrincipal+"");
				$("#m2").text(data.m2);
				$("#habitacion").text(data.habitaciones);
				$("#oculto").show();
				window.scrollTo(0,0);
					
			}
		})
		
	})
}
function pisoMenu(){
	$(".buscar2").click(function(){
		var idPiso = $(this).attr("id");
		console.log(idPiso);
		$.get("./funciones_php/cargaPisos.php",{'idPiso' : idPiso},function(data,estado){
			if(estado == 'success'){
				$.get("./funciones_php/cargaImagenes.php",{'idPiso' : idPiso},function(data,estado){
					if(estado == 'success'){
						console.log(data);
						for(var i=0;i<data.length;i++){
                        	if(i == 0){
                        		$("#imagenes").append("<div class='carousel-item active'><img src='"+data[i].imagen+"'class='img-fluid'></div>");
                        	}else{
                        		$("#imagenes").append("<div class='carousel-item '><img src='"+data[i].imagen+"'class='img-fluid'></div>");
                        	}
                   		}
					}
				})
				$("#selects").hide();
				$("#pisos").hide();
				$("#carrousel").hide();
				$("#menuPrincipal").attr("style","background-color:rgb(205, 205, 177);");
				$("#calle").text("Calle: "+data.calle+": Nº"+data.numero+" "+data.piso+"/"+data.nombreZona+", "+data.nombreCiudad);
				$("#precio").text(data.precio+"$");
				$("#banios").text(data.banios);
				$("#tipoCasa").text(data.tipo_casa);
				$("#anio").text(data.anio);
				$("#preciom2").text(data.precio_m2);
				$("#informacion").text(data.informacion);
				$("#tlf").text("Telefono: "+data.telefono);
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
	pisoMenu();
	$("#oculto").hide();
})


