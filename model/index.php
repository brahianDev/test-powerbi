<?php 

class index extends database {

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

    public function getUsers() {
        try {
            $stm = parent::conexion()->prepare(preparedIndexSql::getUsers);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllStudents() {
        try {
            $stm = parent::conexion()->prepare(preparedIndexSql::getAllEstudents);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        } 
    }


    public static function getState($state){
        switch ($state) {
            case '1':
                return 'Activo';
            break;
            case '2':
                return 'Inactivo';
            break;
            default:
                return false;
            break;
        }
    }

    public static function getDocument($type){
        switch ($type) {
            case '1':
                return 'Cédula';
            break;
            
            default:
                return false;
            break;
        }
    }
}