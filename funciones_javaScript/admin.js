function insert() {
	$("#insertar").click(function () {
		$("#selects").hide();
		$("#pisos").hide();
		$("#oculto").show();

	})
	$("#enviar").click(function () {
		event.preventDefault();

		var duenio = $("#duenios").val();
		var comunidad = $("#comunidad1").val();
		var ciudad = $("#ciudad1").val();
		var zona = $("#zona1").val();
		console.log(comunidad);
		console.log(ciudad);
		console.log(zona);
		var calle = $("#calle").val();
		var numero = $("#numero").val();
		var piso = $("#piso").val();
		var tipoCasa = $("#tipoCasa").val();
		var anio = $("#anio").val();
		var habitaciones = $("#habitaciones").val();
		var banios = $("#banios").val();
		var preciom2 = $("#preciom2").val();
		var informacion = $("#informacion").val();
		var m2 = $("#m2").val();
		//var principal = document.getElementById('principal').files[0].name;
		//var principal2 = $("#principal").val();
		//var imagenes = $("#imagenes").val();
		var precio = $("#precio").val();
		console.log(principal);
		$.post("./funciones_php/insertar.php", {
			'comunidad': comunidad,
			'ciudad': ciudad,
			'zona': zona,
			'calle': calle,
			'numero': numero,
			'piso': piso,
			'tipoCasa': tipoCasa,
			'anio': anio,
			'habitaciones': habitaciones,
			'preciom2': preciom2,
			'informacion': informacion,
			'duenio': duenio,
			'm2': m2,
			'precio': precio,
			'banios': banios
		}, function (data, estado) {
			if (estado == 'success') {
				if (data.insertado == 'si') {
					window.alert("Piso insertado falta subir la imagen princiapal");
					$("#formulario").hide();
					$("#imagen").show();
				}

			}
		})

	})

}

function inserBorrar() {
	$("#inserBorrar").click(function () {
		$("#insert").show();
	})
}

function duenios() {

	$.get("./funciones_php/cargarDuenios.php", function (data, estado) {
		if (estado == 'success') {
			for (var i = 0; i < data.length; i++) {
				$("#duenios").append("<option value=" + data[i].id + ">" + data[i].option + "</option>");
			}
		}

	})
}

function informacion() {
	$.get("./funciones_php/leer.php", function (data, estado) {
		if (estado == 'success') {
			for (var i = 0; i < data.length; i++) {
				$("#formulario").append(data[i].mensaje);
			}
		}
	})
}

function eliminar() {
	$(document).on("click", "#eliminar", function () {
		var idMensaje = $(".mensaje").attr("id");

		$.get("./funciones_php/eliminar.php", {
			'idMensaje': idMensaje
		}, function (data, estado) {
			if (estado == 'success') {
				window.alert("El mensaje se ha eliminado con exito");
				location.reload();
			}
		})
	})
}

$(document).ready(function () {
	duenios();
	insert();
	inserBorrar();
	eliminar();
	informacion();

	$("#oculto").hide();
	$("#imagen").hide();

});