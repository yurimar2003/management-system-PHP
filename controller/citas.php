<?php
include("model/citas.php");
include("utils/index.php");
$conexion = require("model/conexion.php");

$objCitas = new citas($conexion);
$objUtils = new utils();

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;

$citas = $objCitas->get($status);

if (!empty($action)) {
    switch ($action) {
        case 'ADD_CITA':
            $arrayValidaciones = [
                 /* "Validacion de fecha" => $objUtils->validarFormatoFecha($_POST['fec_nac']), */
        

                'La dirección del paciente es requerido' => !empty($_POST['direccion']),
                //'La dirección del paciente no debe incluir números ni carateres especiales' => $objUtils->validarString($_POST['direccion']),
                'Ingrese una dirección valida' => strlen($_POST['direccion']) > 3,
                'La fecha y hora es requerido' => !empty($_POST['fecha_hora']),
                'La fecha y hora de la cita ya esta ocupada' => $objCitas->validarExistenciaFecha($_POST['fecha_hora']),
                'El nombre del responsable es requerido' => !empty($_POST['nombre_responsable']),
                'El nombre del responsable no debe incluir números ni carateres especiales' => $objUtils->validarString($_POST['nombre_responsable']),
                'Ingrese un nombre del responsable valido' => strlen($_POST['nombre_responsable']) > 2  && strlen($_POST['nombre_responsable']) < 20,
                'El número del responsable es requerido' => !empty($_POST['numero_responsable']),
                'El número del responsable no debe incluir letras' => is_numeric($_POST['numero_responsable']),
                'Ingrese un número del responsable valido' => strlen($_POST['numero_responsable']) > 9 && strlen($_POST['numero_responsable']) < 20,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objCitas->insert(($_POST['direccion']), $_POST['fecha_hora'],  $_POST['nombre_responsable'], $_POST['numero_responsable']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-citas.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_CITA':
            if (!empty($_POST['id_cita'])) {
                $id = $_POST['id_cita'];
                $respuesta = $objCitas->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-citas.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

            case 'RESTORE_CITA':
                if (!empty($_POST['id_cita'])) {
                    $id = $_POST['id_cita'];
                    $respuesta = $objCitas->restore($id);
    
                    if ($respuesta) {
                        header("Location: /sistema-consultorio-deysy/show-citas.php");
                    } else {
                        $error = 'Ocurrio un error intenten nuevamente';
                    }
                }
    
                break;

            case 'DESTROY_CITA':
                if (!empty($_POST['id_cita'])) {
                    $id = $_POST['id_cita'];
                    $respuesta = $objCitas->destroy($id);
    
                    if ($respuesta) {
                        header("Location: /sistema-consultorio-deysy/show-table-citas-eliminados.php");
                    } else {
                        $error = 'Ocurrio un error intenten nuevamente';
                    }
                }
    
                break;

        case 'EDIT_CITA':
            //die(var_dump($_REQUEST));
            $arrayValidaciones = [

                'La dirección del paciente es requerido' => !empty($_POST['new_direccion']),
                //'La dirección del paciente no debe incluir números ni carateres especiales' => $objUtils->validarString($_POST['new_direccion']),
                'Ingrese una dirección valida' => strlen($_POST['new_direccion']) > 3,
                'La fecha y hora es requerido' => !empty($_POST['new_fecha']),
                //'La fecha y hora de la cita ya esta ocupada' => $_POST['fecha_hidden'] ==  $_POST['new_fecha'] ? true : $objCitas->validarExistenciaFecha($_POST['new_fecha']),
                'El nombre del responsable es requerido' => !empty($_POST['new_nombre']),
                'El nombre del responsable no debe incluir números ni carateres especiales' => $objUtils->validarString($_POST['new_nombre']),
                'Ingrese un nombre del responsable valido' => strlen($_POST['new_nombre']) > 2 && strlen($_POST['new_nombre']) < 20,
                'El número del responsable es requerido' => !empty($_POST['new_numero']),
                'El número del responsable no debe incluir letras' => is_numeric($_POST['new_numero']),
                'Ingrese un número del responsable valido' => strlen($_POST['new_numero']) > 8 && strlen($_POST['new_numero']) < 20,

            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            
            $id = $_GET['id_cita'];
            $respuesta = $objCitas->edit($id, $_POST['new_direccion'], $_POST['new_fecha'], $_POST['new_nombre'], $_POST['new_numero']);
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-citas.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
