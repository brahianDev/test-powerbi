<?php


final class preparedUsersSql
{
    const insertStudents = "INSERT INTO estudiante (identificacion_estu, documento, nombreAlumno, fechaNacimiento, cursosInscritos) VALUES (?, ?, ?, ?, ?)";
}