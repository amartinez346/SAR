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
			<span><a href='misjuegos.php'>Lista deseos/Mis juegos</a></span>
	</nav>
    <section class="main" id="s1">

		<h1>Videojuegos</h1>
		<br>
		<br>

		<div id="tabla">
		
		<?php

			$consulta = "SELECT * FROM juegos";
			
			$resultado = mysqli_query($con, $consulta); 
			if(!$resultado) 
				die("Error: no se pudo realizar la consulta");
			
			echo '<table border="1">';
			echo '<tr bgcolor="#3E7640">';
			echo '<th>Nombre</th>';
			echo '<th>Precio</th>';
			echo '<th>Categoria</th>';
			echo '<th>Cantidad</th>';
			echo '</tr>';
			while($fila = mysqli_fetch_assoc($resultado)) 
			{
				echo '<tr bgcolor="#75E979">'; 
				echo '<td><a href= "juego.php?juego=' . $fila['nombre'] . '">' . $fila['nombre'] . ' </a></td><td>' . $fila['precio'] . '</td><td>' . $fila['categoria'] . '</td><td>' . $fila['cantidad'] . '</td>';
				echo '</tr>'; 
			}
			echo '</table>';

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