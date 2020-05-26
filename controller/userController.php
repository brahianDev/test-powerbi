<?php

class userController extends users {
    
    
    public function access() {
        require_once('view/all/header.php');
        require_once('view/user/userAccessError.php');
    }

    public function load() {
        require_once('vendor/Classes/PHPExcel/IOFactory.php');
        $dir_subida = 'temp/files/';

        $filename = $dir_subida.basename($_FILES['upload']['name']);
        move_uploaded_file($_FILES['upload']['tmp_name'], $filename);
        $objPHPExcel = PHPEXCEL_IOFactory::load($filename);
        $objPHPExcel->setActiveSheetIndex(0);
        $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

        for($i = 2; $i <= $numRows; $i++){
            $id_estudiante = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $documento_estudiante = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $nombre = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $fecha_nacimiento = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getFormattedValue();
            $cursos = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();

            $datos = [
                "id_estudiante" => $id_estudiante,
                "nombre_estudiante" => $nombre,
                "documento_estudiante" => $documento_estudiante,
                "fecha_nacimiento" => date('Y-m-d', strtotime($fecha_nacimiento)),
                "cursos" => $cursos

            ];

            // print_r($datos);
            // echo '<br>';

            parent::insertStudents($datos);
        }
    }

    public function rol() {
        $nombre_rol = $_POST['rol_name'];
        $codigo_estado = $_POST['rol_estado'];
        $data = [
            "rol" => strtolower($nombre_rol),
            "estado" => strtolower($codigo_estado)
        ];

        try {
            parent::insertRol($data);
            header('location: '.APP_URL.'roles');
        } catch (\Throwable $th) {
            header('location: '.APP_URL.'error');
        }
    }

    public function crear() {
        $nombre = $_POST['name'];
        $apellido = $_POST['lastname'];
        $pass = $_POST['password'];
        $estado = $_POST['estado'];
        $tipoDocumento = $_POST['type_identification'];
        $documento = $_POST['document'];
        $fechaNacimiento = $_POST['date'];
        $telefono = $_POST['phone'];
        $correo = $_POST['email'];
        $data = [
            "nombre" => strtolower($nombre),
            "apellido" => strtolower($apellido),
            "pass" => strtolower($pass),
            "estado" => strtolower($estado),
            "tipoDocumento" => strtolower($tipoDocumento),
            "documento" => strtolower($documento),
            "fechaNacimiento" => strtolower($fechaNacimiento),
            "telefono" => strtolower($telefono),
            "correo" => strtolower($correo)
        ];

        try {
            parent::insertUser($data);
            header('location: '.APP_URL.'usuarios');
        } catch (\Throwable $th) {
            header('location: '.APP_URL.'error');
        }
    }

}

?>