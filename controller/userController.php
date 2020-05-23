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
    
}

?>