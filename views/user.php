<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Usuarios</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">Talento Humano</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="contenido"> 
      <a class="btn btn-danger" href="../includes/_sesion/cerrarSesion.php">Cerrar Sesion
      <i class="fa-solid fa-right-from-bracket"></i>
       </a>
      </li>
    </ul>
  </div>
</nav>

<br>
<div class="container is-fluid">

<div class="col-xs-12">
  		<h1>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h1>
      <br>
		<h1 class="text-center">Lista de usuarios</h1>
    <br>
		<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span> Nuevo usuario   <i class="fa fa-plus"></i> </a></button>

       <a class="btn btn-primary" href="../includes/excel.php">Excel
       <i class="fa fa-table" aria-hidden="true"></i>
       </a>
       <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>
		</div>
		<br>


    <div class="container-fluid">
  <form class="d-flex">
			<form action="" method="GET">
			<input class="form-control me-2" type="search" placeholder="Buscar con PHP" 
			name="busqueda"> <br>
			<button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar </b> </button> 
			</form>
  </div>
  <?php
$conexion=mysqli_connect("localhost","root","","r_user"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE user.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
    OR telefono  LIKE'%".$busqueda."%'";
	}
  
}


?>
           <br>


			</form>
      <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar con JS">
      <hr>
      </form>
  </div>

  <br>

 
      <table class="table table-striped table-dark table_id ">

                   
                         <thead>    
                         <tr>
                        <th>Proyecto</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Género</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Ubicación</th>

                        <th>Servicio</th>
                        <th>Cargo</th>
                        <th>Fecha ingreso</th>
                        <th>Fecha ingreso proyecto</th>
                        <th>Fecha salida</th>
                        <th>Titulo tercer nivel</th>
                        <th>Titulo cuarto nivel</th>
                        <th>Fecha nacimiento</th>
                        <th>Edad</th>
                        <th>Lugar nacimiento</th>
                        <th>Estado civil</th>
                        <th>Discapacidad</th>
                        <th>Banco</th>
                        <th>Cuenta</th>
                        <th>Operadora</th>
                        <th>Tipo de sangre</th>
                        <th>Correo institucional</th>
                        <th>Correo personal</th>
                        <th>Contacto de emergencia</th>
                        <th>Parentesco</th>
                        <th>Numero</th>

                        <th>Fecha</th>
                        <th>Rol</th>
                        <th>Acciones</th>
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","","r_user");               
$SQL= "SELECT * FROM user
LEFT JOIN permisos ON user.rol = permisos.id $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['proyecto']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['apellido']; ?></td>
<td><?php echo $fila['genero']; ?></td>
<td><?php echo $fila['cedula']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['ubicacion']; ?></td>

<td><?php echo $fila['profesionales/Contrato']; ?></td>
<td><?php echo $fila['cargo']; ?></td>
<td><?php echo $fila['fechaingreso']; ?></td>
<td><?php echo $fila['fechaingproyecto']; ?></td>
<td><?php echo $fila['fechasalida']; ?></td>
<td><?php echo $fila['tit3nivel']; ?></td>
<td><?php echo $fila['tit4nivel']; ?></td>
<td><?php echo $fila['fechanac']; ?></td>
<td><?php echo $fila['edad']; ?></td>
<td><?php echo $fila['lugnaci']; ?></td>
<td><?php echo $fila['estadcivil']; ?></td>
<td><?php echo $fila['discapacidad']; ?></td>
<td><?php echo $fila['banco']; ?></td>
<td><?php echo $fila['cuenta']; ?></td>
<td><?php echo $fila['operadora']; ?></td>
<td><?php echo $fila['tiposangre']; ?></td>
<td><?php echo $fila['correoinst']; ?></td>
<td><?php echo $fila['correopers']; ?></td>
<td><?php echo $fila['contemerg']; ?></td>
<td><?php echo $fila['parentesco']; ?></td>
<td><?php echo $fila['numero']; ?></td>


<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['rol']; ?></td>



<td>


<a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i> </a>

  <a class="btn btn-danger"  href="eliminar_user.php?id=<?php echo $fila['id']?>">
<i class="fa fa-trash"></i></a>

</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}

?>


	</body>
  </table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/acciones.js"></script>
<script src="../js/buscador.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.js" integrity="sha512-S1KaVll2UTj29SOXML7O4LxU7zEoQhJgnondHE/ZvNrk7H4Rc9TLFKDaWuEzsHmAEkJnWFedc0hcVrpvFTOlwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




		<?php include('../index.php'); ?>
</html>