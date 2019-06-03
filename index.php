<?php
session_start();

if(isset($_SESSION['usuario'])){
  echo $_SESSION['usuario'];
}
else{
  header("location:inicio_sesion.php");

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
  <div class="row d-flex d-flex align-items-center">
    <div class='col-4' id="menu1">
      <h1 class='mb-0'><a href='index.php' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
    </div>
    <div class="col-8" id="menu2">
      <a href='index.php' style="color:white;">Incio</a>
      <a href='buy.html' style="color:white;">Casas en alquiler</a>
      <a href='inicio_sesion.php' style="color:white;">Iniciar Sesion</a>
    </div>
  </div>
  <div class="row d-flex align-items-center">
    <div class='col-12' id="carrousel">
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