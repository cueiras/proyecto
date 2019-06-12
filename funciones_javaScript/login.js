/*funcion para el inicio de sesion*/
function log() {
	event.preventDefault();
	console.log("pase1");
	var usuario = $("#usuario").val();
	var contraseña = $("#contraseña").val();
	console.log("pase2");

	$.get("./funciones_php/login.php", {
		'usuario': usuario,
		'contraseña': contraseña
	}, function (data, estado) {

		if (estado === 'success') {
			console.log("3");
			console.log(data);
			if (data.correcto == "si") {
				$(location).attr("href", "index.php");
				$("#alertas").html("");
				console.log(data.correcto);

			} else {
				$("#alertas").html("<p>Su usuario o contraseña esta mal por favor vuelva a introducirlos</p>")
				console.log(data.correcto);

			}

		}
	})


}

/*funcion para validar el registro de la pagina*/
function registro() {
	event.preventDefault();
	var usuario = $("#usuario1").val();
	var contraseña1 = $("#contraseña1").val();
	var contraseña2 = $("#contraseña2").val();
	var correo = $("#correo").val();
	console.log(contraseña1, contraseña2, usuario, correo);


	var expreg = new RegExp(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/g);

	var expreg2 = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/);


	if (expreg.test(contraseña1)) {

		$("#alertas2").html();
		console.log("la contraseña bien");
		if (contraseña1 === contraseña2) {
			
			if (expreg2.test(correo)) {
				$.get("./funciones_php/registro.php", {
					'usuario': usuario,
					'contraseña': contraseña1,
					'correo': correo
				}, function (data, estado) {
					if (estado == 'success') {
						if (data.disponible == 'si') {
							console.log("todo correcto");
							$(location).attr("href", "inicio_sesion.php");
						} else {
							$("#alertas2").html("<p>Ese usuairo ya existe</p>");
							$("#usuario1").html(" ");
							$("#usuario1").focus();
							console.log(data.disponible);
							console.log(data);
	
	
						}
					}
				});
	
	
			} else {
				$("#alertas2").html(" ");
				$("#correo").focus();
				$("#alertas2").html("<p>El correo introducido no es valido</p>");
	
	
			}
		} else {
			$("#alertas2").html(" ");
			$("#alertas2").html("<p>Las contraseñas no coinciden vuelva a escribirlas</p>");
			$("#contraseña1").html(" ");
			$("#contraseña2").html(" ");
			$("#contraseña1").focus();

		}

	} else {
		$("#alertas2").html(" ");
		$("#contraseña1").focus();
		$("#alertas2").append("La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula NO puede tener otros símbolos");


	}


}