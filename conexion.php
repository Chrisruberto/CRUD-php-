<?php
//funcion para conectarse con el servidor local.
function conectar(){
    $host="localhost";   
    $user="root";
    $pass="";
    $bd="trabajo";

    $con=mysqli_connect($host,$user,$pass); 

    mysqli_select_db($con,$bd); 

    return $con;
}
?>
