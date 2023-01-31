<?php
$conexion= mysqli_connect("localhost", "root", "", "r_user");

if(isset($_POST['registrar'])){

    if(strlen($_POST['proyecto']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 
     && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) ){

    $proyecto = trim($_POST['proyecto']);
    $nombre = trim($_POST['nombre']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);
    $correo = trim($_POST['correo']);

    $consulta= "INSERT INTO user (proyecto, nombre, correo, password, rol)
    VALUES ('$proyecto', '$nombre','$correo','$password', '$rol' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/user.php');
  }
}
?>