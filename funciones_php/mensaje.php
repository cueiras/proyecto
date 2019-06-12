<?php
	session_start();
    	include 'conexion.php';
    if(isset($_SESSION['usuario'])){
        $id=0;
		$nombre = $_GET['nombre'];
		$email = $_GET['email'];
		$telefono = $_GET['telefono'];
		$mensaje = $_GET['mensaje'];
        $piso = $_GET['piso'];
        date_default_timezone_set('Europe/Madrid');
        $hoy = date("Y-m-d");
        
        
		$stmt = $conexion->stmt_init();
        $sql="insert into mensajes values(?,?,?,?,?,?,?)";
        
        if (!$stmt->prepare($sql)) die($stmt-> error);
        $stmt->bind_param("iisisss",$id,$piso,$nombre,$telefono,$email,$mensaje,$hoy);
        $stmt->execute() or die ($conexion -> error);
        $stmt->close();

		header('Content-Type: application/json');
		echo json_encode(array("sesion" =>"si"));
	}
	else{
		header('Content-Type: application/json');
		echo json_encode(array("sesion" =>"no"));
	}








?>