<?php 

class users extends database {

    public function getActions($rol){
        try {
            $stm = parent::conexion()->prepare(preparedIndexSql::getRoles);
            $stm->bindParam(1, $rol, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getUser($data) {
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::getUser);
            $stm->bindParam(1, $data, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getStates(){
        try {
            $stm = parent::conexion()->prepare(preparedIndexSql::getStates);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getTypeDocument() {
        try {
            $stm = parent::conexion()->prepare(preparedIndexSql::getTypeDocument);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getRoles() {
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::getRoles);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function assignRol(array $data) {
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::assignRol);
            $stm->bindParam(1, $data['rol'], PDO::PARAM_STR);
            $stm->bindParam(2, $data['id'], PDO::PARAM_STR);
            $stm->bindParam(3, $data['estado'], PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertStudents(array $data){
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::insertStudents);
            $stm->bindParam(1, $data['id_estudiante'], PDO::PARAM_STR);
            $stm->bindParam(2, $data['documento_estudiante'], PDO::PARAM_INT);
            $stm->bindParam(3, $data['nombre_estudiante'], PDO::PARAM_STR);
            $stm->bindParam(4, $data['fecha_nacimiento'], PDO::PARAM_STR);
            $stm->bindParam(5, $data['cursos'], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertRol(array $data) {
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::insertRol);
            $stm->bindParam(1, $data['rol'], PDO::PARAM_STR);
            $stm->bindParam(2, $data['estado'], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertUser(array $data) {
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::insertUsers);
            $stm->bindParam(1, $data['nombre'], PDO::PARAM_STR);
            $stm->bindParam(2, $data['apellido'], PDO::PARAM_STR);
            $stm->bindParam(3, $data['pass'], PDO::PARAM_STR);
            $stm->bindParam(4, $data['estado'], PDO::PARAM_STR);
            $stm->bindParam(5, $data['tipoDocumento'], PDO::PARAM_STR);
            $stm->bindParam(6, $data['documento'], PDO::PARAM_STR);
            $stm->bindParam(7, $data['fechaNacimiento'], PDO::PARAM_STR);
            $stm->bindParam(8, $data['telefono'], PDO::PARAM_STR);
            $stm->bindParam(9, $data['correo'], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateUser(array $data) {
        try {
            $stm = parent::conexion()->prepare(preparedUsersSql::updateUsers);
            $stm->bindParam(1, $data['nombre'], PDO::PARAM_STR);
            $stm->bindParam(2, $data['apellido'], PDO::PARAM_STR);
            $stm->bindParam(3, $data['estado'], PDO::PARAM_STR);
            $stm->bindParam(4, $data['tipoDocumento'], PDO::PARAM_STR);
            $stm->bindParam(5, $data['documento'], PDO::PARAM_STR);
            $stm->bindParam(6, $data['fechaNacimiento'], PDO::PARAM_STR);
            $stm->bindParam(7, $data['telefono'], PDO::PARAM_STR);
            $stm->bindParam(8, $data['correo'], PDO::PARAM_STR);
            $stm->bindParam(9, $data['id'], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}