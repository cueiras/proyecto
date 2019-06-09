<?php
duenios();
function duenios(){
	include 'conexion.php';

	$sql = "select * from dueños";
	$res = $conexion->query($sql);
	while ($nfila = $res->fetch_object()) {
	
    	$listado[] = array("option" => "$nfila->nombre" ,"id"=>"$nfila->id_dueño");
	}
	header('Content-Type: application/json');
	echo json_encode($listado);
}



?>