<?php	
 if(!($con = mysqli_connect('localhost', 'sar18x10', '123456789', 'sar18x10_videojuegos')))		
			die("Error: No se pudo conectar");	

session_start(); 
$mail=$_SESSION['mail'];
$juego=(string)$_SESSION['juego'];
$estado=(string)$_SESSION['estado'];
$variable='juego.php?juego='. $juego;

if(strcmp($estado, "Añadir")==0){
	$sql= "INSERT INTO misdeseos(nombre, mail) VALUES ('$juego','$mail')";
	mysqli_query($con, $sql);
    mysqli_close($con); 
    header('Location: '. $variable); 
    exit;

}


if(strcmp($estado, "Eliminar")==0) {
	$sql= "DELETE FROM misdeseos WHERE nombre='$juego' and mail='$mail'";
	mysqli_query($con, $sql);
    mysqli_close($con);
    header('Location: '. $variable); 
    exit;

}		
?>
