<?php
   include 'conexion.php';

    $idMensaje = $_GET['idMensaje'];

    $stmt = $conexion->stmt_init();
    $sql="delete from mensajes where idMensaje=?";
  
    if (!$stmt->prepare($sql)) die($stmt-> error);
    $stmt->bind_param("i",$idMensaje);
    $stmt->execute() or die ($conexion -> error);
    $stmt->close();


?>