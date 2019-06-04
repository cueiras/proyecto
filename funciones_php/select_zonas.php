<?php 
zonas();
function zonas(){
	include 'conexion.php';
	$ciudad=$_GET['ciudad'];
	$sql = "select * from zonas where idCiudad='$ciudad'";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		header('Content-Type: application/json');
    	$listado[] = array("option" => "$nfila->nombreZona" ,"id"=>"$nfila->idZona");
	}
	header('Content-Type: application/json');
	echo json_encode($listado);
}
?>