<?php

class recibos
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($status)
    {
        return $this->conexion->query("SELECT a.id_recibo, b.nombre, b.apellido, b.documento_identidad, b.direccion, c.cargo, a.numero_recibo, a.fecha, a.precio, a.concepto 
        FROM recibos a 
        INNER JOIN pacientes b 
        ON b.id_paciente=a.id_paciente 
        INNER JOIN empleados c 
        ON c.id_empleado=a.id_empleado 
        WHERE a.eliminado = '$status'");
    }

    public function listPac($status)
    {
        $query = ("SELECT * FROM pacientes WHERE pacientes.eliminado = '$status'");
        return $this->conexion->query($query);
    }

    public function listEmp($status)
    {
        $query = ("SELECT * FROM empleados WHERE empleados.eliminado = '$status'");
        return $this->conexion->query($query);
    }

    public function validarExistenciaRecibo($numero_recibo)
    {
        $existe = $this->conexion->query("SELECT * FROM `recibos` WHERE `numero_recibo`='$numero_recibo'");
        return !$existe->fetch_object() ? true : false;
    }

    public function insert($idPaciente, $idEmpleado, $numRecibo, $precio, $concepto)
    {
        return $this->conexion->query("INSERT INTO `recibos`(`id_paciente`, `id_empleado`, `numero_recibo`, `precio`, `concepto`) VALUES ('$idPaciente','$idEmpleado','$numRecibo','$precio','$concepto')");
    }

    public function delete($idRecibo)
    {
        //die("DELETE FROM `recibos` WHERE `id_recibo`=$idRecibo");
        return $this->conexion->query("UPDATE `recibos` SET recibos.eliminado = 1 WHERE recibos.id_recibo='$idRecibo'");
    }

    public function destroy($idRecibo)
    {
        return $this->conexion->query("DELETE FROM `recibos` WHERE `id_recibo`='$idRecibo'");
    }

    public function restore($idRecibo)
    {
        return $this->conexion->query("UPDATE `recibos` SET recibos.eliminado = 0 WHERE recibos.id_recibo ='$idRecibo'");
    }

    public function edit($idRecibo, $idPaciente, $idEmpleado, $numRecibo, $fecha, $precio, $concepto){
        //die("UPDATE `recibos` SET `id_paciente`='$idPaciente',`id_empleado`='$idEmpleado',`numero_recibo`='$numRecibo',`fecha`='$fecha',`precio`='$precio',`concepto`='$concepto' WHERE recibos.id_recibo = $idRecibo");
        return $this->conexion->query("UPDATE `recibos` SET `id_paciente`='$idPaciente',`id_empleado`='$idEmpleado',`numero_recibo`='$numRecibo',`fecha`='$fecha',`precio`='$precio',`concepto`='$concepto' WHERE recibos.id_recibo = $idRecibo");
    }
}
