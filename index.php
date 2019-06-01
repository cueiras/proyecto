<!DOCTYPE html>
<html>
<head>
	<title></title>  
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


</head>
<body>
<div <?php fondo(); ?> class='navbar'>
  <div class="container">
  <div class="row d-flex">
    <div class='col-4' id="menu1">
      <h1 class='mb-0'><a href='index.html' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
    </div>
    <div class="col-8" id="menu2">
      <a href='index.html' style="color:white;">Incio</a>
      <a href='buy.html' style="color:white;">Casas en alquiler</a>
      <a href='rent.html' style="color:white;">Preguntas frecuentes</a>                     
      <a href='properties.html' style="color:white;">Conocenos</a> 
      <a href='contact.html' style="color:white;">Contacto</a>
    </div>
  </div>
  <div class="row ">
    <div class='col-12 d-flex align-items-center' id="carrousel">
      <?php 
        generar_menu();
      ?>
    </div>
  </div>
  </div>
</div>
	<div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-2">
            <label>Comunidades</label>
                <select name="list-types" id="comunidad">
                  <option value="" disabled selected>Comunidades</option>
					           <?php comunidades();?>
                </select>
          </div>

          <div class="col-2">
            <label for="offer-types">Ciudades</label><br/>
                <select id="ciudad">
                  <option id="optionCiudades" value="" disabled selected>Ciudades</option>
                </select>
          </div>
          <div class="col-2">
            <label>Zona</label><br/>
                <select id="zona">
                  <option id="optionZonas" value="" disabled selected>Zonas</option>
                </select>
          </div>
          <div class="col-2">
            <label>Habitaciones</label>
                <select id="habitaciones">
                  <option id="option1" value="" disabled selected>Habitaciones</option>
                  <option value="1">1 o mas</option>
                  <option value="2">2 o mas</option>
                  <option value="3">3 o mas</option>
                  <option value="4">4 o mas</option>
                </select>
          </div>
          <div class="col-2">
            <label>Baños</label><br/>
                <select id="baños">
                  <option id="option1" value="" disabled selected>Baños</option>
                  <option value="1">1 o mas</option>
                  <option value="2">2 o mas</option>
                  <option value="3">3 o mas</option>
                </select>
          </div>

          <div class="col-2">
            <input id="buscar" type="button" class="btn btn-success text-white" value="Buscar">
          </div>

        </div>  
      </div>
    </div>
    <div class="site-section site-section-sm bg-light" id="pisos">
		<div class='container'>
   		<div class='row mb-5' id="pisosMuestra">
		<?php 
			if(!isset($_POST['buscar'])){
				genericaPisos();
			}	
		?>
		</div>
		</div>
    </div>


</body>

</html>