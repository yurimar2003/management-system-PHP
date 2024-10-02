<?php
include("model/empleados.php");
include("utils/index.php");
$conexion = require("model/conexion.php");

$objEmpleados = new empleados($conexion);
$objUtils = new utils();


$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;


$empleados = $objEmpleados->get($status);

if (!empty($action)) {
    switch ($action) {
        case 'ADD_EMPLEADO':
            $arrayValidaciones = [
                'Nombre del empleado es requerido y debe ser mayor a 2 digitos' => !empty($_POST['nombre']) && strlen($_POST['nombre']) > 2,
                'El nombre del empleado no permite números ni carateres especiales' => $objUtils->validarString($_POST['nombre']),
                'Apellido del empleado es requerido y debe ser mayor a 2 digitos' => !empty($_POST['apellido']) && strlen($_POST['apellido']) > 2,
                'El apellido del empleado no permite números ni carateres especiales' => $objUtils->validarString($_POST['apellido']),
                'Nacionalidad del empleado es requerido' => !empty($_POST['nacionalidad']),
                'El documento de identidad del empleado es requerido' => !empty($_POST['identidad']),
                'El documento del empleado no debe incluir letras ni caracteres especiales' => is_numeric($_POST['identidad']),
                'Debe ser el documento de identidad mayor de 7 digitos y menor a 15' => strlen($_POST['identidad']) > 7 && strlen($_POST['identidad']) < 15,
                'El documento de identidad ya pertenece a un empleado' => $objEmpleados->validarExistenciaCedula($_POST['identidad']),
                'El cargo del empleado es requerido' => !empty($_POST['cargo']),
                'La fecha de nacimiento del empleado es requerido' => !empty($_POST['fecha_nacimiento']),
                "Ingrese una fecha valida" => $objUtils->validarFormatoFecha($_POST['fecha_nacimiento']),
                'El sexo del empleado es requerido' => !empty($_POST['sexo']),
                'La direccion del empleado es requerido' => !empty($_POST['direccion']),
                'La dirección del empleado debe de tener mas de 3 caracteres' => strlen($_POST['direccion']) > 3,
                'El número de telefono del empleado es requerido y no debe incluir letras' => !empty($_POST['telefono']) && is_numeric($_POST['telefono']),
                'Ingrese un número de teléfono valido' => strlen($_POST['telefono']) > 9 && strlen($_POST['telefono']) < 20,

            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objEmpleados->insert($_POST['nombre'], $_POST['apellido'], $_POST['nacionalidad'], $_POST['identidad'], $_POST['cargo'], $_POST['fecha_nacimiento'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-empleados.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
        case 'DELETE_EMPLEADO':
            if (!empty($_POST['id_empleado'])) {
                $id = $_POST['id_empleado'];
                $respuesta = $objEmpleados->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-empleados.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }
            break;

        case 'RESTORE_EMPLEADO':
            if (!empty($_POST['id_empleado'])) {
                $id = $_POST['id_empleado'];
                $respuesta = $objEmpleados->restore($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-empleados.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

            case 'DESTROY_EMPLEADO':
                if (!empty($_POST['id_empleado'])) {
                    $id = $_POST['id_empleado'];
                    $respuesta = $objEmpleados->destroy($id);
    
                    if ($respuesta) {
                        header("Location: /sistema-consultorio-deysy/show-table-empleados-eliminados.php?status=eliminados");
                    } else {
                        $error = 'Ocurrio un error intenten nuevamente';
                    }
                }
    
                break;

        case 'EDIT_EMPLEADO':
            $arrayValidaciones = [
                'Nombre del empleado es requerido y debe ser mayor a 2 digitos' => !empty($_POST['new_nombre']) && strlen($_POST['new_nombre']) > 2,
                'El nombre del empleado no permite números ni carateres especiales' => $objUtils->validarString($_POST['new_nombre']),
                'Apellido del empleado es requerido y debe ser mayor a 2 digitos' => !empty($_POST['new_apellido']) && strlen($_POST['new_apellido']) > 2,
                'El apellido del empleado no permite números ni carateres especiales' => $objUtils->validarString($_POST['new_apellido']),
                'El documento de identidad del empleado es requerido' => !empty($_POST['new_documento_identidad']),
                'El documento del empleado no debe incluir letras' => is_numeric($_POST['new_documento_identidad']),
                'Debe ser el documento de identidad mayor de 7 digitos y menor a 15' => strlen($_POST['new_documento_identidad']) > 7 && strlen($_POST['new_documento_identidad']) < 15,
                'El documento de identidad ya pertenece a un empleado' => $_POST['id_empleado'] ==  $_POST['new_documento_identidad'] ? true : $objEmpleados->validarExistenciaCedula($_POST['new_documento_identidad']),

                'La fecha de nacimiento del empleado es requerido' => !empty($_POST['new_fecha_nacimiento']),
                "Ingrese una fecha valida" => $objUtils->validarFormatoFecha($_POST['new_fecha_nacimiento']),
                'La direccion del empleado es requerido' => !empty($_POST['new_direccion']),
                'La dirección del empleado debe de tener mas de 3 caracteres' => strlen($_POST['new_direccion']) > 3,
                'El número de telefono del empleado es requerido y no debe incluir letras' => !empty($_POST['new_telefono']) && is_numeric($_POST['new_telefono']),
                'Ingrese un número de teléfono valido' => strlen($_POST['new_telefono']) > 9 && strlen($_POST['new_telefono']) < 20,


                'El documento de identidad ya pertenece a un empleado' => $_POST['id_empleado'] ==  $_POST['new_documento_identidad'] ? true : $objEmpleados->validarExistenciaCedula($_POST['new_documento_identidad']),

            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            // aqui editamos en la base de datos
            $id = $_GET['id_empleado'];
            $respuesta = $objEmpleados->edit($id, $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_nacionalidad'],  $_POST['new_documento_identidad'], $_POST['new_cargo'], $_POST['new_fecha_nacimiento'], $_POST['new_sexo'], $_POST['new_direccion'], $_POST['new_telefono']);
            // revisamos la respuesta de la base de datos
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-empleados.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;
    }
}
