<?php 

function genericaPisos(){
	include 'conexion.php';

	$sql = "SELECT pisos.id_piso,pisos.imagenPrincipal,pisos.precio,pisos.habitaciones,pisos.banios,pisos.m2,comunidades.nombreComunidad,ciudades.nombreCiudad,zonas.nombreZona,pisos.calle,pisos.numero,pisos.piso from pisos ,comunidades,ciudades,zonas where comunidades.idComunidades = ciudades.idComunidades and ciudades.idCiudad = zonas.idCiudad and zonas.idZona = pisos.idZona";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
	echo"<div class='col-md-6 col-lg-4 mb-4'>";
    	echo"<div class='property-entry h-100'  style='padding: 2%;'>";
		echo"<a><img src='$nfila->imagenPrincipal' id='$nfila->id_piso' alt='Image' class='img-fluid'></a>";
        echo"<h2 class='property-title' style='margin-top: 5%;'>Calle: <a href='#'>$nfila->calle</a></h2>";
        echo"<span class='property-location d-block mb-3'><span class='property-icon icon-room'></span>Comunidad: $nfila->nombreComunidad (Ciudad: $nfila->nombreCiudad)</span>";
        echo"<strong class='property-price text-primary mb-3 d-block text-success'>$nfila->precio $</strong>";
		echo"<ul class='property-specs-wrap mb-3 mb-lg-0'>";
        echo"<li>";
        echo"<span class='property-specs'>Habitaciones</span>";
        echo"<span class='property-specs-number'>$nfila->habitaciones</span>                  
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
    </div>";
	}
}

 ?>