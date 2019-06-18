<?php 
	session_start();
    	include 'conexion.php';
   if(isset($_SESSION['usuario'])){

	header('Content-Type: application/json');
	echo json_encode(array("sesion" =>"si"));
}
else{
	header('Content-Type: application/json');
	echo json_encode(array("sesion" =>"no"));
}


 ?>