<?php 
genericaPisos();
function genericaPisos(){
  include 'conexion.php';

  $comunidades = $_GET['comunidad'];
  $ciudad = $_GET['ciudad'];

  $zona = $_GET['zona'];
  if($zona==null){
     $zona='[0-9]';
  }
  


    $habitaciones = $_GET['habitaciones'];
    if($habitaciones==null){
        $habitaciones=0;
    }



    $banio = $_GET['banios'];
    if($banio==null){
      $banio=0;
    }

  $sql = "SELECT pisos.id_piso,pisos.imagenPrincipal,pisos.precio,pisos.habitaciones,pisos.banios,pisos.m2,comunidades.nombreComunidad,ciudades.nombreCiudad,pisos.calle,pisos.piso from pisos ,comunidades,ciudades,zonas where (comunidades.idComunidades = ciudades.idComunidades and ciudades.idCiudad = zonas.idCiudad and zonas.idZona = pisos.idZona) AND comunidades.idComunidades='$comunidades' and 
    ciudades.idCiudad='$ciudad' and zonas.idZona REGEXP '$zona' and pisos.habitaciones >= '$habitaciones' and pisos.banios >= '$banio' and pisos.estado='F'";
  $res = $conexion->query($sql);
  $casas = [];
  while ($nfila = $res->fetch_object()) {
    $casas[] = array("casas" => "
  <div class='col-md-6 col-lg-4 mb-4'>
      <div class='property-entry h-100'  style='padding: 2%;'>
    <a><img src='$nfila->imagenPrincipal' id='$nfila->id_piso' alt='Image' class='img-fluid'></a>
        <h2 class='property-title' style='margin-top: 5%;'>Calle: <a href='#'>$nfila->calle</a></h2>
        <span class='property-location d-block mb-3'><span class='property-icon icon-room'></span>Comunidad: $nfila->nombreComunidad (Ciudad: $nfila->nombreCiudad)</span>
        <strong class='property-price text-primary mb-3 d-block text-success'>$nfila->precio $</strong>
    <ul class='property-specs-wrap mb-3 mb-lg-0'>
        <li>
        <span class='property-specs'>Habitaciones</span>
        <span class='property-specs-number'>$nfila->habitaciones</span>                  
                  </li>
                  <li>
                    <span class='property-specs'>Baños</span>
                    <span class='property-specs-number'>$nfila->banios</span>
                  </li>
                  <li>
                    <span class='property-specs'>Metro cuadrados</span>
                    <span class='property-specs-number'>$nfila->m2</span>
                  </li>
                </ul>
          </div>
    </div>");
  }
  header('Content-Type: application/json');
  echo json_encode($casas);
}

 ?>