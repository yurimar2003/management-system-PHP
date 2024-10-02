<?php

class usuarios
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get($status)
    {
        return $this->conexion->query("SELECT a.id_usuario, b.nombre, c.tipo_rol, a.correo
        FROM usuarios a
        INNER JOIN empleados b ON b.id_empleado=a.id_empleado
        INNER JOIN roles c ON c.id_rol=a.id_rol WHERE a.eliminado = '$status'");
    }

    public function listEmp($status)
    {

        $query = ("SELECT * FROM empleados WHERE empleados.eliminado = '$status'");

        return $this->conexion->query($query);
    }

    public function listRol($status)
    {

        $query = ("SELECT * FROM roles WHERE roles.eliminado = '$status'");

        return $this->conexion->query($query);
    }

    public function insert($empleado, $rol, $correo, $contrasena)
    {
        $encrypContrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO `usuarios`(`id_empleado`, `id_rol`, `correo`, `contrasena`) VALUES ('$empleado','$rol','$correo','$encrypContrasena')");
        //die($encrypPassword);
        return $respuestaBaseDeDatos;

        // if ($respuestaBaseDeDatos) {
        //     return 'Proceso Exitoso';
        // } else {
        //     return 'Ocurrio un error';
        // }
    }

    public function delete($idUsuario)
    {
        return $this->conexion->query("UPDATE `usuarios` SET usuarios.eliminado = 1 WHERE usuarios.id_usuario='$idUsuario'");
    }

    public function destroy($idUsuario)
    {
        return $this->conexion->query("DELETE FROM `usuarios` WHERE `id_usuario`='$idUsuario'");
    }

    public function restore($idUsuario)
    {
        return $this->conexion->query("UPDATE `usuarios` SET usuarios.eliminado = 0 WHERE usuarios.id_usuario ='$idUsuario'");
    }

    public function edit($idUsuario, $newEmpleado, $newRol, $correo, $password)
    {
        return $this->conexion->query("UPDATE `usuarios` SET `id_empleado`='$newEmpleado',`id_rol`='$newRol',`correo`='$correo',`contrasena`='$password' WHERE usuarios.id_usuario = $idUsuario");
    }

    public function getLogin($status, $correo)
    {
        return $this->conexion->query("SELECT * FROM usuarios WHERE `eliminado`='$status' AND `correo`='$correo'");
    }
    
}
