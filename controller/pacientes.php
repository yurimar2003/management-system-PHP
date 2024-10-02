<?php
include("model/pacientes.php");
include("utils/index.php");
$conexion = require("model/conexion.php");

$objPacientes = new pacientes($conexion);
$objUtils = new utils();


$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;

$pacientes = $objPacientes->get($status);

if (!empty($action)) {
    switch ($action) {
        case 'ADD_PACIENTE':
            $arrayValidaciones = [
                /*                 'Debe ser el documento de identidad  mayor de 7 digitos y menos a 20 digitos' => strlen($_POST['doc_ide']) > 7 && strlen($_POST['doc_ide']) < 20 ,
 */
                'El nombre del paciente es requerido y debe ser mayor a 2 digitos' => !empty($_POST['nombre']) && strlen($_POST['nombre']) > 2,
                'El nombre del paciente no permite números ni carateres especiales' => $objUtils->validarString($_POST['nombre']),
                'El apellido del paciente es requerido y debe ser mayor a 2 digitos ' => !empty($_POST['apellido']) && strlen($_POST['apellido']) > 2,
                'El apellido del paciente no permite números ni carateres especiales' => $objUtils->validarString($_POST['apellido']),
                'Nacionalidad del paciente es requerido' => !empty($_POST['nacionalidad']),
                'Documento de identidad del paciente es requerido' => !empty($_POST['doc_ide']),
                'En el documento de identidad del paciente no debe incluir letras' => is_numeric($_POST['doc_ide']),
                'El documento de identidad ya pertenece a un paciente' => $objPacientes->validarExistenciaCedula($_POST['doc_ide']),
                'Debe ser el documento de identidad mayor de 7 digitos y menor a 15' => strlen($_POST['doc_ide']) > 7 && strlen($_POST['doc_ide']) < 15,
                'Fecha de nacimiento del paciente es requerido' => !empty($_POST['fec_nac']),
                "Ingrese una fecha valida" => $objUtils->validarFormatoFecha($_POST['fec_nac']),
                'Número teléfono del paciente es requerido y no debe incluir letras' => !empty($_POST['telefono']) && is_numeric($_POST['telefono']),
                'Ingrese un número de teléfono valido' => strlen($_POST['telefono']) > 9 && strlen($_POST['telefono']) < 20,
                'Sexo del paciente es requerido' => !empty($_POST['sexo']),
                'Dirección del paciente es requerido' => !empty($_POST['direccion']),
                'La dirección del paciente debe de tener mas de 3 caracteres' => strlen($_POST['direccion']) > 3,
                'Número del paciente es requerido y no debe incluir letras' => !empty($_POST['numero_paciente']) && is_numeric($_POST['numero_paciente']),
                'Número de paciente ya existe' => $objPacientes->validarExistenciaNumeroPaciente($_POST['numero_paciente']),
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objPacientes->insert($_POST['nombre'], $_POST['apellido'], $_POST['nacionalidad'], $_POST['doc_ide'], $_POST['fec_nac'], $_POST['telefono'], $_POST['sexo'], $_POST['direccion'], $_POST['numero_paciente']);

            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-table-pacientes.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_PACIENTE':
            if (!empty($_POST['id_paciente'])) {
                $id = $_POST['id_paciente'];
                $respuesta = $objPacientes->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-pacientes.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
        case 'RESTORE_PACIENTE':
            if (!empty($_POST['id_paciente'])) {
                $id = $_POST['id_paciente'];
                $respuesta = $objPacientes->restore($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-pacientes.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
        case 'DESTROY_PACIENTE':
            if (!empty($_POST['id_paciente'])) {
                $id = $_POST['id_paciente'];
                $respuesta = $objPacientes->destroy($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-pacientes-eliminados.php?status=eliminados");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_PACIENTE':

            /* die(var_dump($_REQUEST)); */
            $arrayValidaciones = [
                'El nombre del paciente es requerido y debe ser mayor a 2 digitos' => !empty($_POST['new_nombre']) && strlen($_POST['new_nombre']) > 2,
                'El nombre del paciente no permite números ni carateres especiales' => $objUtils->validarString($_POST['new_nombre']),
                'El apellido del paciente es requerido y debe ser mayor a 2 digitos ' => !empty($_POST['new_apellido']) && strlen($_POST['new_apellido']) > 2,
                'El apellido del paciente no permite números ni carateres especiales' => $objUtils->validarString($_POST['new_apellido']),
                'Nacionalidad del paciente es requerido' => !empty($_POST['new_nacionalidad']),
                'Documento de identidad del paciente es requerido' => !empty($_POST['new_doc_ide']),
                'En el documento de identidad del paciente no debe incluir letras' => is_numeric($_POST['new_doc_ide']),
                'El documento de identidad ya pertenece a un paciente' => $_POST['doc_hidden'] ==  $_POST['new_doc_ide'] ? true : $objPacientes->validarExistenciaCedula($_POST['new_doc_ide']),
                'Debe ser el documento de identidad mayor de 7 digitos y menor a 15' => strlen($_POST['new_doc_ide']) > 7 && strlen($_POST['new_doc_ide']) < 15,
                'Fecha de nacimiento del paciente es requerido' => !empty($_POST['new_fec_nac']),
                "Ingrese una fecha valida" => $objUtils->validarFormatoFecha($_POST['new_fec_nac']),
                'Número teléfono del paciente es requerido' => !empty($_POST['new_telefono']),
                'El número de teléfono del paciente no debe incluir letras' => is_numeric($_POST['new_telefono']),
                'El número de teléfono del paciente debe ser mayor de 9 digitos' => strlen($_POST['new_telefono']) > 9 && strlen($_POST['new_telefono']) < 20,
                'Sexo del paciente es requerido' => !empty($_POST['new_sexo']),
                'Dirección del paciente es requerido' => !empty($_POST['new_direccion']),
                'La dirección del paciente debe de tener mas de 3 caracteres' => strlen($_POST['new_direccion']) > 3,
                'Número del paciente es requerido y no debe incluir letras' => !empty($_POST['new_numero']) && is_numeric($_POST['new_numero']),
                'El número de paciente ya existe' => $_POST['num_hidden'] ==  $_POST['new_numero'] ? true : $objPacientes->validarExistenciaNumeroPaciente($_POST['new_numero']),


            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_paciente'];
            $respuesta = $objPacientes->edit($id, $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_nacionalidad'], $_POST['new_doc_ide'], $_POST['new_fec_nac'], $_POST['new_telefono'], $_POST['new_sexo'], $_POST['new_direccion'], $_POST['new_numero']);

            if ($respuesta) {
                header("Location:/sistema-consultorio-deysy/show-table-pacientes.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            break;
    }
}
