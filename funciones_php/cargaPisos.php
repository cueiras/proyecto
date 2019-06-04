<?php 
cargaPisos();
function cargaPisos(){
	include 'conexion.php';

    $idPiso=$_GET['idPiso'];

	$sql = "SELECT pisos.id_piso,pisos.imagenPrincipal,pisos.precio,pisos.habitaciones,pisos.banios,
        pisos.m2,pisos.tipo_casa,pisos.anio,pisos.imagenes,pisos.informacion,pisos.precio_m2,
        comunidades.nombreComunidad,ciudades.nombreCiudad,zonas.nombreZona,zonas.calle,zonas.numero,zonas.piso,dueños.telefono from pisos ,comunidades,ciudades,zonas,dueños where  pisos.id_piso='$idPiso' and comunidades.idComunidades = ciudades.idComunidades and ciudades.idCiudad = zonas.idCiudad and zonas.idZona = pisos.idZona and pisos.id_dueño=dueños.id_dueño";
	$res = $conexion->query($sql);
    
	$nfila = $res->fetch_object();
    header('Content-Type: application/json');
    echo json_encode(array("calle" => "$nfila->calle","imagenPrincipal"=>"$nfila->imagenPrincipal",
    "precio" => "$nfila->precio","habitaciones" => "$nfila->habitaciones","banios" => "$nfila->banios",
    "m2" => "$nfila->m2","tipo_casa" => "$nfila->tipo_casa","anio" => "$nfila->anio",
    "imagenes" => "$nfila->imagenes","informacion" => "$nfila->informacion","precio_m2" => "$nfila->precio_m2",
    "nombreComunidad" => "$nfila->nombreComunidad","nombreCiudad" => "$nfila->nombreCiudad",
    "nombreZona" => "$nfila->nombreZona","numero" => "$nfila->numero","piso" => "$nfila->piso",
    "telefono" => "$nfila->telefono"));

}
?>