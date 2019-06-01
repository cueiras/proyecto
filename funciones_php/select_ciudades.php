<?php 
ciudades();
function ciudades(){
	include 'conexion.php';
	$comunidad=$_GET['comunidad'];
	$sql = "select * from ciudades where idComunidades='$comunidad'";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		header('Content-Type: application/json');
    	echo json_encode(array("option" => "$nfila->nombreCiudad" ,"id"=>"$nfila->idCiudad"));
	}
}
?>