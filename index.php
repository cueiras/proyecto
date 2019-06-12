<?php
   session_start();
   
   if(isset($_SESSION['usuario'])){
     if($_SESSION['usuario']=='administrador'){
       header ("Location: vistaAdmin.php");
     }
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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <div class="row mb-4" id="menuGeneral">
               <div class='col-md-6 justify-content-md-start col-xs-12 d-flex justify-content-center' id="menu1">
                  <h1 class='mb-0'><a href='index.php' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
               </div>
               <div class="col-md-6 d-flex justify-content-md-end col-xs-12 justify-content-center" id="menu2">
                  <a href='index.php' style="color:white;">Incio</a>
                  <a onclick="mover()" id="mover" style="color:white;">Casas en alquiler</a>
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
                  <select name="list-types" id="comunidad" style="width:auto;">
                     <option value="" disabled selected>Comunidades</option>
                     <?php comunidades();?>
                  </select>
               </div>
               <div class="col-lg-2 col-md-4 p-3">
                  <label for="offer-types">Ciudades</label><br/>
                  <select id="ciudad" style="width:auto;">
                     <option id="optionCiudades" value="" disabled selected>Ciudades</option>
                  </select>
               </div>
               <div class="col-lg-2 col-md-4 p-3">
                  <label>Zona</label><br/>
                  <select id="zona" style="width:auto;">
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
                        <div id="demo" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner" id="imagenes">
                           </div>
                           <a class="carousel-control-prev" href="#demo" data-slide="prev">
                           <span class="carousel-control-prev-icon"></span>
                           </a>
                           <a class="carousel-control-next" href="#demo" data-slide="next">
                           <span class="carousel-control-next-icon"></span>
                           </a>
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
                        <form action="index.php">
                           <div class='form-group'>
                              <label for='name'>Nombre</label>
                              <input type='text' id='nombre' class='form-control' maxlength='20' required>
                           </div>
                           <div class='form-group'>
                              <label for='email'>Email</label>
                              <input type='email' id='email' class='form-control'  required >
                           </div>
                           <div class='form-group'>
                              <label for='phone'>Telefono</label>
                              <input type='number' id='telefono' class='form-control' min='0' maxlength='9' pattern="/\w{9}/g" required>
                           </div>
                           <div class='form-group'>
                              <label for='phone'>Mensaje</label>
                              <textarea class="form-control" rows="3" id="pregunta" required></textarea>
                           </div>
                           <div class='form-group'>
                              <input type='submit' id='mensaje' class='btn btn-primary' value='Enviar mensaje'>
                           </div>
                           <div>
                              <p class="text-danger" id="alerta"></p>
                           </div>
                        </form>
                     </div>
                     <div class='bg-white widget border rounded'>
                        <h3 id="tlf" class='h4 text-black widget-title mb-3'></h3>
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