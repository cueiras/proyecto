<?php 
ciudades();
function ciudades(){
	include 'conexion.php';
	$comunidad=$_GET['comunidad'];
	$sql = "select distinct ciudad from pisos where comunidad='$comunidad'";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		header('Content-Type: application/json');
    	echo json_encode(array("option" => "<option value='$nfila->ciudad'>$nfila->ciudad</option>"));
	}
}
?>