<?php

class indexController extends index {
    
    public function index() {
        require_once('view/all/header.php');
        require_once('view/login/loginindex.php');
    }
    
    public function home() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/index.php');
        require_once('view/all/footer.php');
    }

    public function importar() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/import.php');
        require_once('view/all/footer.php');
    }

    public function roles() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/rol.php');
        require_once('view/all/footer.php');
    }
    
    public function usuarios() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/users.php');
        require_once('view/all/footer.php');
    }

    public function estudiantes() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/students.php');
        require_once('view/all/footer.php');
    }

    public function powerbi() {
        security::validateSession();
        require_once('view/all/header.php');
        require_once('view/all/sidebar.php');
        require_once('view/all/navbar.php');
        require_once('view/user/powerbi.php');
        require_once('view/all/footer.php');
    }

    public function error() {
        require_once('view/all/header.php');
        require_once('view/all/error.php');
    }

}

?>