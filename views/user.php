<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();
}
include('../views/layout/navbar.php');

?>
<br>
<div class="container is-fluid">
  <div class="col-xs-12">
  <?php echo $_SESSION['id']; ?>

    <h1>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h1>
    <br>
    <h1 class="text-center">Lista de usuarios</h1>
    <br>
    <div>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
        <span class="glyphicon glyphicon-plus"></span> Nuevo usuario <i class="fa fa-plus"></i> </a></button>
      <a class="btn btn-primary" href="../includes/excel.php">Excel
        <i class="fa fa-table" aria-hidden="true"></i>
      </a>
      <a href="../includes/reporte.php" class="btn btn-primary" target=”_blank”><b>PDF</b> </a>
    </div>
    <br>

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    $where = "";
    if (isset($_GET['enviar'])) {
      $busqueda = $_GET['busqueda'];


      if (isset($_GET['busqueda'])) {
        $where = "WHERE user.correo LIKE'%" . $busqueda . "%' OR nombre  LIKE'%" . $busqueda . "%'
    OR telefono  LIKE'%" . $busqueda . "%'";
      }
    }
    ?>
    <br>
    </form>
    <div class="container-fluid">
      <form class="d-flex">
        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar con JS">
        <hr>
      </form>
    </div>
    <br>
    <table class="table table-striped table_id">
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
          <!-- <th>Servicio</th>
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
                        <th>Numero</th> -->
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "r_user");
        $SQL = "SELECT user.id, user.proyecto, user.cedula, user.nombre, user.apellido, user.genero, user.correo, user.telefono,
user.fechanac, user.edad,  user.lugnaci, user.estadcivil, user.discapacidad, user.tiposangre, user.cargo, user.fechaingproyecto, user.fechaingproyecto, user.fechasalida,
user.tit3nivel, user.tit4nivel, user.banco, user.cuenta, user.ubicacion, user.password, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id $where";
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

              <!-- <td><?php echo $fila['profesionales/Contrato']; ?></td>
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
<td><?php echo $fila['numero']; ?></td> -->
              <td><?php echo $fila['rol']; ?></td>
              <td>
                <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                  <i class="fa fa-edit"></i> </a>
                <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                  <i class="fa fa-trash"></i></a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
    <script src="../js/user.js"></script>
    <script src="../js/acciones.js"></script>
    <script src="../js/buscador.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.js" integrity="sha512-S1KaVll2UTj29SOXML7O4LxU7zEoQhJgnondHE/ZvNrk7H4Rc9TLFKDaWuEzsHmAEkJnWFedc0hcVrpvFTOlwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php include('../index.php'); ?>
</html>