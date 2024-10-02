<?php

class antecedentes
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($idPaciente, $status)
    {
        return $this->conexion->query("SELECT a.id_antecedente, b.nombre_patologia, a.fecha, a.padece, a.id_paciente
        FROM antecedentes a INNER JOIN patologias b ON b.id_patologia=a.id_patologia
        WHERE id_paciente = '$idPaciente' AND a.eliminado = '$status'");
    }

    public function show($status)
    {
        return $this->conexion->query("SELECT a.id_antecedente, b.nombre_patologia, a.fecha, a.padece, a.id_paciente, c.nombre
        FROM antecedentes a
        INNER JOIN patologias b ON b.id_patologia=a.id_patologia
        INNER JOIN pacientes c ON c.id_paciente=a.id_paciente 
        WHERE a.eliminado = '$status'");

    }

    public function listPat($status)
    {

        $query = ("SELECT * FROM patologias WHERE patologias.eliminado= '$status'");

        return $this->conexion->query($query);
    }

    public function insert($idPaciente, $idPatologia, $fecha, $padece)
    {
        return $this->conexion->query("INSERT INTO `antecedentes`(`id_paciente`,`id_patologia`, `fecha`, `padece`) VALUES ('$idPaciente','$idPatologia','$fecha','$padece')");
    }

    public function delete($idAntecedente)
    {
        return $this->conexion->query("UPDATE `antecedentes` SET antecedentes.eliminado = 1 WHERE antecedentes.id_antecedente='$idAntecedente'");
    }

    public function destroy($idAntecedente)
    {
        return $this->conexion->query("DELETE FROM `antecedentes` WHERE `id_antecedente`='$idAntecedente'");
    }
    
    public function restore($idAntecedente)
    {
        return $this->conexion->query("UPDATE `antecedentes` SET antecedentes.eliminado = 0 WHERE antecedentes.id_antecedente ='$idAntecedente'");
    }

    public function edit($idAntecedente, $idPaciente, $idPatologia, $fecha, $padece)
    {
        return $this->conexion->query("UPDATE `antecedentes` SET `id_antecedente`='$idAntecedente',`id_paciente`='$idPaciente',`id_patologia`='$idPatologia',`fecha`='$fecha',`padece`='$padece' WHERE antecedentes.id_antecedente = $idAntecedente");
    } 
}
