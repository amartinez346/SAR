<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	
		
	if (isset($_POST['submit'])){
		
		$mail=$_POST['mail'];
		$password=$_POST['password'];
		$usuarios = mysqli_query( $con,"select * from usuarios where mail ='$mail' and password ='$password'");
		$cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
		
		if($cont==1){
			if ($mail=='admin'){
				session_start(); 
				$_SESSION['mail']=$mail;
				echo("<script>window.location = 'admin.php';</script>");
			}else{
				session_start(); 
				$_SESSION['mail']=$mail;
				echo("<script>window.location = 'principal.php';</script>");
			}

		}else{
			echo("<script>alert('Error vuelva a intentarlo')</script>");
            echo("<script>window.location = 'login.php';</script>");
		}

		mysqli_close($con); //cierra la conexion
		
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

		<h1>Login</h1>
		
		<br>
		<br>	
		<form id = 'login' name ='login' action = 'login.php' method="POST" enctype="multipart/form-data">    
			<div>
			<b>Email</b>
		    <input type="text" name="mail" id="mail"/>		
			<br>
			<br>
		    <b>Password</b>
		    <input type="password" name="password" id="password"/>
		    <br>
			<br>
		    <button type="submit" name="submit">Login</button>
		    <input type="button" name="boton" id="boton" onclick="location='registro.php'" value="Registrarse"/>		
			</div>
		    
		</form>
	</section>
	<footer class='main' id='f1'>
		Pagina creada por Aitor Martínez, Gorka Gutierrez y Oier Martínez
	</footer>
</div>
</body>
</html>