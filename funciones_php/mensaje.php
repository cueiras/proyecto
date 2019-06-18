<?php
	session_start();
    	include 'conexion.php';
    	$nombre='';
    	$email='';

    if(isset($_SESSION['usuario'])){
    	$usuario = $_SESSION['usuario'];
    	$sql = "select * from usuarios where usuario='$usuario'";
	$res = $conexion->query($sql);
    
	$nfila = $res->fetch_object();
	$nombre = $nfila->usuario;
	$email=$nfila->email;
    }else{
    	$nombre = $_GET['nombre'];
		$email = $_GET['email'];	
    }
        $id=0;
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
	
	








?>