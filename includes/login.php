<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/stylelogin.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
</head>

<body>
    <div class="loginbox">
        <div id="login" >      
            <img src="css/img/usu.webp" alt="" class="avatar">
                <h1>Login</h1>
                <br>
                <form  action="_functions.php" method="POST">
                    <p>Usuario</p>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Usuario" required>
                    <p>Contraseña</p>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                    <input type="hidden" name="accion" value="acceso_user">
                    <input type="submit" value="Iniciar Sesión">
                    <a href="#">Olvido su contraseña</a><br>
                    <a href="#">No tiene una cuenta?</a>        
                </form>
        </div>
    </div>
</body>

</html>