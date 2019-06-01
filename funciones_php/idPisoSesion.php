<?php 
idPisoSesion();
function idPisoSesion(){

	$idPiso=$_GET['idPiso'];
	$_SESSION['idPiso']= $idPiso;

}
?>