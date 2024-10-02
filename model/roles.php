<?php
        
        class roles
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($status)
    {
        return $this->conexion->query("SELECT * FROM `roles` WHERE roles.eliminado = '$status'");
    }

    public function insert($tipo_rol)
    {
        return $this->conexion->query("INSERT INTO `roles`(`tipo_rol`) VALUES ('$tipo_rol')");
    }
    public function delete($idRol)
    {
        return $this->conexion->query("UPDATE `roles` SET roles.eliminado = 1 WHERE roles.id_rol='$idRol'");
    }

    public function destroy($idRol)
    {
        return $this->conexion->query("DELETE FROM `roles` WHERE id_rol='$idRol'");
    }

    public function restore($status)
    {
        return $this->conexion->query("UPDATE `roles` SET roles.eliminado = 0 WHERE roles.id_rol=`$status`");
    }

    public function edit($idRol,$new_tipo_rol)
    {
        /* die("UPDATE `roles` SET nombre ='$new_tipo_rol' WHERE roles.id_rol =$idRol"); */
        return $this->conexion->query("UPDATE `roles` SET tipo_rol ='$new_tipo_rol' WHERE roles.id_rol =$idRol");
    }


}