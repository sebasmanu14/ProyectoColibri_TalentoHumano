<?php
$conexion= mysqli_connect("localhost", "root", "", "r_user");

if(isset($_POST['registrar'])){

    if(strlen($_POST['proyecto']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['apellido']) >=1 && strlen($_POST['genero']) >=1 && strlen($_POST['cedula']) >=1 && strlen($_POST['correo']) >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['ubicacion']) >=1 && strlen($_POST['password'])  >=1 

    && strlen($_POST['profesionales/Contrato']) >= 1 
    && strlen($_POST['cargo']) >= 1
    && strlen($_POST['fechaingreso']) >= 1
    && strlen($_POST['fechaingproyecto']) >= 1
    && strlen($_POST['fechasalida']) >= 1
    && strlen($_POST['tit3nivel']) >= 1
    && strlen($_POST['tit4nivel']) >= 1
    && strlen($_POST['fechanac']) >= 1
    && strlen($_POST['edad']) >= 1
    && strlen($_POST['lugnaci']) >= 1
    && strlen($_POST['estadcivil']) >= 1
    && strlen($_POST['discapacidad']) >= 1
    && strlen($_POST['banco']) >= 1
    && strlen($_POST['cuenta']) >= 1
    && strlen($_POST['operadora']) >= 1
    && strlen($_POST['tiposangre']) >= 1
    && strlen($_POST['correoinst']) >= 1
    && strlen($_POST['correopers']) >= 1
    && strlen($_POST['contemerg']) >= 1
    && strlen($_POST['parentesco']) >= 1
    && strlen($_POST['numero']) >= 1

    && strlen($_POST['rol']) >= 1 ){

    $proyecto = trim($_POST['proyecto']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $genero = trim($_POST['genero']);
    $cedula = trim($_POST['cedula']);
    $telefono = trim($_POST['telefono']);
    $ubicacion = trim($_POST['ubicacion']);
    $password = trim($_POST['password']);

    $servicio = trim($_POST['profesionales/Contrato']);
    $cargo = trim($_POST['cargo']);
    $fechaing = trim($_POST['fechaingreso']);
    $fechaingproy = trim($_POST['fechaingproyecto']);
    $fechasalida = trim($_POST['fechasalida']);
    $titulotercernivel = trim($_POST['tit3nivel']);
    $titulocuartonivel = trim($_POST['tit4nivel']);
    $fechanac = trim($_POST['fechanac']);
    $edad = trim($_POST['edad']);
    $lugnaci = trim($_POST['lugnaci']);
    $estadociv = trim($_POST['estadcivil']);
    $discapacidad = trim($_POST['discapacidad']);
    $banco = trim($_POST['banco']);
    $cuenta = trim($_POST['cuenta']);
    $operadora = trim($_POST['operadora']);
    $tiposangre = trim($_POST['tiposangre']);
    $correoinst = trim($_POST['correoinst']);
    $correopers = trim($_POST['correopers']);
    $contemerg = trim($_POST['contemerg']);
    $parentesco = trim($_POST['parentesco']);
    $numero = trim($_POST['numero']);


    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO user (proyecto, nombre, apellido, genero, cedula, correo, telefono, ubicacion, password, rol)
    VALUES ('$proyecto', '$nombre', '$apellido', '$genero', '$cedula','$correo','$telefono', '$ubicacion','$password', '$servicio', '$fechaing', '$fechaingproy','$fechasalida','$titulotercernivel','$titulocuartonivel','$fechanac','$edad','$lugnaci','$estadociv','$discapacidad','$banco','$cuenta','$operadora','$tiposangre','$correoinst','$correopers','$contemerg','$parentesco','$numero' , '$rol' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/user.php');
  }
}









?>