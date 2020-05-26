<?php


final class preparedIndexSql
{
    const getRoles = "SELECT accion.nombre_accion, accion.id, accion.url_accion FROM accion INNER JOIN accion_usuario ON accion_usuario.id_accion = accion.id WHERE accion_usuario.id_rol = ? AND accion_usuario.estado = 1";
    const getStates = "SELECT idEstado, nombreEstado FROM estado";
    const getTypeDocument = "SELECT id, tipo FROM tipo_identificacion";
    const getUsers = "SELECT * FROM usuarios";
}