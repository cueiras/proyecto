<?php
   session_start();
   
   if(isset($_SESSION['usuario'])&&($_SESSION['usuario']=='administrador')){
     
   
   }
   else{
     header("Location:index.php");
   
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
          include './funciones_php/imagen.php';
         ?>
      <script src="./funciones_javaScript/jquery-3.3.1.js"></script>
      <script src="./funciones_javaScript/buscar.js"></script>
      <script src="./funciones_javaScript/piso.js"></script>
      <script src="./funciones_javaScript/inicio.js"></script>
      <script src="./funciones_javaScript/admin.js"></script>
   </head>
   <body>
      <div style="background-color:rgb(205, 205, 177);" id="menuPrincipal">
         <div class="container">
            <div class="row mb-4 row mb-4 d-flex align-items-center" id="menuGeneral">
               <div class='col-md-6 justify-content-md-start col-xs-12 d-flex justify-content-center' id="menu1">
                  <h1 class='mb-0'><a href='index.php' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
               </div>
               <div class="col-md-6 d-flex justify-content-md-end col-xs-12 justify-content-center" id="menu2">
                  <a onclick="salida()" id="salida" style="color:white;">Desconectarse</a>
                  <a href='inicio_sesion.php' style="color:white;">Iniciar Sesion</a>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
      <div class="row">
         <div class='col'>
            <div class='bg-white widget ' id="formulario">
               <h3 class='h4 text-black widget-title mb-3'>Mensajes de los usuarios</h3>
            </div>
         </div>
      </div>

   </body>
</html>