<?php


final class preparedUsersSql
{
    const insertStudents = "INSERT INTO estudiante (identificacion, documento, nombreAlumno, fechaNacimiento, cursosInscritos, estado) VALUES (?, ?, ?, ?, ?, ?)";
    const insertProgram = "INSERT INTO programa (codigoPrograma, programa, grado_idgradoacademico) VALUES (?, ?, ?)";
    const insertMatricule = "INSERT INTO matricula (tipoVinculacion, valorCargo, valorPago, valorBeca, programa_idprograma) VALUES (?, ?, ?, ?, ?)";
    const insertMatriculeEstudent = "INSERT INTO matricula_estudiante (matricula_idmatricula, estudiante_identificacion) VALUES (?, ?)";
    const insertRol = "INSERT INTO rol (nombre, estado) VALUES (?, ?)";
    const insertUsers = "INSERT INTO usuarios (nombre, apellido, clave, estado, tipo_identificacion, nit, fecha_nacimiento, celular, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    const updateUsers = "UPDATE usuarios SET nombre = ?, apellido = ?, estado = ?, tipo_identificacion = ?, nit = ?, fecha_nacimiento = ?, celular = ?, email = ? WHERE id = ?";
    const updateStudents = "UPDATE estudiante SET documento = ?, nombreAlumno = ?, fechaNacimiento = ? WHERE identificacion = ?";
    const getUser = "SELECT * FROM usuarios LEFT JOIN rol_usuarios ON rol_usuarios.cod_usuario = usuarios.id WHERE usuarios.id = ?";
    const getRoles = "SELECT * FROM rol WHERE estado = 1";
    const assignRol = "INSERT INTO rol_usuarios (cod_rol, cod_usuario, cod_estado) VALUES (?, ?, ?)";
    const deleteUser = "DELETE FROM usuarios WHERE id = ?";
    const deleteStudent = "DELETE FROM estudiante WHERE identificacion = ?";
    const getStudent = "SELECT * FROM estudiante WHERE identificacion = ?";
}