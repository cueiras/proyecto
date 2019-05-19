<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    
  
    <?php include './funciones_php/generar_menu.php';
    	  include './funciones_php/select_ciudades.php';
    	  include './funciones_php/select_comunidades.php';
    	  include './funciones_php/consultaGenericaPisos.php';
    ?>
	
	<link rel="stylesheet" href="css/miStyle.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div <?php fondo(); ?> class='navbar'>
	<div class='col-6 pt-4 ml-4 mb-5 col-md-8 col-lg-4' id="menu1">
    <h1 class='mb-0'><a href='index.html' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
    </div>
    <div class='col-6 pt-4 mr-4 mb-5' id='menu2'>
    	<a href='index.html' style="color:white;">Incio</a>
		<a href='buy.html' style="color:white;">Casas en alquiler</a>
        <a href='rent.html' style="color:white;">Preguntas frecuentes</a>		                  
        <a href='properties.html' style="color:white;">Conocenos</a> 
        <a href='contact.html' style="color:white;">Contacto</a>
        </div>
	<div class='col-12' id="carrousel">
 		<?php 
 		generar_menu();

 		?>
 	</div>
 </div>
	<div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" id="menu_filtros" style="margin-top: -100px;">
            <div class="row  align-items-end">
              <div class="col-md-5">
                <label for="list-types">Comunidades</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="list-types" id="list-types" class="form-control d-block rounded-0" id="comunidad">
                  	<option value="" disabled selected>seleccione una comunidad</option>
					<?php comunidades();?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="offer-types">Ciudades</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offer-types" id="offer-types" class="form-control d-block rounded-0" id="ciudad">
                  	<option value="" disabled selected>seleccione una ciudad</option>
					<?php ciudades();?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input id="buscar" type="submit" class="btn btn-success text-white btn-block rounded-0"name ="buscar" value="Buscar">
              </div>
            </div>
          </form>
        </div>  
      </div>
    </div>
    <div class="site-section site-section-sm bg-light" id="pisos">
		<div class='container'>
   		<div class='row mb-5'>
		<?php 
			if(!isset($_POST['buscar'])){
				genericaPisos();
			}	
		?>
		</div>
		</div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>