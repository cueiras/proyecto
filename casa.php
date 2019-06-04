<?php
    session_start();

if(isset($_SESSION['usuario'])){

}
else{
  //header("location:inicio_sesion.php");

}
?>
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
        include './funciones_php/cargaPisos.php'
    ?>
  

    <script src="./funciones_javaScript/jquery-3.3.1.js"></script>
    


</head>
<body>
<div style="background-color:rgb(205, 205, 177);" id="menu">
  <div class="container">
  <div class="row d-flex align-items-center">
    <div class='col-4' id="menu1">
      <h1 class='mb-0'><a href='index.php' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
    </div>
    <div class="col-8 d-flex justify-content-center" id="menu2">
      <a href='index.html' style="color:white;">Incio</a>
      <a href='buy.html' style="color:white;">Casas en alquiler</a>
      <a href='inicio_sesion.php' style="color:white;">Iniciar Sesion</a>
    </div>
  </div>
  </div>
</div>
      <?php 
        cargaPisos();
      ?>


</body>

</html>