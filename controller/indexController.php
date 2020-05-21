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

}

?>