<?php
$conexion= mysqli_connect("localhost", "root", "", "r_user");

if(isset($_POST['registrar'])){

    if(strlen($_POST['proyecto']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['apellido']) >=1 && strlen($_POST['genero']) >=1 && strlen($_POST['cedula']) >=1 && strlen($_POST['correo']) >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['ubicacion']) >=1 && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) >= 1 ){

    $proyecto = trim($_POST['proyecto']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $genero = trim($_POST['genero']);
    $cedula = trim($_POST['cedula']);
    $telefono = trim($_POST['telefono']);
    $ubicacion = trim($_POST['ubicacion']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO user (proyecto, nombre, apellido, genero, cedula, correo, telefono, ubicacion, password, rol)
    VALUES ('$proyecto', '$nombre', '$apellido', '$genero', '$cedula','$correo','$telefono', '$ubicacion','$password', '$rol' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/user.php');
  }
}









?>