<?php
    session_start();
    include 'conexion.php';
    
    //MUCHO CUIDADO AL BUSCAR EL ID DE LA COMUNIDAD ZONA... YA QUE ANTES LO PASE A MINUSCULAS IGUAL NO LO ENCUENTRA LUEGO

    //primero tengo que insertar la comunidad,ciudad y zona
    $comunidad=$_POST['comunidad'];
    $esta=false;
    $idComunidad=0;
    
    //compruebo que la comunidad no esta
    $sql="select nombreComunidad from comunidades";
    $res = $conexion->query($sql);
    while($nfila = $res->fetch_object()){
        $nombre = $nfila->nombreComunidad;
        $nombre=strtolower($nombre);
        $comunidad=strtolower($comunidad);
        if($comunidad==$nombre){
            $esta=true;
        }
    }

    if($esta==false){
        $sql="select MAX(idComunidades) AS idComunidades from comunidades";
        $res = $conexion->query($sql);
            while($nfila = $res->fetch_object()){
                $idComunidad = $nfila->idComunidades;
            }
        $idComunidad++;
        $stmt = $conexion->stmt_init();
        $sql="insert into comunidades values(?,?)";
        
        if (!$stmt->prepare($sql)) die($stmt-> error);
        $stmt->bind_param("is",$idComunidad,$comunidad);
        $stmt->execute() or die ($conexion -> error);
        $stmt->close();

    }
    else{
        $sql="select idComunidades from comunidades where nombreComunidad='$comunidad'";
        $res = $conexion->query($sql);
        while($nfila = $res->fetch_object()){
            $idComunidad = $nfila->idComunidades;
        }
    }
    


    $ciudad =$_POST['ciudad'];
    $idCiudad=0;
    $esta2=false;
    
    $sql="select nombreCiudad from ciudades";
    $res = $conexion->query($sql);
    while($nfila = $res->fetch_object()){
        $nombre = $nfila->nombreCiudad;
        $nombre=strtolower($nombre);
        $ciudad=strtolower($ciudad);
        if($ciudad==$nombre){
            $esta2=true;
        }
    }
    if($esta2==false){
        $sql="select MAX(idCiudad) as idCiudades from ciudades";
        $res = $conexion->query($sql);
        while($nfila = $res->fetch_object()){
            $idCiudad = $nfila->idCiudades;
        }
        $idCiudad++;
        $stmt = $conexion->stmt_init();
        $sql="insert into ciudades values(?,?,?)";
        if (!$stmt->prepare($sql)) die($stmt-> error);
        $stmt->bind_param("iis",$idCiudades,$idComunidad,$ciudad);
        $stmt->execute() or die ($conexion -> error);
        $stmt->close();
    }
    else{
        $sql="select idCiudad from ciudades where nombreCiudad='$ciudad'";
        $res = $conexion->query($sql);
        while($nfila = $res->fetch_object()){
            $idCiudad = $nfila->idCiudad;
        }
    }
    
    
    $zona =$_POST['zona'];
    $idZona=0;
    $esta3=false;
    $sql="select nombreZona from zonas";
    $res = $conexion->query($sql);
    while($nfila = $res->fetch_object()){
        $nombre = $nfila->nombreZona;
        $nombre=strtolower($nombre);
        $zona=strtolower($zona);
        
        if($zona==$nombre){
            $esta3=true;
        }
    }
    if($esta3==false){
        $sql="select MAX(idZona) as idZona from zonas";
        $res = $conexion->query($sql);
        while($nfila = $res->fetch_object()){
            $idZona = $nfila->idZona;
        }
        $idZona++;
        
        $stmt = $conexion->stmt_init();
        $sql="insert into zonas values(?,?,?)";
        if (!$stmt->prepare($sql)) die($stmt-> error);
        $stmt->bind_param("iis",$idZona,$idCiudad,$zona);
        $stmt->execute() or die ($conexion -> error);
        $stmt->close();
    }
    else{
        $sql="select idZona from zonas where nombreZona='$zona'";
        $res = $conexion->query($sql);
        while($nfila = $res->fetch_object()){
            $idZona = $nfila->idZona;
        }
    }
    
    
    $idPiso=0;
    //obtener primero el mayor id de piso y sumarle uno para ponerselo al nuevo
    //transaciones php para ejecutar bien todos los insert 

    $sql="select MAX(id_piso) as idPiso from pisos";
    $res = $conexion->query($sql);
    while($nfila = $res->fetch_object()){
        $idPiso = $nfila->idPiso;
    }
    $idPiso++;
    $duenio = '2';//$_POST['duenio'];
    $calle = $_POST['calle'];
    $numero =    $_POST['numero'];
    $piso =           $_POST['piso'];
    $tipoCasa =     $_POST['tipoCasa'];
    $anio =         $_POST['anio'];
    $habitaciones = $_POST['habitaciones'];
    $preciom2 =     $_POST['preciom2'];
    $informacion =  $_POST['informacion'];
    $m2 =        $_POST['m2'];
    //$principal =$_POST['principal'];
    //$principal2 =$_POST['principal2'];
    //$imagenes = $_POST['imagenes']; 
    $estado= 'F';
    $precio =  $_POST['precio'];
    $banios =   $_POST['banios'];

   $nombre_img = " ";
   
    
    //HACER CON PREPARADAS MIRAR EJEMPLOS DE CLASE
    $stmt = $conexion->stmt_init();
    $sql="insert into pisos values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    if (!$stmt->prepare($sql)) die($stmt-> error);
    $stmt->bind_param("iiisisiissiiiiss", $idPiso,$duenio,$idZona,$calle,$numero,$piso,$precio,$anio,$tipoCasa,$informacion,$habitaciones,$banios,$m2,$preciom2,$nombre_img,$estado);
    $stmt->execute() or die ($conexion -> error);
    $stmt->close();
    header('Content-Type: application/json');
    echo json_encode(array("insertado" => "si"));



?>