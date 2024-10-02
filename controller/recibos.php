<?php
include("model/recibos.php");
include("utils/index.php");
$conexion = require("model/conexion.php");

$objRecibos = new recibos($conexion);
$objUtils = new utils();

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;


$recibos = $objRecibos->get($status);
$listPac = $objRecibos->listPac($status);
$listEmp = $objRecibos->listEmp($status);

if (!empty($action)) {
    switch ($action) {

        case 'ADD_RECIBO':
            $arrayValidaciones = [

                //"Ingrese una fecha valida" => $objUtils->validarFormatoFechaHora($_POST['fecha']),
                'El numero de recibo ya existe' => $objRecibos->validarExistenciaRecibo($_POST['numero_recibo']),
                'Costo del recibo es requerido' => !empty($_POST['precio']),
                'Costo del recibo no debe incluir letras,caracteres especiales ni mas de 10 digitos' => is_numeric($_POST['precio']) && strlen($_POST['precio']) < 10,
                'Concepto del recibo es requerido' => !empty($_POST['concepto']),

            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objRecibos->insert(
                $_POST['paciente'],
                $_POST['empleado'],
                $_POST['numero_recibo'],
                //$_POST['fecha'],
                $_POST['precio'],
                $_POST['concepto']
            );
            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-recibos.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;


        case 'DELETE_RECIBO':
            $respuesta = $objRecibos->delete(
                $_POST['id_recibo']
            );
            //echo($respuesta); die();
            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-recibos.php");
            } else {
                $error = 'borradoOcurrio un error intenten nuevamente';
            }
            break;

        case 'RESTORE_RECIBO':
            if (!empty($_POST['id_recibo'])) {
                $id = $_POST['id_recibo'];
                $respuesta = $objRecibos->restore($id);

                if ($respuesta) {
                    header("Location:/sistema-consultorio-deysy/show-recibos.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'DESTROY_RECIBO':
            if (!empty($_POST['id_recibo'])) {
                $id = $_POST['id_recibo'];
                $respuesta = $objRecibos->destroy($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-recibos-eliminados.php?status=eliminados");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_RECIBO':
            $arrayValidaciones = [

                'Numero de recibo es requerido' => !empty($_POST['new_numero_recibo']),
                'En el numero de recibo no debe incluir letras' => is_numeric($_POST['new_numero_recibo']),
                'El numero de recibo ya existe' => $_POST['num_hidden'] ==  $_POST['new_numero_recibo'] ? true : $objRecibos->validarExistenciaRecibo($_POST['new_numero_recibo']),
                //'Fecha del recibo es requerido' => !empty($_POST['new_fecha']),
                'Precio del recibo es requerido' => !empty($_POST['new_precio']),
                'El precio del recibo no debe incluir letras ni mas de 10 digitos' => is_numeric($_POST['new_precio']) && strlen($_POST['new_precio']) < 10,
                'Concepto del recibo es requerido' => !empty($_POST['new_concepto']),

            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_recibo'];
            $respuesta = $objRecibos->edit($id, $_POST['new_paciente'], $_POST['new_empleado'], $_POST['new_numero_recibo'], $_POST['new_fecha'], $_POST['new_precio'], $_POST['new_concepto']);

            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-recibos.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            break;
    }
}
