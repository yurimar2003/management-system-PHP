<?php

class empleados
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    public function get($status)
    {
        return $this->conexion->query("SELECT * FROM `empleados` WHERE empleados.eliminado = '$status'");
    }

    public function insert($nombre, $apellido, $nacionalidad, $documento, $cargo, $fecha, $sexo, $direccion, $telefono)
    {

        return $this->conexion->query(" INSERT INTO `empleados`(`nombre`, `apellido`,`nacionalidad`, `documento_identidad`, `cargo`, `fecha_nacimiento`, `sexo`, `direccion`, `telefono`) VALUES ('$nombre','$apellido','$nacionalidad','$documento','$cargo','$fecha','$sexo','$direccion','$telefono')");
    }

    public function delete($idEmpleado)
    {
        return $this->conexion->query("UPDATE `empleados` SET empleados.eliminado = 1 WHERE empleados.id_empleado='$idEmpleado'");
    }

    public function destroy($idEmpleado)
    {
        return $this->conexion->query("DELETE FROM `empleados` WHERE `id_empleado`='$idEmpleado'");
    }

    public function restore($idEmpleado)
    {
        return $this->conexion->query("UPDATE `empleados` SET empleados.eliminado = 0 WHERE empleados.id_empleado ='$idEmpleado'");
    }

    public function edit($idEmpleado, $nombre, $apellido, $nacionalidad, $documento, $cargo, $fecha, $sexo, $direccion, $telefono)
    {
        
        return $this->conexion->query("UPDATE `empleados` SET `nombre`='$nombre',`apellido`='$apellido', `nacionalidad`='$nacionalidad',`documento_identidad`='$documento',`cargo`='$cargo',`fecha_nacimiento`='$fecha',`sexo`='$sexo',`direccion`='$direccion',`telefono`='$telefono' WHERE `id_empleado`=$idEmpleado");
    }

    public function validarExistenciaCedula($documento_identidad)
    {
        $existe = $this->conexion->query("SELECT * FROM `empleados` WHERE `documento_identidad`='$documento_identidad'");
        return !$existe->fetch_object() ? true : false;
    }
}
