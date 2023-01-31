<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ./includes/login.php");
  die();
}


?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <title>Registros</title>
</head>

<body id="page-top">
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../includes/nuevo_usuario.php" method="POST">
            <div class="form-group">
              <label for="proyecto" class="form-label">Proyecto</label>
              <input type="text" id="proyecto" name="proyecto" class="form-control" value="<?php echo $usuario['proyecto']; ?>" required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario:</label><br>
              <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="username">Correo:</label><br>
              <input type="email" name="correo" id="correo" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label><br>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="rol" class="form-label">Rol de usuario *</label>
              <input type="number" id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 user" value="<?php echo $usuario['rol']; ?>" required>
              <input type="hidden" name="accion" value="editar_registro">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="modal-footer">
            </div>
            <div class="mb-3">
              <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
              <a href="user.php" class="btn btn-danger">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>