<?php 
idPisoSesion();
function idPisoSesion(){

	$idPiso=$_GET['idPiso'];
    
	$_SESSION['idPiso']= $idPiso;

	header('Content-Type: application/json');
	
	echo json_encode(array("iniciado" => "si"));
}
?>