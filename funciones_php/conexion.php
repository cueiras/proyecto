<?php
//Creacion del objeto mysqli

$conexion = new mysqli("localhost", "root", "", "alquilea");
mysqli_set_charset($conexion,"utf8");
if($conexion -> connect_errno){
die("Conexion con la base de datos erronea: ".$conexion->connect_error);
}




?>