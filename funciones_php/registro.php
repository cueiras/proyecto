<?php 
registro();
function registro(){
	include 'conexion.php';
$usuario=$_GET['usuario'];
$contraseña=$_GET['contraseña'];
$correo=$_GET['correo'];

$sql = "select usuario from usuarios where usuario='$usuario'";
	
	$res = $conexion->query($sql);
	$row = $res->fetch_object();
	if($row==null){
		$idUsuario=0;
		$pas_cifrado=password_hash($contraseña, PASSWORD_DEFAULT);

		$stmt = $conexion->stmt_init();

		$sql = "INSERT INTO usuarios (idUsuario,usuario,contraseña,email) VALUES (?,?,?,?)";

		if (!$stmt->prepare($sql)) die($stmt-> error);


		$stmt->bind_param("isss",$idUsuario,$usuario,$pas_cifrado,$correo);
    
    	$stmt->execute() or die ($conexion -> error);

    	$stmt->close();
		
		header('Content-Type: application/json');
    	echo json_encode(array("disponible" => "si"));
    	
	}else{
		header('Content-Type: application/json');
		echo json_encode(array("disponible" => "no"));
		
	}
}
 ?>