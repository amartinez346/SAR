<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	
		
		if (isset($_POST['submit']))
		{
			//insertar usuario
			$mail=$_POST['mail'];
			$password=$_POST['password'];
			$direccion=$_POST['direccion'];	
			$numero=$_POST['numero'];
			

			
			$sql="insert into usuarios(mail,password,direccion,numero)
				values('$mail','$password','$direccion','$numero')";
											
			mysqli_query($con,$sql);	
			
			header("Location: login.php");
		}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Tienda de Videojuegos</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<h2>Tienda de Videojuegos</h2>
    </header>
	<nav class='main' id='n1'>

	</nav>
    <section class="main" id="s1">

		<h1>Registro</h1>
		
		<br>
		<br>	
		<form id='registro' name='registro' action='registro.php' method="POST" enctype="multipart/form-data">    
			<div>
			<b>Email</b>
		    <input type="text" name="mail" id="mail">		
			<br>
			<br>
		    <b>Contraseña</b>
		    <input type="password" name="password" id="password">
		    <br>
			<br>
			<b>Repetir Contraseña</b>
		    <input type="password" name="password2" id="password2">
		    <br>
			<br>
			<b>Dirección</b>
		    <input type="text" name="direccion" id="direccion">
		    <br>
			<br>
			<b>Número de cuenta</b>
		    <input type="text" name="numero" id="numero">
		    <br>
			<br>
		    <button type="submit" name="submit" id="submit">Registrarse</button>
			
			<input type="button" name="boton2" id="boton2" onclick="location='login.php'" value="Login"/>
			</div>
		    
		</form>
	</section>
	<footer class='main' id='f1'>
		Pagina creada por Aitor Martínez, Gorka Gutierrez y Oier Martínez
	</footer>
</div>
</body>
</html>


<script src="libreria/jquery-3.3.1.js"></script>
<script>
		$(document).ready(function() {
			$("#registro").keyup(function() {		
				var mail = $("#mail").val();
				var contrasena = $("#password").val();
				var contrasena2 = $("#password2").val();
				var direccion =$("#direccion").val();
				if(mail.length >= 1 && contrasena.length >= 4 && contrasena==contrasena2 && direccion.length >= 1){
					$("#submit").prop("disabled", false);
				}
				else{
					$("#submit").prop("disabled", true);
				}
			});	
			
		});
</script>