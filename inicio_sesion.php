<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/cssInicio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./funciones_javaScript/login.js"></script>
</head>
<body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar Sesion</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
	
		<div class="login-form">
			
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Usuario</label>
					<input id="usuario" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">Contraseña</label>
					<input id="contraseña" type="password" class="input" data-type="password" >
				</div>
				<div class="group">
					<input id="enviar" type="submit" class="button" value="Iniciar sesion">
				</div>
				<div class="hr"></div>
				<div id="alertas"></div>
			</div>

		

		
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Usuario</label>
					<input id="usuario1" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">Contraseña</label>
					<input id="contraseña1" type="password" class="input" data-type="password" >
				</div>
				<div class="group">
					<label for="pass" class="label">Repite contraseña</label>
					<input id="contraseña2" type="password" class="input" data-type="password" >
				</div>
				<div class="group">
					<label for="pass" class="label">Correo Electronico</label>
					<input id="correo" type="text" class="input" >
				</div>
				<div class="group">
					<input id="enviar2" type="submit" class="button" value="Registrarse">
				</div>
				<div class="hr"></div>
				<div id="alertas2"></div>
				
				<div class="foot-lnk">
					<label for="tab-1">¿Ya estas registrado?</a>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>	
</body>
</html>