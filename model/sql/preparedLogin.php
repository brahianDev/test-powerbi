<?php


final class preparedLoginSql
{
    const login = "SELECT usuarios.nombre, apellido, clave, email, rol.nombre as rol, rol.id as rol_id FROM usuarios INNER JOIN rol_usuarios ON rol_usuarios.cod_usuario LEFT JOIN rol ON rol.id = rol_usuarios.cod_rol = usuarios.id WHERE email = ? AND rol_usuarios.estado = 1";
}