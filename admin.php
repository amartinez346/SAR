<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	
		
		if (isset($_POST['submit']))
		{
			//insertar juego
			$nombre=$_POST['nombre'];
			$precio=$_POST['precio'];
			$categoria=$_POST['categoria'];	
			$cantidad=$_POST['cantidad'];
			

			
			$sql="insert into juegos(nombre,precio,categoria,cantidad)
				values('$nombre',$precio,'$categoria',$cantidad)";
											
			mysqli_query($con,$sql);	

			$xml = new SimpleXMLElement('<juego></juego>');
			$xml->asXML($nombre .'.xml');



			echo "<script type='text/javascript'>alert('Juego Añadido');</script>";
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
      	<span class="right"><a href="salir.php">Salir</a></span>
		<h2>Tienda de Videojuegos</h2>
    </header>
	<nav class='main' id='n1'>
		<span><a href='admin.php'>Insertar Videojuegos</a>
		<a href='adminVideojuegos.php'>Ver Videojuegos</a></span>
	</nav>
    <section class="main" id="s1">

		<h1>Insertar Juegos</h1>
		
		<br>
		<br>	
		<form id='insertar' name='insertar' action='admin.php' method="POST" enctype="multipart/form-data">    
			<div>
			Nombre:
		    <input type="text" name="nombre" id="nombre">		
			<br>
			<br>
		    Precio:
		    <input type="text" name="precio" id="precio">
		    <br>
			<br>
			Categoria:
		    <input type="text" name="categoria" id="categoria">
		    <br>
			<br>
			Cantidad:
		    <input type="text" name="cantidad" id="cantidad">
		    <br>
			<br>
		    <button type="submit" name="submit" id="submit">Añadir videojuegos</button>
			</div>
		    
		</form>
	</section>
	<footer class='main' id='f1'>
		Pagina creada por Aitor Martínez, Gorka Gutierrez y Oier Martínez
	</footer>
</div>
</body>
</html>