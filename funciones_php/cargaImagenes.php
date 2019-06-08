<?php 
cargaImagenes();
function cargaImagenes(){
	include 'conexion.php';

    $idPiso=$_GET['idPiso'];

	$sql = "select * from imagenes where idPiso='$idPiso'";
	$res = $conexion->query($sql);
    
	while ($nfila = $res->fetch_object()) {
		
    	$listado[] = array("imagen" => "$nfila->imagen");
	}
	header('Content-Type: application/json');
	echo json_encode($listado);

}
?>