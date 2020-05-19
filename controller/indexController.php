<?php

class indexController {
    
    public function index() {
        require_once('view/all/header.php');
        require_once('view/login/loginindex.php');
    }
    
    public function home() {
        require_once('view/all/header.php');
        require_once('view/all/index.php');
        require_once('view/all/footer.php');
    }     

}

?>