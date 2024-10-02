<?php

require_once "model/conexion.php";
include("model/usuarios.php");

session_start();
if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    /*  ruta para cerrar */
    /*  http://localhost/sistema-consultorio-deysy/index.php?cerrar_sesion=1 */
    /* echo ('cerrado'); */
}
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {

        case 1:
            header('Location: /sistema-consultorio-deysy/show-home.php');

            break;

        case 2:
            header('Location: /sistema-consultorio-deysy/show-home-editor.php');
            break;


        case 3:
            header('Location: /sistema-consultorio-deysy/show-home-lector.php');
            break;
    }
}

$email_err='';
$password_err='';

if (empty($_POST['correo'])) {
    $correo = null;
    $contrasena = null;
} else {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
}

$status = empty($_REQUEST['status']) ? 0 : 1;

$objUsuarios = new usuarios($conexion);
$querys = $objUsuarios->getLogin($status, $correo);

if (isset($_POST['correo']) && isset($contrasena)) {

    $datausuario = $querys->fetch_object();

    if (empty($datausuario)) {
        $email_err='Ingrese un correo valido';
    } else {
        $contrasebd = $datausuario->contrasena;
        if (password_verify($_POST['contrasena'], $contrasebd)) {
            //obtengo el rol de la data del usuario
            $rol = $datausuario->id_rol;
            if ($rol == true) {
    
                $_SESSION['rol'] = $rol;
    
                switch ($_SESSION['rol']) {
    
                    case 1:
                        header('Location: /sistema-consultorio-deysy/show-home.php');
    
                        break;
    
                    case 2:
                        header('Location: /sistema-consultorio-deysy/show-home-editor.php');
                        break;
    
    
                    case 3:
                        header('Location: /sistema-consultorio-deysy/show-home-lector.php');
                        break;
                }
    }
        } else {
            
            $password_err='Ingrese una contrasena valida';
        }
  
}}



























/* $rol = $row[4];
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
} */