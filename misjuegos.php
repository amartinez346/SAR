<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	

		session_start(); 
		$mail=$_SESSION['mail'];
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
		<h2>Tienda de Videojuegos</h2> <?php echo $mail;?> <a href="salir.php"> Salir</a>
    </header>
	<nav class='main' id='n1'>
			<span><a href='principal.php'>Ver juegos</a></span>
	</nav>
    <section class="main" id="s1">

		<div id="lista1">
			<h1>Juegos Deseados</h1>
		<?php

			$consulta = "SELECT * FROM misdeseos where mail='$mail' ";
			
			$resultado = mysqli_query($con, $consulta); 
			if(!$resultado) 
				die("Error: no se pudo realizar la consulta");
				
				echo "<ul>";
			while($fila = mysqli_fetch_assoc($resultado)) 
			{
				echo '<li>'.$fila['nombre'].'</li>'; 
			}
				echo "</ul>";
		?>
		
		</div>
		<div id="lista1">
			<h1>Mis Juegos</h1>
		<?php

			$consulta2 = "SELECT * FROM misjuegos where mail='$mail' ";
			
			$resultado2 = mysqli_query($con, $consulta2); 
			if(!$resultado2) 
				die("Error: no se pudo realizar la consulta");
				
				echo "<ul>";
			while($fila2 = mysqli_fetch_assoc($resultado2)) 
			{
				echo '<li>'.$fila2['nombre'].'</li>';
			}
				echo "</ul>";
			mysqli_close($con);

		?>
		
		</div>

	</section>
	<footer class='main' id='f1'>
		Pagina creada por Aitor Martínez, Gorka Gutierrez y Oier Martínez
	</footer>
</div>
</body>
</html>