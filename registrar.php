<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="Login.css">
  </head>
  <body>

  <!-- Formulario para cargar datos -->
<div>
	<form method="post" action="registrar.php" name="vaidrollteam">
<table>
<tr><td style="background-color:#33A8DB;"><label>Regístrate</label></td></tr>
<tr><td><input type="text" name="txtusuario" placeholder="&#128273; Ingresa tu usuario" required /></td></tr>
<tr><td><input type="password" name="txtpassword" placeholder="&#128274; Ingresa tu Contraseña" required /> </td></tr>
<tr><td><input type="submit" value="Registrar" name="btnregistrar"/> </td></tr>
<br>
<tr><td><a href="index.php" style="float:right">Iniciar sesión</a></td></tr>
</table>



</form>
</div>
</body>
</html>

<?php
include('conexion1.php');

session_start();
if(isset($_SESSION['nombredelusuario']))
{
	header('location: alumno.php');
}

if(isset($_POST["btnregistrar"]))
{

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];


	$sqlgrabar = "INSERT INTO login(usuario,password) values ('$nombre','$pass')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.php' </script>";
	}else 
	{
		echo "Error: ";
	}
} 
?>