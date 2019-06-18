<?php

include 'conexion.php';

$sql = 'SELECT mensajes.usuario,mensajes.fecha,mensajes.idMensaje,mensajes.telefono,mensajes.email,mensajes.mensaje,mensajes.fecha,pisos.calle,pisos.piso,pisos.numero,zonas.nombreZona,ciudades.nombreCiudad from mensajes,pisos,zonas,ciudades where mensajes.idPiso = pisos.id_piso and pisos.idZona = zonas.idZona and zonas.idCiudad = ciudades.idCiudad ORDER BY mensajes.fecha ASC;';
$res = $conexion->query($sql);
$mensajes = [];
while ($nfila = $res->fetch_object()) {
  $mensajes[] = array("mensaje" => "
  <div class='container'>
    <div class='row'>
      <div class='col-6 p-3'>
        <h3 class='mensaje' id='$nfila->idMensaje'>Datos de usuario:</h3>
        <ul class='list-group'>
            <li class='list-group-item active'>Usuario: $nfila->usuario</li>
            <li class='list-group-item'>Fecha del mesnsaje: $nfila->fecha</li>
            <li class='list-group-item'>Telefono: $nfila->telefono</li>
            <li class='list-group-item'>Email: $nfila->email</li>
        </ul>
      </div>
      <div class='col-6'>
          <div class='list-group p-3 mt-4'>
          
                <div class='d-flex w-100 justify-content-between'>
                <h5 class='mb-1'>$nfila->nombreCiudad / $nfila->nombreZona / $nfila->calle  N:$nfila->numero $nfila->piso</h5>
                </div>
                <p class='mb-1'>Mensaje: $nfila->mensaje</p>

          </div>
      </div>
      <div class='col-12 d-flex justify-content-end'>
        <input type='submit' id='eliminar'  class='btn btn-danger' value='Eliminar mensaje'>
      </div>
    </div>
  </div>");
}
header('Content-Type: application/json');
echo json_encode($mensajes);
	



?>