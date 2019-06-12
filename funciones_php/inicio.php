<?php 
inicio();
function inicio(){
session_start();

header('Content-Type: application/json');

if(isset($_SESSION['usuario'])){
   
  echo json_encode(array("sesion" => "si"));
}
else{


  echo json_encode(array("sesion" => "no"));
}



}
 ?>