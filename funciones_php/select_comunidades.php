<?php 
comunidades();
function comunidades(){
	include 'conexion.php';

	$sql = "SELECT DISTINCT comunidad from pisos";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		echo"<option value=''>$nfila->comunidad</option>";
	}
}

 ?>