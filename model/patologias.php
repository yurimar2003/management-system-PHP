<?php

class patologias
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($status)
    {
        return $this->conexion->query("SELECT * FROM `patologias` WHERE patologias.eliminado = '$status'");
    }

    public function insert($nombre, $descripcion,)
    {
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO `patologias`(`nombre_patologia`, `descripcion`) VALUES ('$nombre','$descripcion')");
        return $respuestaBaseDeDatos;

        return $this->conexion->query(" INSERT INTO `patologia`(`nombre_patologia`, `descripcion`) VALUES ('$nombre','$descripcion')");
    }


    public function delete($idPatologia)
    {
        return $this->conexion->query("UPDATE `patologias` SET patologias.eliminado = 1 WHERE patologias.id_patologia='$idPatologia'");
    }

    public function destroy($idPatologia)
    {
        return $this->conexion->query("DELETE FROM `patologias` WHERE `id_patologia`='$idPatologia'");
    }

    public function restore($idPatologia)
    {

        return $this->conexion->query("UPDATE `patologias` SET patologias.eliminado = 0 WHERE patologias.id_patologia ='$idPatologia'");
    }

    public function edit($idPatologia, $nombre, $descripcion)
    {
        return $this->conexion->query("UPDATE `patologias` SET `nombre_patologia`='$nombre', `descripcion`='$descripcion' WHERE patologias.id_patologia = $idPatologia");

    }

    public function validarExistenciaPatologia($nombre)
    {
        $existe = $this->conexion->query("SELECT * FROM `patologias` WHERE `nombre_patologia`='$nombre'");
        return !$existe->fetch_object() ? true : false;
    }
}
