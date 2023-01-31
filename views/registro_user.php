<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
}

include('../views/layout/navbar.php');
$nombre= $_GET['nombre'];
$conexion= mysqli_connect("localhost", "root", "", "r_user");
$consulta= "SELECT * FROM user WHERE nombre = $nombre";

$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body id="page-top">
<form action="../includes/_functions.php" method="POST">
    <div class="container">
      <div class="row">
        <br>
        <br>
        <h3 class="text-center">Editar usuario</h3>
        <h4 class="text-start">Datos Personales</h4>
        <div class="form-group col-4">
          <label for="proyecto" class="form-label">Proyecto</label>
          <input type="text" id="proyecto" name="proyecto" class="form-control" value="<?php echo $usuario['proyecto']; ?>" disabled required>
        </div>
        <div class="form-group  col-4">
          <label for="cedula" class="form-label">Cédula</label>
          <input type="text" id="cedula" name="cedula" class="form-control" value="<?php echo $usuario['cedula']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="nombre" class="form-label">Nombre *</label>
          <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="apellido" class="form-label">Apellido *</label>
          <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $usuario['apellido']; ?>" required>
        </div>
        <div class="form-group  col-4">
          <label for="genero" class="form-label">Género</label>
          <select class="form-select" name="genero" aria-label="Default select example">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
        <div class="form-group col-4">
          <label for="username">Correo</label><br>
          <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $usuario['correo']; ?>">
        </div>
        <div class="form-group col-4">
          <label for="telefono" class="form-label">Teléfono *</label>
          <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="fechanac" class="form-label">Fecha de nacimiento</label>
          <input type="date" id="fechanac" name="fechanac" class="form-control" value="<?php echo $usuario['fechanac']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="edad" class="form-label">Edad</label>
          <input type="number" id="edad" name="edad" class="form-control" value="<?php echo $usuario['edad']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="lugnaci" class="form-label">Lugar de nacimiento</label>
          <input type="text" id="lugnaci" name="lugnaci" class="form-control" value="<?php echo $usuario['lugnaci']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="estadcivil" class="form-label">Estado Civil</label>
          <select class="form-select" name="estadcivil" aria-label="Default select example" required>
            <option value="Casado">Casado</option>
            <option value="Divorciado">Divorciado</option>
            <option value="Soltero">Soltero</option>
          </select>
        </div>
        <div class="form-group col-4">
          <label for="discapacidad" class="form-label">Discapacidad</label>
          <select class="form-select" name="discapacidad" aria-label="Default select example" required>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>
        <div class="form-group col-4">
          <label for="tiposangre" class="form-label">Tipo de sangre</label>
          <select class="form-select" name="tiposangre" aria-label="Default select example" required>
            <option value="O">O</option>
            <option value="O+">O+</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
          </select>
        </div>
        <div class="form-group  col-4">
          <label for="cargo" class="form-label">Cargo</label>
          <select class="form-select" name="cargo" aria-label="Default select example">
            <option value="Comunicador">Comunicador</option>
            <option value="Promotor">Promotor</option>
          </select>
        </div>
        <div class="form-group col-4">
          <label for="fechaingreso" class="form-label">Fecha de ingreso</label>
          <input type="date" id="fechaingreso" name="fechaingreso" class="form-control" value="<?php echo $usuario['fechaingreso']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="fechaingproyecto" class="form-label">Fecha de ingreso proyecto</label>
          <input type="date" id="fechaingproyecto" name="fechaingproyecto" class="form-control" value="<?php echo $usuario['fechaingproyecto']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="fechasalida" class="form-label">Fecha de salida</label>
          <input type="date" id="fechasalida" name="fechasalida" class="form-control" value="<?php echo $usuario['fechaingreso']; ?>" required>
        </div>
        <div class="form-group  col-4">
          <label for="tit3nivel" class="form-label">Titulo de Tercer Nivel</label>
          <select class="form-select" name="tit3nivel" aria-label="Default select example">
            <option value="Comunicador">Comunicador</option>
            <option value="Promotor">Promotor</option>
          </select>
        </div>
        <div class="form-group  col-4">
          <label for="tit4nivel" class="form-label">Titulo de Tercer Nivel</label>
          <select class="form-select" name="tit4nivel" aria-label="Default select example">
            <option value="Comunicador">Comunicador</option>
            <option value="Promotor">Promotor</option>
          </select>
        </div>
        <div class="form-group col-4">
          <label for="banco" class="form-label">Banco</label>
          <select class="form-select" name="banco" aria-label="Default select example">
            <option value="Banco del Pacifico">Banco del Pacifico</option>
            <option value="Banco Pichincha">Banco Pichincha</option>
            <option value="Produbanco">Produbanco</option>
            <option value="Banco Internacional">Banco Internacional</option>
          </select>
        </div>
        <div class="form-group col-4">
          <label for="cuenta" class="form-label">Cuenta</label>
          <input id="cuenta" name="cuenta" class="form-control" value="<?php echo $usuario['cuenta']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="ubicacion" class="form-label">Ubicacion</label>
          <input id="ubicacion" name="ubicacion" class="form-control" value="<?php echo $usuario['ubicacion']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="password">Contraseña:</label><br>
          <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario['password']; ?>" required>
        </div>
        <div class="form-group col-4">
          <label for="rol" class="form-label">Rol de usuario *</label>
          <input type="number" id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 lector.." value="<?php echo $usuario['rol']; ?>" disabled required>
          <input type="hidden" name="accion" value="editar_user">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <br>
        <div class="mb-3">
          <button type="submit" class="btn btn-success">Guardar</button>
          <a href="lector.php" class="btn btn-danger">Cancelar</a>
        </div>
      </div>
    </div>
  </form>
</body>
</html>