<?php

function insertar($nombre){
	 
	include 'conexion.php';
	$idPiso=0;
	$idImagen=0;
	    $sql="select MAX(id_Piso) as idPiso from pisos";
        $res = $conexion->query($sql);
        while($nfila = $res->fetch_object()){
            $idPiso = $nfila->idPiso;
        }
        
    	$stmt = $conexion->stmt_init();

        $sql = "update pisos set imagenPrincipal=? where id_Piso=?";

		if (!$stmt->prepare($sql)) die($stmt-> error);


		$stmt->bind_param("si",$nombre,$idPiso);
    
   		$stmt->execute() or die ($conexion -> error);

    	$stmt->close();

    	$stmt = $conexion->stmt_init();

        $sql = "insert into imagenes values(?,?,?)";

		if (!$stmt->prepare($sql)) die($stmt-> error);


		$stmt->bind_param("iis",$idImagen,$idPiso,$nombre);
    
   		$stmt->execute() or die ($conexion -> error);

    	$stmt->close();
}
?>