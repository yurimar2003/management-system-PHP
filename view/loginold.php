<?php
include("../model/usuarios.php");
$conexion = require("../model/conexion.php");

/* session_start();
if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
}
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {

        case 1:
            header('location: sidebar.php');
            break;

        case 2:
            header('location: sidebar.php');
            break;


        case 3:
            header('location: sidebar.php');
            break;
    }
}*/


$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$status = empty($_REQUEST['status']) ? 0 : 1;

$objUsuarios = new usuarios($conexion);
$querys = $objUsuarios->getLogin($status,$correo);

if (isset($correo) && isset($contrasena)) {

    $usuario = $querys->fetch_object();
    $contrasebd= $usuario->contrasena;

if (password_verify($contrasena, $contrasebd)) {
    die('si');
} else {
    die('no');
}


    if ($row == true) {

        $rol = $row[3];
        $_SESSION['rol'] = $rol;

        switch ($_SESSION['rol']) {

            case 1:
                header('location: sidebar.php');
                break;

            case 2:
                header('location: sidebar.php');
                break;


            case 3:
                header('location: sidebar.php');
                break;
        }
    } else {

        echo "El usuario o contraseña son incorrectos";
    }
}

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
            <img src="src/images/logo-big.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>

            <form  action="#" method="POST">

                <label for="">Email</label>
                <input type="text" name="correo">
<!--                 <span class="msg-error"><?php echo $email_err; ?></span>
 -->                <label for="">Contraseña</label>
                <input type="password" name="contrasena">
<!--                 <span class="msg-error"><?php echo $password_err; ?></span>
 -->
                <input type="submit" value="Iniciar">

            </form>

            <span class="text-footer">¿Aún no te has registrado?
                <a href="show-register.php">Registrate</a>
            </span>
        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">Sistema de panificadora bienvenido.</h1>
            <p class="text-description">Ingresa </p>
        </div>

    </div>

</body>

</html>


















?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="#" method="POST">
        Correo: <br /><input type="text" name="correo"><br />
        contraseña: <br /><input type="text" name="contrasena"><br />
        <input type="submit" value="Iniciar sesion ">
    </form>
</body>

</html>
