<?php 
    include("conexion.php");
    $con=conectar(); //ya que la coneccion conectar retorna con, conectar llama a con.

 

    $num_por_pag=10;


	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}

	$start_from=($page-1)*05;

	$sql="select * from alumno limit $start_from,$num_por_pag";
	$query=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/805c7bb8e3.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        

    </head>
    <body>

            <div class="container mt-5">
                    <div class="row"> 
                         
                    <!-- Formulario para cargar datos -->
                        <div class="col-md-3"> 
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_estudiante" placeholder="cod estudiante">
                                    <input type="text" class="form-control mb-3" name="dni" placeholder="Dni">
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                        <!---------- Listado de alumnos  --------->
                        <div class="col-md-9">
                            
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Dni</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                            while($row=mysqli_fetch_array($query)){
                                                // consulta para que agrege por orden primero cod estudiante despues dni todo ordenado.
                                        ?>
                                                                                    <tr>
                                                <th><?php  echo $row['cod_estudiante']?></th>
                                                <th><?php  echo $row['dni']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>    
                                                                        <!---------- Botones para eliminar / editar datos  --------->

                                                <th><a href="actualizar.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-info">Editar</a></th> 
                                                <th><a href="delete.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            
                                            </tr>
                                            <?php
                                             }
                                     ?>
                                                
                                </tbody>
                            </table>
             <?php  
             
$sql="select * from alumno";
$query=mysqli_query($con,$sql);
$total_records=mysqli_num_rows($query);
$total_pages=ceil($total_records/$num_por_pag);

for($i=1;$i<=$total_pages;$i++)
{

    echo "<a href='alumno.php?page=".$i."'>".$i."</a>" ;
}
        ?>                
            


         </div>
                                         
      </div>  
 </div>
    </body>
</html> 