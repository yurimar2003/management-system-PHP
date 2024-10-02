<?php

class pacientes
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($status)
    {
        return $this->conexion->query("SELECT * FROM `pacientes` WHERE pacientes.eliminado = '$status' ORDER BY pacientes.nombre ASC  ");
    }

    public function insert($nombre, $apellido, $nacionalidad, $documento_identidad, $fecha_nacimiento, $telefono, $sexo, $direccion, $numero_paciente)
    {
        return $this->conexion->query("INSERT INTO `pacientes`(`nombre`, `apellido`, `nacionalidad`, `documento_identidad`, `fecha_nacimiento`, `telefono`, `sexo`, `direccion`, `numero_paciente`) VALUES ('$nombre','$apellido','$nacionalidad','$documento_identidad','$fecha_nacimiento','$telefono','$sexo','$direccion','$numero_paciente')");
    }

    public function destroy($idPaciente)
    {
        return $this->conexion->query("DELETE FROM `pacientes` WHERE `id_paciente`='$idPaciente'");
    }

    public function delete($idPaciente)
    {
        return $this->conexion->query("UPDATE `pacientes` SET pacientes.eliminado = 1 WHERE pacientes.id_paciente='$idPaciente'");
    }

    public function restore($idPaciente)
    {

        return $this->conexion->query("UPDATE `pacientes` SET pacientes.eliminado = 0 WHERE pacientes.id_paciente ='$idPaciente'");
    }

    public function edit($idPaciente, $new_nombre, $new_apellido, $new_nacionalidad, $new_documento_identidad, $new_fecha_nacimiento, $new_telefono, $new_sexo, $new_direccion, $new_numero)
    {
        return $this->conexion->query("UPDATE `pacientes` SET id_paciente ='$idPaciente', nombre ='$new_nombre', apellido ='$new_apellido', nacionalidad ='$new_nacionalidad', documento_identidad ='$new_documento_identidad', fecha_nacimiento ='$new_fecha_nacimiento', telefono ='$new_telefono', sexo ='$new_sexo', direccion ='$new_direccion', numero_paciente = '$new_numero' WHERE pacientes.id_paciente ='$idPaciente'");
    }

    public function validarExistenciaCedula($documento_identidad)
    {
        $existe = $this->conexion->query("SELECT * FROM `pacientes` WHERE `documento_identidad`='$documento_identidad'");
        return !$existe->fetch_object() ? true : false;
    }

    public function validarExistenciaNumeroPaciente($numero_paciente)
    {
        $existe = $this->conexion->query("SELECT * FROM `pacientes` WHERE `numero_paciente`='$numero_paciente'");
        return !$existe->fetch_object() ? true : false;
    }
}
