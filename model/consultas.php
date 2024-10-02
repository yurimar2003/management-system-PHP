<?php

class consultas
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($idPaciente,$status)
    {
        return $this->conexion->query("SELECT * FROM consultas WHERE id_paciente = '$idPaciente'
        AND  consultas.eliminado = '$status' 
        ORDER BY consultas.fecha_consulta DESC");
    }

    public function show($status)
    {
        return $this->conexion->query("SELECT * FROM consultas WHERE consultas.eliminado = '$status'");
    }

    public function insert($idPaciente, $peso, $unidadPeso, $talla, $unidadTalla, $tension, $diagnostico, $tratamiento, $proxCon)
    {
        return $this->conexion->query("INSERT INTO `consultas`(`id_paciente`, `peso`, `unidad_peso`, `talla`, `unidad_talla`,`presion_arterial`, `diagnostico`, `tratamiento`, `proxima_consulta`) VALUES ('$idPaciente','$peso','$unidadPeso','$talla',' $unidadTalla','$tension','$diagnostico','$tratamiento','$proxCon')");
    }

    public function delete($idConsulta)
    {
        return $this->conexion->query("UPDATE `consultas` SET consultas.eliminado = 1 WHERE consultas.id_consulta='$idConsulta'");
    }

    public function destroy($idConsulta)
    {
        return $this->conexion->query("DELETE FROM `consultas` WHERE `id_consulta`='$idConsulta'");
    }

    public function restore($idConsulta)
    {
        return $this->conexion->query("UPDATE `consultas` SET consultas.eliminado = 0 WHERE consultas.id_consulta ='$idConsulta'");
    }

    public function edit($idConsulta, $fecha_consulta, $peso, $unidad_peso, $talla, $unidad_talla, $presion_arterial, $diagnostico, $tratamiento, $proxima_consulta)
    {
        return $this->conexion->query("UPDATE `consultas` SET `fecha_consulta`='$fecha_consulta',`peso`='$peso',
        `unidad_peso`='$unidad_peso',`talla`='$talla',`unidad_talla`='$unidad_talla',`presion_arterial`='$presion_arterial',`diagnostico`='$diagnostico',`tratamiento`='$tratamiento',`proxima_consulta`='$proxima_consulta' WHERE consultas.id_consulta = '$idConsulta'");
    }

    public function validarExistenciaFechaHora($Fecha)
    {
        $existe = $this->conexion->query("SELECT * FROM `consultas` WHERE `fecha_consulta`='$Fecha'");
        return !$existe->fetch_object() ? true : false;
    }

    
}
