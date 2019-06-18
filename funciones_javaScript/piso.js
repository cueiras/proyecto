var idPiso=0;
function direcionar(){
	$(document).on("click",".img-fluid",function(){

		idPiso = $(this).attr("id");
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
				$("#menuPrincipal").attr("style","background-color:rgba(44, 44, 44, 1);");
				$("#calle").text("Calle: "+data.calle+": Nº"+data.numero+" "+data.piso+"/"+data.nombreZona+", "+data.nombreCiudad);
				$("#precio").text(data.precio);
				$("#banios").text(data.banios);
				$("#tipoCasa").text(data.tipo_casa);
				$("#anio").text(data.anio);
				$("#preciom2").text(data.precio_m2);
				$("#informacion").text(data.informacion);
				$("#tlf").text("Telefono: "+data.telefono);
				$("#principal").attr("src",""+data.imagenPrincipal+"");
				$("#m2").text(data.m2);
				$("#habitacion").text(data.habitaciones);
				$.get("./funciones_php/sesion.php",function(data,estado){
					if(estado=='success'){
						if(data.sesion =='si'){
							$("#nombreOcultar").hide();
							$("#emailOcultar").hide();
						}
					}
				})
				$("#oculto").show();
				$("#mover").html("Datos de la vivienda");
				
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
				$("#menuPrincipal").attr("style","background-color: rgba(44, 44, 44, 1);");
				$("#calle").text("Calle: "+data.calle+": Nº"+data.numero+" "+data.piso+"/"+data.nombreZona+", "+data.nombreCiudad);
				$("#precio").text(data.precio);
				$("#banios").text(data.banios);
				$("#tipoCasa").text(data.tipo_casa);
				$("#anio").text(data.anio);
				$("#preciom2").text(data.precio_m2);
				$("#informacion").text(data.informacion);
				$("#tlf").text("Teléfono: "+data.telefono);
				$("#principal").attr("src",""+data.imagenPrincipal+"");
				$("#m2").text(data.m2);
				$("#habitacion").text(data.habitaciones);
				$("#oculto").show();

				window.scrollTo(0,0);
					
			}
		})
	})
}
function mensaje(){
    $("#mensaje").click(function(){
        event.preventDefault();
        $.get("./funciones_php/sesion.php",function(data,estado){
			if(estado=='success'){
				if(data.sesion =='si'){
					var piso = idPiso;
					var telefono = $("#telefono").val();
        			var mensaje = $("#pregunta").val();
        			var expreg = new RegExp(/\w{9}/g);
        			if(expreg.test(telefono)){
        				$.get("./funciones_php/mensaje.php",{'nombre' : nombre,'email' : email,'telefono' : telefono,'mensaje' : mensaje,'piso' : piso},function(data,estado){
            				if(estado == 'success'){
                				if(data.sesion == 'si'){
                    				$("#alerta").html("");
                    				alert("Su mensaje se ha enviado correctamente");
                				}else{
                    				$("#alerta").html("ha ocurrido un error al enviar su mensaje");
               	 				}
            				}
       					})
        			}else{
        				$("#alerta").text("Debes introducir un telefono valido");
        			}
				}
			}
		})
        var piso = idPiso;
        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var telefono = $("#telefono").val();
        var mensaje = $("#pregunta").val();
        var expreg = new RegExp(/\w{9}/g);
        var expreg2= new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/);
        if(expreg.test(telefono)&&expreg2.test(email)){
            if(nombre == ''||email == ''||telefono == ''||mensaje == ''){
                $("#alerta").text("Debes rellenar todos los campos");
            }else{
            
            
            $.get("./funciones_php/mensaje.php",{'nombre' : nombre,'email' : email,'telefono' : telefono,'mensaje' : mensaje,'piso' : piso},function(data,estado){
            if(estado == 'success'){
                
                if(data.sesion == 'si'){
                    $("#alerta").html("");
                    alert("Su mensaje se ha enviado correctamente");
                }
                else{
                    $("#alerta").text("Debes iniciar sesion para poder enviar un mensaje");
                }
            }
        })
        }
        }else{
            $("#alerta").html("El formato del telefono o el email no es correcto");
        }

        
    })
}
function mover(){
    $("#mover").click(function(){
        window.scrollTo(0,560);
    })
}

$(document).ready(function() {
	direcionar();
	pisoMenu();
    mensaje();
    mover();
	$("#oculto").hide();
})


