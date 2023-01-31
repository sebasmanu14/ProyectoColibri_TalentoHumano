<?php
use PHPMailer\PHPMailer\{PHPMailer ,SMTP, Exception};

$conexion= mysqli_connect("localhost", "root", "", "r_user");

if(isset($_POST['registrar'])){

    if(strlen($_POST['proyecto']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 
     && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) ){

    $proyecto = trim($_POST['proyecto']);
    $nombre = trim($_POST['nombre']);
    $password = trim($_POST['password']);
    header('Location: ../views/user.php');
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

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';


$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;           
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';            
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '';                     
    $mail->Password   = '';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                        
    $mail->setFrom('', 'FUNDACIÓN COLIBRI');
    $mail->addAddress($correo, $nombre);     

    $mail->isHTML(true);
    $mail->Subject = 'Credenciales para iniciar sesion';
    $cuerpo = '<h4>Gracias por registrarse</h4>';
    $cuerpo .= '<p>Su usuario es: <br>'. $nombre .'</br> </p>
    <p>Su contraseña: <br>'. $password .'</br> </p>
    ';
    $mail->Body    = $cuerpo;

    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');
    $mail->send();
    header('Location: ../views/user.php');

} catch (Exception $e) {
    echo "Error al enviar el correo electronico de la compra : {$mail->ErrorInfo}";
    exit;
}
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header('Location: ../views/user.php');
}
  }
}

?>