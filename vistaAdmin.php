<?php
session_start();

if(isset($_SESSION['usuario'])&&($_SESSION['usuario']=='administrador')){
  
echo $_SESSION['usuario'];
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
         <div class="row mb-4" id="menuGeneral">
            <div class='col-md-6 justify-content-md-start col-xs-12 d-flex justify-content-center' id="menu1">
               <h1 class='mb-0'><a href='index.php' class='h2 mb-0'><strong style="color:white;">ALQUILEA<span class='text-danger'>.</span></strong></a></h1>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end col-xs-12 justify-content-center" id="menu2">
               <a id="insertar" style="color:white;">Insertar Piso</a>
               <a onclick="duenio()" style="color:white;">Insertar Dueño</a>
               <a onclick="salida()" id="salida" style="color:white;">Desconectarse</a>
               <a href='inicio_sesion.php' style="color:white;">Iniciar Sesion</a>
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
   <div class="container">
        <div class="row">
            <div class='col'>
                <div class='bg-white widget ' id="formulario">
                    <h3 class='h4 text-black widget-title mb-3'>Insertar un nuevo piso dar un poco de padinng</h3>
                    <form  action="./funciones_php/insertar.php" enctype="multipart/form-data" method="post" id="formupload">
                   <div class='form-group'>
                            <label for='name'>Dueños</label>
                            <select class="form-control" id="duenios">

                            </select>
                    </div>
                    <div class='form-group'>
                        <label for='comunidad'>Comunidad</label>
                        <input type='text' id='comunidad1' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='ciudad'>Ciudad</label>
                        <input type='text' id='ciudad1' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='zona'>Zona</label>
                        <input type='text' id='zona1' class='form-control'required>
                    </div>
                    <div class='form-group'>
                      <label for='calle'>Calle</label>
                      <input type='text' id='calle' class='form-control'required>
                    </div>
                    <div class='form-group'>
                      <label for='numero'>Numero</label>
                      <input type='number' id='numero' class='form-control'required>
                    </div>
                    <div class='form-group'>
                      <label for='piso'>Piso</label>
                      <input type='text' id='piso' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='tipoCasa'>Tipo de casa</label>
                        <input type="text" id='tipoCasa' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='anio'>Año</label>
                        <input type='text' id='anio' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='precio'>Precio</label>
                        <input type='text' id='precio' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='habitaciones'>Habitaciones</label>
                        <input type="number" id='habitaciones' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='banios'>baños</label>               
                        <input type='number' id='banios' class='form-control'required>
                    </div>
                    <div class='form-group'>
                        <label for='preciom2'>M2</label>
                        <input type="number" id='m2' class='form-control' required>
                    </div>
                    <div class='form-group'>
                        <label for='preciom2'>Precio M2</label>
                        <input type="number" id='preciom2' class='form-control' required>
                    </div>
                    <div class="form-group">
                        <label for="informacion">Informacion</label>
                        <textarea class="form-control" rows="3" id="informacion" required></textarea>
                    </div>
                    <div class='form-group'>
                        <input type='submit' id="enviar"  class='btn btn-primary' value='Insertar'>
                    </div>
                  </form>
                </div>
                <div id="imagen">
                  <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="informacion">Imagen principal</label>
                        <input name="imagen" type="file" id="principal"required/>
                        <input type="submit" name="enviar" value="subir">
                    </div>
                  </form>
                  <?php 
                      if(isset($_POST['enviar'])){

                        $nombre_img = $_FILES['imagen']['name'];
                        $tipo = $_FILES['imagen']['type'];
                        $tamaño = $_FILES['imagen']['size'];
            
                        $directorio = 'images/';

                        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                        $nombre= './images/'.$_FILES['imagen']['name'];
                        insertar($nombre);
                      }



                   ?>
                </div>
        </div>
      </div>
</div>
</body>

</html>