<?php 

function comunidades(){
	include 'conexion.php';

	$sql = "SELECT * from comunidades";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
		echo"<option value='$nfila->idComunidades'>$nfila->nombreComunidad</option>";
	}
}

 ?>