<?php 

class users extends database {

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
}