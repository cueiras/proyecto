<?php 
generar_menu();
function generar_menu(){

	include 'conexion.php';
	include 'idpisos_aleatorio.php';
	$numero=0;
	id_pisos($numero);
	

	$sql = "select calle,numero,precio,imagenPrincipal from pisos where id_piso='$numero'";
	
	$res = $conexion->query($sql);

	while ($nfila = $res->fetch_object()) {

			echo"<div class='slide-one-item home-slider owl-carousel'>";
    		echo"<div class='site-blocks-cover overlay' data-aos='fade' data-stellar-background-ratio='0.5'>";
    		echo"<div class='container'>";
    		echo"<div class='row align-items-center justify-content-center text-center'>";
    		echo"<div class='col-md-10'>";
    		echo"<span class='d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded'>Alquiler</span>";
   			echo"<h1 class='mb-2'>Calle:$nfila->calle Numero: $nfila->numero</h1>";
			echo"<p class='mb-5'><strong class='h2 text-success font-weight-bold'>Precio:$nfila->precio</strong></p>";
   	
			echo"<p><a href='#' class='btn  py-3 px-5 rounded-0 btn-2'>Mas detalles</a></p>
            </div>
          </div>
        </div>
      </div> ";
	echo"</div>";

echo"</div>";

	}



}

?>
