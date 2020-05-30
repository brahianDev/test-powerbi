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

        for($i = 2; $i <= 11; $i++){
            $id_registro = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $id_estudiante = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $documento_estudiante = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $nombre = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $fecha_nacimiento = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getFormattedValue();
            $cursos = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();

            $cod_programa = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
            $programa = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
            $grade = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            $code_grade = $this->getGrade($grade);

            $vinculation = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
            $value_carge = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
            $value_payment = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
            $value_scholarship = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();

            $datos = [
                "id_estudiante" => $id_estudiante,
                "nombre_estudiante" => $nombre,
                "documento_estudiante" => $documento_estudiante,
                "fecha_nacimiento" => date('Y-m-d', strtotime($fecha_nacimiento)),
                "cursos" => $cursos,
                "estado" => $this->getState('active')
            ];

            $datos_programa = [
                "codigo_programa" => $cod_programa,
                "programa" => $programa,
                "grado" => $code_grade
            ];

            $datos_matricula = [
                "tipo_vinculacion" => $vinculation,
                "valor_cargo" => $value_carge,
                "valor_pago" => $value_payment,
                "valor_beca" => $value_scholarship,
                "codigo_programa" => $cod_programa
            ];

            $datos_matricula_estudiante = [
                "matricula_id" => (int)$id_registro,
                "estudiante" => (string)$id_estudiante
            ];
            
            // print_r($datos_matricula_estudiante);
            // echo '<br>';

            try {
                parent::insertStudents($datos);
                parent::insertProgram($datos_programa);
                parent::insertMatricula($datos_matricula);
                parent::insertMatriculaEstudiante($datos_matricula_estudiante);
                header('location: '.APP_URL.'importar');
            } catch (\Throwable $th) {
                header('location: '.APP_URL.'error');
            } 
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

    public function eliminar() {
        try {
            $id = $_POST['id'];
            parent::deleteUser($id);
            header('location: '.APP_URL.'usuarios');
        } catch (\Throwable $th) {
            header('location: '.APP_URL.'error');
        }
    }

    public function eliminarEstudiante() {
        try {
            $id = $_POST['id'];
            parent::deleteStudent($id);
            header('location: '.APP_URL.'estudiantes');
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

    public function actualizar() {
        $nombre = $_POST['name'];
        $apellido = $_POST['lastname'];
        $estado = $_POST['estado'];
        $tipoDocumento = $_POST['type_identification'];
        $documento = $_POST['document'];
        $fechaNacimiento = $_POST['date'];
        $telefono = $_POST['phone'];
        $correo = $_POST['email'];
        $id = $_POST['id'];
        $data = [
            "nombre" => strtolower($nombre),
            "apellido" => strtolower($apellido),
            "estado" => strtolower($estado),
            "tipoDocumento" => strtolower($tipoDocumento),
            "documento" => strtolower($documento),
            "fechaNacimiento" => strtolower($fechaNacimiento),
            "telefono" => strtolower($telefono),
            "correo" => strtolower($correo),
            "id" => $id
        ];

        try {
           parent::updateUser($data);
           header('location: '.APP_URL.'usuarios');
        } catch (\Throwable $th) {
            header('location: '.APP_URL.'error');
        }
    }

    public function edit() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/studentEdit.php');
        require_once('view/all/footer.php');
    }

    public function actualizarEstudiante() {
        $nombre = $_POST['name'];
        $documento = $_POST['documento'];
        $date = $_POST['date'];
        $id = $_POST['id'];
        $data = [
            "nombre" => strtolower($nombre),
            "documento" => $documento,
            "date" => $date,
            "id" => $id
        ];

        try {
           parent::updateStudent($data);
           header('location: '.APP_URL.'estudiantes');
        } catch (\Throwable $th) {
            header('location: '.APP_URL.'error');
        }
    }

    public function asignar() {
        $rol = $_POST['rol'];
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $data = [
            "rol" => (int)$rol,
            "estado" => (int)$estado,
            "id" => (int)$id
        ];
        // print_r($data);
        try {
            parent::assignRol($data);
            header('location: '.APP_URL.'usuarios');
        } catch (\Throwable $th) {
            header('location: '.APP_URL.'error');
        }
    }

    public function getGrade($grade) {
        switch ($grade) {
            case 'PREG':
                return 1;
            break;
        }
    }

    public function getState($state){
        switch ($state) {
            case 'active':
                return 1;
            break;
        }
    }

    public function editar() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/userEdit.php');
        require_once('view/all/footer.php');
    }
}

?>