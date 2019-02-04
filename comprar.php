<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	

session_start(); 
$mail=$_SESSION['mail'];
$juego=(string)$_SESSION['juego'];
$variable='juego.php?juego='. $juego;

$sql= "INSERT INTO misjuegos(nombre, mail) VALUES ('$juego','$mail')";
$sql2= "UPDATE juegos set cantidad=cantidad-1 where nombre ='$juego'";
mysqli_query($con, $sql);
mysqli_query($con, $sql2);
mysqli_close($con); 
header('Location: '. $variable);
?>
