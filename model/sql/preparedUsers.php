<?php


final class preparedUsersSql
{
    const insertStudents = "INSERT INTO estudiante (identificacion_estu, documento, nombreAlumno, fechaNacimiento, cursosInscritos) VALUES (?, ?, ?, ?, ?)";
    const insertRol = "INSERT INTO rol (nombre, estado) VALUES (?, ?)";
    const insertUsers = "INSERT INTO usuarios (nombre, apellido, clave, estado, tipo_identificacion, nit, fecha_nacimiento, celular, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
}