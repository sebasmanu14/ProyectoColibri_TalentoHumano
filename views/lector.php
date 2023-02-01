<?php

session_start();
error_reporting(0);

$id = $_POST['id'];
extract($_POST);
$validar = $_SESSION['nombre'];
if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();
}
print_r($id);
include('../views/layout/navbar.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <title>Usuarios</title>
</head>
<br>
<div class="container is-fluid">
  <div class="col-xs-12">
    <h1>Bienvenido Usuario <?php echo $_SESSION['nombre'] ?></h1>
    <br>
    <br>
    <div class="alert alert-primary" role="alert">
      Llenar el siguiente formulario para completar de cargar su información</a>
    </div>
    <div class="container-fluid">
    </div>
    <br>
    <div class="table-responsive">
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
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
$nombre = $_SESSION['nombre'];
$conexion = mysqli_connect("localhost", "root", "", "r_user");
$SQL = "SELECT user.id, user.proyecto, user.cedula, user.nombre, user.apellido, user.genero, user.correo, user.telefono,
user.fechanac, user.edad,  user.lugnaci, user.estadcivil, user.discapacidad, user.tiposangre, user.cargo, user.fechaingproyecto, user.fechaingproyecto, user.fechasalida,
user.tit3nivel, user.tit4nivel, user.banco, user.cuenta, user.ubicacion, user.password, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id WHERE nombre = '$nombre'";
$dato = mysqli_query($conexion, $SQL);
        if ($dato->num_rows > 0) {
          while ($fila = mysqli_fetch_array($dato)) {
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
              <td>
                <a class="btn btn-warning" href="registro_user.php?id=<?php echo $fila['id'] ?> ">
                  LLenar Formulario</a>
              </td>
            </tr>
          <?php
          }
        } else {

          ?>
          <tr class="text-center">
            <td colspan="16">No existen registros</td>
          </tr>
        <?php
        }
        ?>
        </body>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
    <script src="../js/acciones.js"></script>
    <script src="../js/buscador.js"></script>
    <?php include('../index.php'); ?>

</html>