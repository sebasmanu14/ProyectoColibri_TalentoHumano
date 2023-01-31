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

    $query = "SELECT * FROM user WHERE nombre = '$nombre'";
    $result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
  echo "<script>alert('El valor ya existe en la base de datos'); history.back();</script>";
} else {
    $consulta= "INSERT INTO user (proyecto, nombre, correo, password, rol)
    VALUES ('$proyecto', '$nombre','$correo','$password', '$rol' )";
    echo "El valor se ha insertado correctamente en la base de datos";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header('Location: ../views/user.php');
}
  }
}

?>