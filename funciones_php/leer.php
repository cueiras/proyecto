<?php

include 'conexion.php';

$sql = "SELECT mensajes.fecha,mensajes.idMensaje,mensajes.telefono,mensajes.email,mensajes.mensaje,mensajes.fecha,pisos.calle,pisos.piso,pisos.numero,zonas.nombreZona,ciudades.nombreCiudad from mensajes,pisos,zonas,ciudades where mensajes.idPiso = pisos.id_piso and pisos.idZona = zonas.idZona and zonas.idCiudad = ciudades.idCiudad ORDER BY mensajes.fecha ASC;";
$res = $conexion->query($sql);
$mensajes = [];
while ($nfila = $res->fetch_object()) {
  $mensajes[] = array("mensaje" => "
<div class='form-group mt-4'>
  <label for='comunidad'>Piso</label>
  <input type='text' id='$nfila->idMensaje' class='form-control' readonly placeholder='$nfila->nombreCiudad/$nfila->nombreZona, $nfila->calle,$nfila->numero,$nfila->piso'>
</div>
<div class='form-group'>
  <label for='comunidad'>Fecha del mensaje</label>
  <input type='text' id='nombre' class='form-control' readonly placeholder='$nfila->fecha'>
</div>
<div class='form-group'>
  <label for='ciudad'>Email</label>
  <input type='text' id='email' class='form-control' readonly placeholder='$nfila->email'>
</div>
<div class='form-group'>
  <label for='ciudad'>Teléfono</label>
  <input type='text' id='telefono' class='form-control' readonly placeholder='$nfila->telefono'>
</div>

<div class='form-group'>
  <label for='informacion'>Mensaje</label>
  <textarea class='form-control' rows='3' id='mensaje' readonly>$nfila->mensaje</textarea>
</div>
<div class='form-group'>
  <input type='submit' id='eliminar'  class='btn btn-danger' value='Eliminar mensaje'>
</div>");
}
header('Content-Type: application/json');
echo json_encode($mensajes);
	



?>