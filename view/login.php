<?php
    
    include("controller/code-login.php");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/estilos.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>

    <div class="container-all">

        <div class="ctn-form">
            <img src="src/images/corazon.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>

            <form  action="#" method="POST">

                <label for="">Email</label>
                <input type="text" name="correo">
                 <span class="msg-error"><?php echo $email_err; ?></span>
                <label for="">Contraseña</label>
                <input type="password" name="contrasena">
                <span class="msg-error"><?php echo $password_err; ?></span>
 
                <input type="submit" value="Iniciar">

            </form>


        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">Sistema del Consultorio Deysy ¡Bienvenido!</h1>
            <p class="text-description">Puedes iniciar sesion solo si ya fuiste registrado por la Dra. Deysy Jara</p>
        </div>

    </div>

</body>

</html>