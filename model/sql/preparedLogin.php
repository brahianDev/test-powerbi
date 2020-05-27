<?php


final class preparedLoginSql
{
    const login = "SELECT usuarios.nombre, apellido, clave, email, rol.nombre as rol, rol.id as rol_id FROM usuarios INNER JOIN rol_usuarios ON rol_usuarios.cod_usuario = usuarios.id  INNER JOIN rol ON rol.id = rol_usuarios.cod_rol WHERE email = ? AND rol_usuarios.cod_estado = 1";
}