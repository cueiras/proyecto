<?php 
function id_pisos(&$valor) {
	include 'conexion.php';

	$sql = "SELECT id_piso FROM pisos";
	
	$res = $conexion->query($sql);
	$numero=-1;
	while ($nfila = $res->fetch_object()) {
		$a=($nfila->id_piso);
		

	 	if($a>$numero){
	 		
	 		$valor=$a;
	 		$numero=$a;
	 	}
	}
	$valor=rand(1,$valor);
	
}
?>