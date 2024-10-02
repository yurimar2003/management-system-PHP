<?php
include("model/patologias.php");
include("utils/index.php");
$conexion = require("model/conexion.php");

$objPatologias = new patologias($conexion);
$objUtils = new utils();

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;


$patologias = $objPatologias->get($status);

if (!empty($action)) {
    switch ($action) {
        case 'ADD_PATOLOGIA':
            $arrayValidaciones = [
                'Nombre de la patologia es requerido y debe ser mayor a 2 digitos' => !empty($_POST['nombre']) && strlen($_POST['nombre']) > 2 && strlen($_POST['nombre']) < 50,
                'Descripcion de la patologia es requerido y debe ser mayor a 5 digitos' => !empty($_POST['descripcion']) && strlen($_POST['descripcion']) > 5,
                'El nombre de la patologia ya existe' => $objPatologias->validarExistenciaPatologia($_POST['nombre']),

            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objPatologias->insert($_POST['nombre'], $_POST['descripcion']);
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-patologias.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
        case 'DELETE_PATOLOGIA':
            if (!empty($_POST['id_patologia'])) {
                $id = $_POST['id_patologia'];
                $respuesta = $objPatologias->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-patologias.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }
            break;

        case 'RESTORE_PATOLOGIA':
            if (!empty($_POST['id_patologia'])) {
                $id = $_POST['id_patologia'];
                $respuesta = $objPatologias->restore($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-patologias.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'DESTROY_PATOLOGIA':
            if (!empty($_POST['id_patologia'])) {
                $id = $_POST['id_patologia'];
                $respuesta = $objPatologias->destroy($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-patologias-eliminados.php?status=eliminados");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case "EDIT_PATOLOGIA":

            $arrayValidaciones = [
                'Nombre de la patologia es requerido y debe ser mayor a 2 digitos' => !empty($_POST['new_nombre']) && strlen($_POST['new_nombre']) > 2 && strlen($_POST['new_nombre']) < 50,
                'Descripcion de la patologia es requerido y debe ser mayor a 5 digitos' => !empty($_POST['new_descripcion']) && strlen($_POST['new_descripcion']) > 5,
                'El nombre de la patologia ya existe' => $_POST['hidden_nombre'] ==  $_POST['new_nombre'] ? true : $objPatologias->validarExistenciaPatologia($_POST['new_nombre']),
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_patologia'];
            $respuesta = $objPatologias->edit($id, $_POST['new_nombre'], $_POST['new_descripcion']);

            // revisamos la respuesta de la base de datos
            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-patologias.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

    }
}
