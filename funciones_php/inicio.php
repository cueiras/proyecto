<?php 
inicio();
function inicio(){
session_start();

$usuario=$_GET['usuario'];

if(isset($_SESSION['usuario'])){
    header('Content-Type: application/json');
  echo json_encode(array("sesion" => "si"));
}
else{

  header('Content-Type: application/json');
  echo json_encode(array("sesion" => "no"));
}



}
 ?>