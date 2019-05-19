<?php 

function ciudades(){
	include 'conexion.php';

	$sql = "SELECT DISTINCT ciudad from pisos";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		echo"<option value='$nfila->ciudad'>$nfila->ciudad</option>";
	}
}

 ?>