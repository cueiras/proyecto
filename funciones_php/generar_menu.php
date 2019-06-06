<?php 
	
	include 'idpisos_aleatorio.php';

	$numero=0;
	id_pisos($numero);
	$_SESSION['numero']=$numero;
	
	
function fondo(){
	include 'conexion.php';
	$numero=$_SESSION['numero'];

	$sql = "select imagenPrincipal from pisos where id_piso='$numero'";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		echo"background-image: url($nfila->imagenPrincipal);background-repeat: no-repeat;";
	}
}

function generar_menu(){
	include 'conexion.php';
	$numero=$_SESSION['numero'];

	$sql = "select pisos.id_piso ,ciudades.nombreCiudad,zonas.nombreZona,pisos.precio,pisos.imagenPrincipal from pisos,ciudades,zonas where id_piso='$numero' and ciudades.idCiudad = zonas.idCiudad and zonas.idZona = pisos.idZona";
	
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {

			echo"<div class='slide-one-item home-slider owl-carousel'>";
    		echo"<div class='container'>";
    		echo"<div class='row align-items-center justify-content-center text-center'>";
    		echo"<div class='col-md-10 pt-3'style='background-color: rgba(0,0,0,0.2);'>";
    		echo"<span class='d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded'>Alquiler</span>";
   			echo"<h1 class='mb-2' style='color:white'>Ciudad:$nfila->nombreCiudad Zona: $nfila->nombreZona</h1>";
			echo"<p class='mb-5'><strong class='h2 text-success font-weight-bold'>Precio:$nfila->precio</strong></p>";
   	
			echo"<a id='$nfila->id_piso' class='btn py-3 px-5 rounded-0 btn-2 buscar2' style='color:white'><p>Mas detalles</a>
            </div>
          </div>
        </div>";
	echo"</div>";

echo"</div>";

	}



}

?>
