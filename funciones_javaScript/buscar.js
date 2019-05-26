 function buscar(){
    $("#buscar").click(function(){

    })

 }

function cargarCiudades(){
 	$("#comunidad").change(function(){
        var comunidad=$("#comunidad").val();
        console.log(comunidad);
        $.get("./funciones_php/select_ciudades.php",{'comunidad' : comunidad},function(data,estado){
            console.log("2");
            if(estado === 'success'){
                console.log("dentro");
                console.log(data)
                $("#optionCiudades").after(data.option);
            }
            console.log("3");
        })

        console.log("4");
 	})
}

$(document).ready(function() {
    buscar();
    cargarCiudades();
})
    			

