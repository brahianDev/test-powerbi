<?php


final class preparedUsersSql
{
    const insertStudents = "INSERT INTO estudiante (identificacion_estu, documento, nombreAlumno, fechaNacimiento, cursosInscritos) VALUES (?, ?, ?, ?, ?)";
    const insertRol = "INSERT INTO rol (nombre, estado) VALUES (?, ?)";
    const insertUsers = "INSERT INTO usuarios (nombre, apellido, clave, estado, tipo_identificacion, nit, fecha_nacimiento, celular, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    const updateUsers = "UPDATE usuarios SET nombre = ?, apellido = ?, estado = ?, tipo_identificacion = ?, nit = ?, fecha_nacimiento = ?, celular = ?, email = ? WHERE id = ?";
    const getUser = "SELECT * FROM usuarios LEFT JOIN rol_usuarios ON rol_usuarios.cod_usuario = usuarios.id WHERE usuarios.id = ?";
    const getRoles = "SELECT * FROM rol WHERE estado = 1";
    const assignRol = "INSERT INTO rol_usuarios (cod_rol, cod_usuario, cod_estado) VALUES (?, ?, ?)";
}