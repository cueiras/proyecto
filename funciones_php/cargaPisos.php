<?php 

function cargaPisos(){
	include 'conexion.php';
	$idPiso=$_SESSION['idPiso'];

	$sql = "SELECT pisos.id_piso,pisos.imagenPrincipal,pisos.precio,pisos.habitaciones,pisos.banios,pisos.m2,pisos.tipo_casa,pisos.anio,pisos.imagenes,pisos.informacion,pisos.precio_m2,comunidades.nombreComunidad,ciudades.nombreCiudad,zonas.nombreZona,zonas.calle,zonas.numero,zonas.piso from pisos ,comunidades,ciudades,zonas where  pisos.id_piso='$idPiso' and comunidades.idComunidades = ciudades.idComunidades and ciudades.idCiudad = zonas.idCiudad and zonas.idZona = pisos.idZona";
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {
	echo"<div class='site-section site-section-sm'>";
    echo"<div class='container'>";
    echo"<div class='row'>";
    echo"<div class='col-lg-8'>";
    echo"<div>";
    echo"         <div class='slide-one-item home-slider owl-carousel'>";
    echo"           <div><img src='$nfila->imagenPrincipal' alt='Image' class='img-fluid'></div>";
    echo"         </div>";
    echo"       </div>";
    echo"       <div class='bg-white property-body border-bottom border-left border-right'>";
    echo"         <div class='row mb-5'>";
    echo"           <div class='col-md-6'>";
    echo"             <strong class='text-success h1 mb-3'>$nfila->precio</strong>";
    echo"           </div>";
    echo"           <div class='col-md-6'>";
    echo"             <ul class='property-specs-wrap mb-3 mb-lg-0  float-lg-right'>";
    echo"             <li>";
    echo"               <span class='property-specs'>Habitaicones</span>";
    echo"               <span class='property-specs-number'>$nfila->habitaciones</span>";
        
    echo"             </li>";
    echo"             <li>";
    echo"               <span class='property-specs'>Baños</span>";
    echo"               <span class='property-specs-number'>$nfila->banios</span>";
     
    echo"             </li>";
    echo"             <li>";
    echo"               <span class='property-specs'>m<sup>2</sup></span>";
    echo"               <span class='property-specs-number'>$nfila->m2</span>";
   
    echo"             </li>";
    echo"           </ul>";
    echo"           </div>";
    echo"         </div>";
    echo"         <div class='row mb-5'>";
    echo"           <div class='col-md-6 col-lg-4 text-center border-bottom border-top py-3'>";
    echo"             <span class='d-inline-block text-black mb-0 caption-text'>Tipo de casa</span>";
    echo"             <strong class='d-block'>$nfila->tipo_casa</strong>";
    echo"           </div>";
    echo"           <div class='col-md-6 col-lg-4 text-center border-bottom border-top py-3'>";
    echo"             <span class='d-inline-block text-black mb-0 caption-text'>Año de construcion</span>";
    echo"             <strong class='d-block'>$nfila->anio</strong>";
    echo"           </div>";
    echo"           <div class='col-md-6 col-lg-4 text-center border-bottom border-top py-3'>";
    echo"             <span class='d-inline-block text-black mb-0 caption-text'>Precio/m<sup>2</sup></span>";
    echo"             <strong class='d-block'>$nfila->precio_m2</strong>";
    echo"           </div>";
    echo"         </div>";
    echo"         <h2 class='h4 text-black'>Informacion sobre la vivienda</h2>";
    echo"         <p>$nfila->informacion</p>";
    echo"       </div>";
    echo"     </div>";
    echo"     <div class='col-lg-4'>";
    echo"        <div class='bg-white widget border rounded'>";
    echo"          <h3 class='h4 text-black widget-title mb-3'>Contact Agent</h3>";
    echo"          <form action='' class='form-contact-agent'>";
    echo"            <div class='form-group'>";
    echo"              <label for='name'>Name</label>";
    echo"              <input type='text' id='name' class='form-control'>";
    echo"            </div>";
    echo"            <div class='form-group'>";
    echo"              <label for='email'>Email</label>";
    echo"              <input type='email' id='email' class='form-control'>";
    echo"            </div>";
    echo"            <div class='form-group'>";
    echo"              <label for='phone'>Phone</label>";
    echo"              <input type='text' id='phone' class='form-control'>";
    echo"            </div>";
    echo"            <div class='form-group'>";
    echo"              <input type='submit' id='phone' class='btn btn-primary' value='Send Message'>";
    echo"            </div>";
    echo"          </form>";
    echo"        </div>";
    echo"        <div class='bg-white widget border rounded'>";
    echo"          <h3 class='h4 text-black widget-title mb-3'>Paragraph</h3>";
    echo"          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam,saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>";
    echo"        </div>";
    echo"      </div>";

    echo"    </div>";
    echo"  </div>";
    echo"</div>";
	}
}
?>