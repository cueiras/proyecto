<?php
session_start();

if(isset($_SESSION['usuario'])){
  echo $_SESSION['usuario'];
}
else{
  //header("location:inicio_sesion.php");

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ALQUILEA</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/miStyle.css">
    <link rel="stylesheet" href="css/style.css">
    
  
    <?php include './funciones_php/generar_menu.php';
    	  
    	  include './funciones_php/select_comunidades.php';
    	  include './funciones_php/consultaGenericaPisos.php';
    ?>
	

    <script src="./funciones_javaScript/jquery-3.3.1.js"></script>
    <script src="./funciones_javaScript/buscar.js"></script>
    <script src="./funciones_javaScript/piso.js"></script>
    <script src="./funciones_javaScript/inicio.js"></script>
  
</head>
<body>
   <div style="<?php fondo();?>" id="menuPrincipal">
      <div class="container">
         <div class="row d-flex d-flex align-items-right mb-4">
            <div class='col-4' id="menu1">
               <h1 class='mb-0'><a href='index.php' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
            </div>
            <div class="col-8" id="menu2">
               <a href='index.php' style="color:white;">Incio</a>
               <a href='buy.html' style="color:white;">Casas en alquiler</a>
               <a onclick="salida()" id="salida" style="color:white;">Desconectarse</a>
               <a href='inicio_sesion.php' style="color:white;">Iniciar Sesion</a>

            </div>
         </div>
         <div class="row d-flex align-items-center" id="anuncioMenu">
            <div class='col-12' id="carrousel">
               <?php 
                  generar_menu();
                  ?>
            </div>
         </div>
      </div>
   </div>
   <div class="site-section site-section-sm pb-0" id="selects">
      <div class="container">
         <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-4 p-4">
               <label>Comunidades</label><br/>
               <select name="list-types" id="comunidad">
                  <option value="" disabled selected>Comunidades</option>
                  <?php comunidades();?>
               </select>
            </div>
            <div class="col-lg-2 col-md-4 p-3">
               <label for="offer-types">Ciudades</label><br/>
               <select id="ciudad">
                  <option id="optionCiudades" value="" disabled selected>Ciudades</option>
               </select>
            </div>
            <div class="col-lg-2 col-md-4 p-3">
               <label>Zona</label><br/>
               <select id="zona">
                  <option id="optionZonas" value="" disabled selected>Zonas</option>
               </select>
            </div>
            <div class="col-lg-2 col-md-4 p-3">
               <label>Habitaciones</label><br/>
               <select id="habitaciones">
                  <option id="option1" value="" disabled selected>Habitaciones</option>
                  <option value="1">1 o mas</option>
                  <option value="2">2 o mas</option>
                  <option value="3">3 o mas</option>
                  <option value="4">4 o mas</option>
               </select>
            </div>
            <div class="col-lg-2 col-md-4 p-3">
               <label>Baños</label><br/>
               <select id="baños">
                  <option id="option1" value="" disabled selected>Baños</option>
                  <option value="1">1 o mas</option>
                  <option value="2">2 o mas</option>
                  <option value="3">3 o mas</option>
               </select>
            </div>
            <div class="col-lg-2 col-md-4 p-4" id="busqueda">
               <input id="buscar" type="button" class="btn btn-success text-white" value="Buscar">
            </div>
            <div class="col-12 mt-4 d-flex align-items-center">
                <p id="error" class="text-danger"></p>
            </div>
         </div>
      </div>
   </div>
   <div class="site-section site-section-sm bg-light" id="pisos">
      <div class='container'>
         <div class='row mb-5' id="pisosMuestra">
            <?php 
               
                genericaPisos();
               
               ?>
         </div>
      </div>
   </div>
   <div id="oculto">
      <div class='site-section site-section-sm' id='piso'>
         <div class='container'>
            <div class='row'>
               <div class='col-lg-8'>
                  <div>
                     <h2 class='pb-2' id="calle"></h2>
                     <div class='slide-one-item home-slider owl-carousel'>
                        <div><img id="principal" src='$nfila->imagenPrincipal' alt='Image' class='img-fluid'></div>
                     </div>
                  </div>
                  <div class='bg-white property-body border-bottom border-left border-right'>
                     <div class='row mb-5'>
                        <div class='col-md-6'>
                           <h2>Precio</h2>
                           <strong id="precio" class='text-success h1 mb-3'></strong>
                        </div>
                        <div class='col-md-6'>
                           <ul class='property-specs-wrap mb-3 mb-lg-0  float-lg-right'>
                              <li>
                                 <span class='property-specs'>Habitaciones</span>
                                 <span id='habitacion' class='property-specs-number'></span>
                              </li>
                              <li>
                                 <span class='property-specs'>Baños</span>
                                 <span id="banios" class='property-specs-number'></span>
                              </li>
                              <li>
                                 <span class='property-specs'>m<sup>2</sup></span>
                                 <span id="m2" class='property-specs-number'></span>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class='row mb-5'>
                        <div class='col-md-6 col-lg-4 text-center border-bottom border-top py-3'>
                           <span class='d-inline-block text-black mb-0 caption-text'>Tipo de casa</span>
                           <strong id="tipoCasa" class='d-block'></strong>
                        </div>
                        <div class='col-md-6 col-lg-4 text-center border-bottom border-top py-3'>
                           <span class='d-inline-block text-black mb-0 caption-text'>Año de construcion</span>
                           <strong id="anio" class='d-block'></strong>
                        </div>
                        <div class='col-md-6 col-lg-4 text-center border-bottom border-top py-3'>
                           <span class='d-inline-block text-black mb-0 caption-text'>Precio/m<sup>2</sup></span>
                           <strong id="preciom2" class='d-block'></strong>
                        </div>
                     </div>
                     <h2 class='h4 text-black'>Informacion sobre la vivienda</h2>
                     <p id="informacion"></p>
                  </div>
               </div>
               <div class='col-lg-4'>
                  <div class='bg-white widget border rounded'>
                     <h3 class='h4 text-black widget-title mb-3'>Contacto</h3>
                     <div class='form-group'>
                        <label for='name'>Nombre</label>
                        <input type='text' id='name' class='form-control'>
                     </div>
                     <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='email' id='email' class='form-control'>
                     </div>
                     <div class='form-group'>
                        <label for='phone'>Telefono</label>
                        <input type='text' id='phone' class='form-control'>
                     </div>
                     <div class='form-group'>
                        <input type='submit' id='phone' class='btn btn-primary' value='Enviar mensaje'>
                     </div>
                  </div>
                  <div class='bg-white widget border rounded'>
                     <h3 id="tlf" class='h4 text-black widget-title mb-3'>TLF:$nfila->telefono</h3>
                     <p>Horario de visita de pisos de 8 a 6:30</p>
                     <p>De Lunes a Viernes</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</body>

</html>