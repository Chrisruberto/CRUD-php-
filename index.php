
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link rel="stylesheet" href="Style.css">
  </head>
  <body>
    <!-- Formulario para cargar datos -->
<div>
<form method="post" action="index.php" >
<table>
<tr><td style="background-color:#33A8DB;"><label>Login</label></td></tr>
<tr><td><input type="text" name="txtusuario" placeholder="&#128273; Ingresar usuario" required /></td></tr>
<tr><td><input type="password" name="txtpassword" placeholder="&#128274; Ingresar Contraseña" required /> </td></tr>
<tr><td><input type="submit" value="Ingresar" name="btningresar"/> </td></tr>
<br>
<tr><td><a href="registrar.php" style="float:right">Crea una cuenta</a></td></tr>

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

if(isset($_POST['btningresar']))
{
	
$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];


	

	
$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	$_SESSION['nombredelusuario']=$nombre;
	header("Location: alumno.php");
}
else if ($nr == 0) 
{
	echo "<script> alert('El Usuario / contraseña no existe');window.location= 'index.php' </script>";
}

} 
?>