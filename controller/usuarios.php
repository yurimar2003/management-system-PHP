<?php
include("model/usuarios.php");
$conexion = require("model/conexion.php");

$objUsuarios = new usuarios($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;


$usuarios = $objUsuarios->get($status);
$listEmp = $objUsuarios->listEmp($status);
$listRol = $objUsuarios->listRol($status);

if (!empty($action)) {
    switch ($action) {
        case 'ADD_USUARIO':
            $arrayValidaciones = [

                'El correo es requerido' => !empty($_POST['correo']),
                'Ingrese un correo menor a 50 digitos' => strlen($_POST['correo']) < 50,
                'La contraseña es requerida' => !empty($_POST['contrasena']),
                'Ingrese una contraseña menor a 20 digitos' => strlen($_POST['contrasena']) < 20,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };

            $empleado = $_POST['empleado'];
            $rol = $_POST['rol'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $respuesta = $objUsuarios->insert($empleado, $rol, $correo, $contrasena);

            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-usuarios.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_USUARIO':
            if (!empty($_POST['id_usuario'])) {
                $id = $_POST['id_usuario'];
                $respuesta = $objUsuarios->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-usuarios.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }
            break;

        case 'RESTORE_USUARIO':
            if (!empty($_POST['id_usuario'])) {
                $id = $_POST['id_usuario'];
                $respuesta = $objUsuarios->restore($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-usuarios.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'DESTROY_USUARIO':
            if (!empty($_POST['id_usuario'])) {
                $id = $_POST['id_usuario'];
                $respuesta = $objUsuarios->destroy($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-usuarios-eliminados.php?status=eliminados");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_USUARIO':
            $arrayValidaciones = [

                'El correo es requerido' => !empty($_POST['new_correo']),
                'Ingrese un correo menor a 50 digitos' => strlen($_POST['new_correo']) < 50,
                'La contraseña es requerida' => !empty($_POST['new_contrasena']),
                'Ingrese una contraseña menor a 20 digitos' => strlen($_POST['new_contrasena']) < 20,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_usuario'];
            $clave = empty($_POST['new_contrasena']) ? $_POST['current_pass'] : password_hash($_POST['new_contrasena'], PASSWORD_DEFAULT);
            $respuesta = $objUsuarios->edit($id, $_POST['new_empleado'], $_POST['new_rol'], $_POST['new_correo'], $clave);
            //die(var_dump());
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-usuarios.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
