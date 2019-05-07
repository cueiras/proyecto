<?php 
login();
function login(){
	include 'conexion.php';

$usuario=$_GET['usuario'];
$contraseña=$_GET['contraseña'];


	$sql = "select usuario,contraseña from usuarios where usuario='$usuario'";
	
	$res = $conexion->query($sql);
	$row = $res->fetch_object();
	

      if (!$row==null){
      	$clave = $row->contraseña;
      	if( password_verify ($contraseña, $clave)){
      	      //$_SESSION["usuario"] = $usuario;
            header('Content-Type: application/json');
    		echo json_encode(array("correcto" => "si"));
        }

      }else{
        	header('Content-Type: application/json');
			echo json_encode(array("correcto" => "no"));
      }

}
 ?>