<?php
include("model/antecedentes.php");
$conexion = require("model/conexion.php");

$objAntecedentes = new antecedentes($conexion);

$error = '';
$action = empty($_REQUEST['accion']) ? '' : $_REQUEST['accion'];
$status = empty($_REQUEST['status']) ? 0 : 1;
$idPaciente = empty($_REQUEST['id_paciente']) ? '' : $_REQUEST['id_paciente'];

/* $antecedentes = $objAntecedentes->get($idPaciente); */
$idAntecedente = $_GET['id_antecedente'];
if ($idPaciente) {
    $antecedentes = $objAntecedentes->get($idPaciente, $status);
};

$show = $objAntecedentes->show($status);
$listPatologias = $objAntecedentes->listPat($status);


if (!empty($action)) {
    switch ($action) {
        case 'ADD_ANTECEDENTE':
            $arrayValidaciones = [
                /* FALTA VALIDAR FECHA */
                'Fecha del antecedente es requerido' => !empty($_POST['fecha']),
                "Ingrese una fecha valida" => $objUtils->validarFormatoFecha($_POST['fecha']),
                'El campo padece es requerido y debe ser mayor a 3 digitos' => !empty($_POST['padece']) && strlen($_POST['padece']) > 3,
                'El campo padece no permite números ni carateres especiales' => $objUtils->validarString($_POST['padece']),
            ];

            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $id = $_GET['id_paciente'];
            $respuesta = $objAntecedentes->insert($id, $_POST['patologia'], $_POST['fecha'], $_POST['padece']);
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-antecedentes.php?id_paciente=" . $_POST['id_paciente']);
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_ANTECEDENTE':

            if (!empty($_POST['id_antecedente'])) {
                $idAntecedente = $_POST['id_antecedente'];
                $respuesta = $objAntecedentes->delete($idAntecedente);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-antecedentes.php?id_paciente=" . $_GET['id_paciente']);
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'RESTORE_ANTECEDENTE':
            if (!empty($_POST['id_antecedente'])) {
                $id = $_POST['id_antecedente'];
                $respuesta = $objAntecedentes->restore($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-antecedentes.php?id_paciente=" . $_GET['id_paciente']);
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'DESTROY_ANTECEDENTE':
            if (!empty($_POST['id_antecedente'])) {
                $id = $_POST['id_antecedente'];
                $respuesta = $objAntecedentes->destroy($id);

                if ($respuesta) {
                    header("Location: /sistema-consultorio-deysy/show-table-antecedentes-eliminados.php?status=eliminados");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_ANTECEDENTE':
            $arrayValidaciones = [
                'Fecha del antecedente es requerido' => !empty($_POST['new_fecha']),
                "Ingrese una fecha valida" => $objUtils->validarFormatoFecha($_POST['new_fecha']),
                'El campo padece es requerido y debe ser mayor a 3 digitos' => !empty($_POST['new_padece']) && strlen($_POST['new_padece']) > 3,
                'El campo padece no permite números ni carateres especiales' => $objUtils->validarString($_POST['new_padece']),

            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            //die(var_dump($_POST));
            $id_antecedente = $_GET['id_antecedente'];
            $idPaciente = $_POST['id_paciente'];
            $respuesta = $objAntecedentes->edit($id_antecedente, $idPaciente, $_POST['id_patologia'], $_POST['new_fecha'], $_POST['new_padece']);
            //die(var_dump($respuesta));
            if ($respuesta) {
                header("Location: /sistema-consultorio-deysy/show-antecedentes.php?id_paciente=" . $_POST['id_paciente']);
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }

            break;
    }
}
