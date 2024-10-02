<?php
include("model/roles.php");
$conexion = require("model/conexion.php");

$objRoles = new roles($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;


$roles = $objRoles->get($status);

if (!empty($action)) {
    switch ($action) {
        case 'ADD_ROL':
            $arrayValidaciones = [];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objRoles->insert($_POST['tipo_rol']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-roles.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_ROL':
            if (!empty($_POST['id_rol'])) {
                $id = $_POST['id_rol'];
                $respuesta = $objRoles->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-roles.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'RESTORE_ROL':
            if (!empty($_POST['id_rol'])) {
                $id = $_POST['id_rol'];
                $respuesta = $objRoles->restore($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-roles.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'DESTROY_ROL':
            if (!empty($_POST['id_rol'])) {
                $id = $_POST['id_rol'];
                $respuesta = $objRoles->destroy($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-roles-eliminados.php?status=eliminados");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
        case 'EDIT_ROL':
            $id = $_GET['id_rol'];
            $respuesta = $objRoles->edit($id, $_POST['new_tipo_rol']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-roles.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
