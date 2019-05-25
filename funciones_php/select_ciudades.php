<?php 
function ciudades(){
	include 'conexion.php';
	$comunidad=$_GET['comunidad'];
	$sql = "SELECT DISTINCT ciudad from pisos where comunidad='$comunidad'";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		echo"<option value='$nfila->ciudad'>$nfila->ciudad</option>";
	}
}

 ?>