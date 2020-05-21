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
}