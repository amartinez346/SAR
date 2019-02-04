<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	

	session_start(); 
	$mail=$_SESSION['mail'];

	$juego=$_GET["juego"];

	if (isset($_POST['submit'])){

	$xml = simplexml_load_file($juego.'.xml');
			$comentario = $xml->addChild('comentario');
			
			$comentario->addAttribute('usuario',$mail);

			$texto = $comentario->addChild('texto', $_POST['comentario']);
			$texto = $comentario->addChild('puntuacion', $_POST['estrellas']);
			
			$xml->asXML($juego.'.xml');
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
		<h2>Tienda de Videojuegos</h2>  <?php echo $mail;?> <a href="salir.php"> Salir</a>
    </header>
	<nav class='main' id='n1'>
			<span><a href='principal.php'>Ver juegos</a></span>
	</nav>
    <section class="main" id="s1">

		<h1><?php echo $juego;  ?></h1>	
		<?php $variable='action="juego.php?juego='. $juego . '"'; ?>
		<br><br>



		<div id="puntuacion">
						<?php
		$consulta = "SELECT * FROM misdeseos where nombre='$juego' and mail='$mail'";
		$resultado = mysqli_query($con, $consulta);
		$cont= mysqli_num_rows($resultado);
		$añadir;
		if($cont==1){
			$añadir="Eliminar";
		}else{
			$añadir="Añadir";
		}
		$_SESSION['estado']=$añadir;
		$_SESSION['juego']=$juego;

		$consulta2 = "SELECT * FROM misjuegos where nombre='$juego' and mail='$mail'";
		$resultado2 = mysqli_query($con, $consulta2);
		$cont2= mysqli_num_rows($resultado2);
		?>

		<button type="submit" id="Boton" name="Boton" onclick=funcion("misdeseos.php") <?php  if($cont2==1){
			echo disabled;}?>    > <?php echo $añadir;?> lista deseos</button>
		<button type="submit" id="Boton2" name="Boton2" onclick=funcion2("comprar.php") <?php  if($cont2==1){
			echo disabled;}?> >Comprar</button>

		<br><br>
	
		<form <?php echo $variable;?>   method="POST">
			<textarea rows="4" cols="50" id="comentario" name="comentario"></textarea>
			

			 <p class="clasificacion">
			    <input id="radio1" type="radio" name="estrellas" value="5"><!--
			    --><label for="radio1">★</label><!--
			    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
			    --><label for="radio2">★</label><!--
			    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
			    --><label for="radio3">★</label><!--
			    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
			    --><label for="radio4">★</label><!--
			    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
			    --><label for="radio5">★</label>
			  </p>
			  <br>
			  <button type="submit" id="Boton" name="submit">Añadir comentario y puntuar</button>
		</form>		
		</div>
		<br>
		<div id="comentarios">
			<?php

			$xml=simplexml_load_file( $juego . ".xml") or die("Se el primero en comentar");
			?>
			<div id="tabla">
				<table border="2">
				<thead>
					<tr bgcolor="#3E7640"><th>Usuario</th><th>Comentario</th><th>Puntuacion 1/5</th></tr>
				</thead>
				<?php
					$num=0;
					$cant=0;
					foreach($xml->children() as $comentario){
				?>
				<tr bgcolor="#75E979">
				<td> <?php echo $comentario['usuario']; ?> </td> 
				<td> <?php echo $comentario->texto; ?> </td> 
				<td> <?php echo $comentario->puntuacion; ?> </td> </tr>
				<?php
					$num= $num+$comentario->puntuacion;
					$cant=$cant+1;
					};
				?>
				</table>
			</div>

			<br>
			<p>La puntuación media de este videojuego de los usuarios es <?php echo $num/$cant;?> /5 </p> 
		</div>	
	</section>
	<footer class='main' id='f1'>
		Pagina creada por Aitor Martínez, Gorka Gutierrez y Oier Martínez
	</footer>
</div>
</body>
</html>
<script>
	function funcion(link){
		location.href = link;
	};
	function funcion2(link){
    	location.href = link;		
	};
</script>